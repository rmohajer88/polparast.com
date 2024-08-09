<?php

// Database connection details (replace with your actual details)
require_once 'sms.php';
require_once 'dataBase.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if initial login form is submitted (send code)
if (isset($_POST["phone_number"])) {
    $phoneNumber = $_POST["phone_number"];

    // Generate a verification code (replace with your preferred method)
    $verificationCode = rand(1000, 9999);

    // Check if phone number already exists in database
    $sql = "SELECT * FROM users WHERE phone_number = '$phoneNumber'";
    $result = $conn->query($sql);

    // If phone number exists, proceed with login verification
    if ($result && $result->num_rows > 0) {
        // Create verification record or update existing one

        // Set expiration time to 1 minute from now
        $expirationTime = date("Y-m-d H:i:s", strtotime("+1 minute")); 

        // SQL UPDATE statement
        $sql = "UPDATE users SET verification_code = ?, verification_code_expiry = ? WHERE phone_number = ?";

        // Prepare the SQL statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters; note there are three parameters: the first two are strings (s) and the last one is also a string (s)
            $stmt->bind_param("sss", $verificationCode, $expirationTime, $phoneNumber);
            
            // Execute the statement
            if ($stmt->execute()) {
              
                
                // Send verification code SMS
                $message = "کد فعال سازی :" . $verificationCode;
                $response = Send($phoneNumber, $message);
                
                // Handle SMS sending response (check for success or error)
                if ($response) {
                    $_SESSION['verifiedNumber'] = $phoneNumber;
                    echo "success";

                    // Redirect user to verification form with phone number pre-filled (assuming verification.html exists)
                    // header("Location: verification.html?phone_number=" . urlencode($phoneNumber));
                    exit();
                } else {
                    echo "Failed to send verification code: ";
                }
            } else {
                echo "Error executing statement: " . $stmt->error;
            }
            
            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        // Phone number not found, potentially prompt for registration
        echo "phonenotexist";
        exit();
    }
}

$conn->close();
?>

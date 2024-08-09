<?php

session_start();
require_once 'dataBase.php';
require_once 'sms.php';

if (isset($_POST["phone_number"])) {
    $phoneNumber = $_POST["phone_number"];

    // Check if user exists
    $sql = "SELECT id FROM users WHERE phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, return "login"
        $mess = "login";
        echo json_encode($mess);
        
    } else {

        // Send verification code (assuming sms.php function works correctly)
           // Generate verification code
        $verificationCode = rand(1000, 9999);
        $message = "کد فعال سازی: " . $verificationCode;
        $response = Send($phoneNumber, $message);

        if ($response) {

             
                $expirationTime = date("Y-m-d H:i:s", strtotime("+1 minutes")); // Set expiration time to 5 minutes from now
                // Create new user
                $sql = "INSERT INTO users (phone_number, verification_code, verification_code_expiry) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $phoneNumber, $verificationCode, $expirationTime);
                $stmt->execute();

                // Query to select the id for the new insert user
                $newsql = "SELECT * FROM users WHERE phone_number = ?";
                $stmt = $conn->prepare($newsql);
                $stmt->bind_param("s", $phoneNumber);
                $stmt->execute();
                $result = $stmt->get_result();
                $id = null;
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
                    
                            $id = $row['id'];// Storing the value in golobal variable
                            $_SESSION['id']=$id;
                    }
                }
                // Create user info meanwhile new user is added to the database
                $sqluserinfo = "INSERT INTO userinfo (id, firstName, lastName, mobileNumber, birthDate, job, iconlink) VALUES (?, 'NULL', NULL, NULL, NULL, '', '')";
                $stmt = $conn->prepare($sqluserinfo);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $mess = "success";
                echo json_encode($mess);
        
               //echo "success"; // User created successfully, send to verification page
        } else {

               $mess = "error_sending_sms";
               echo json_encode($mess);
            
        }
    }
    $stmt->close();
} else {
               $mess = "invalid_request";
               echo json_encode($mess);

}

$conn->close();

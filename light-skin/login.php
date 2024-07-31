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
  if ($result->num_rows > 0) {
    // Create verification record or update existing one
  $sql = "UPDATE users SET verification_code = '$verificationCode' WHERE phone_number = '$phoneNumber'"; // Corrected SQL statement
         
  } else {
    // Phone number not found, potentially prompt for registration
    echo "phonenotexist";
    exit();
  }

  if ($conn->query($sql) === TRUE) {
    // Send verification code SMS
    $message = "Your login verification code is: " . $verificationCode;
    $response = Send($phoneNumber, $message);
    
    // Handle SMS sending response (check for success or error)
    if ($response) {
        $_SESSION['verifiedNumber']= $phoneNumber;
        echo "success";
        
       // Redirect user to verification form with phone number pre-filled (assuming verification.html exists)
       // on success show a message and wait some time and then redirect to verification page
      // header("Location: verification.html?phone_number=" . urlencode($phoneNumber));
      exit();
    } else {
      echo "Failedtosendverificationcode: ";
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

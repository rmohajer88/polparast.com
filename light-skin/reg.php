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
        $message = "Your verification code is: " . $verificationCode;
        $response = Send($phoneNumber, $message);

        if ($response) {

                // Generate verification code
                $verificationCode = rand(1000, 9999);

                // Create new user
                $sql = "INSERT INTO users (phone_number, verification_code) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $phoneNumber, $verificationCode);
                $stmt->execute();

                // queery to select the id fo the new insert user
                $newsql = "SELECT * FROM users WHERE phone_number = '$phoneNumber'";
                $result = $conn->query($newsql);
                $id;
                if ($result->num_rows > 0) {
                
                    while($row = $result->fetch_assoc()) {
                    
                            $id = $row['id'];// Storing the value in golobal variable
                            $_SESSION['id']=$id;
                    }
                }
                //create userinfo user meanwhile new user is added to database
                $sqluserinfo = "INSERT INTO userinfo (id,firstName,lastName,mobileNumber,birthDate,job,iconlink) VALUES ('$id','NULL',NULL,NULL,NULL,'','' )";
                $conn->query($sqluserinfo);

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

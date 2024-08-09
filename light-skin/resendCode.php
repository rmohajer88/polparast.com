<?php
session_start();

include 'dataBase.php';
include 'sms.php';
// Check connection
if ($conn->connect_error) {
    // Output a JSON error response
    // echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}


// Example endpoint logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone_number'];

    // Your logic to resend the code here

   // Generate a verification code (replace with your preferred method)
    $verificationCode = rand(1000, 9999);
    // Set expiration time to 1 minute from now
    $expirationTime = date("Y-m-d H:i:s", strtotime("+1 minute")); 

                    
    // Send verification code SMS
    $message = "کد فعال سازی :" . $verificationCode;
    $response = Send($phoneNumber, $message);
    $rrmessage;


    if ($response) {/* code resending successful */

        
        // SQL UPDATE statement
        $sql = "UPDATE users SET verification_code = ?, verification_code_expiry = ? WHERE phone_number = ?";

          // Prepare the SQL statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters; note there are three parameters: the first two are strings (s) and the last one is also a string (s)
            $stmt->bind_param("sss", $verificationCode, $expirationTime, $phoneNumber);
            
            // Execute the statement
            if ($stmt->execute()) {
              
              $_SESSION['verifiedNumber'] = $phoneNumber;
             
                     $rrmessage = array(
                     'status' => 'successupdatingdatabase');

            } else {

                $rrmessage = array('status' => 'Errorupdatingdatabase',
                'message'=>$stmt->error);
                
            }
            
            // Close the statement
            $stmt->close();
        } else {

              $rrmessage = array(
                'status' => 'Errorpreparingstatement',
                'message'=>$conn->error);
            
           }

   


    } else {
        $rrmessage = array(
            'status' => 'errorcodenotsent',
            'message' => 'Error message'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($rrmessage);
} 

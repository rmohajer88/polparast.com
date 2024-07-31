<?php
require_once 'sms.php';


$recipientNumber = "09206322737"; // Replace with actual phone number 09931611431
$message = "hi .";

$response = Send($recipientNumber, $message);

if ($response) {
    echo "SMS sent successfully!".$response;
} else {
    echo "Error sending SMS: " . $response;
}


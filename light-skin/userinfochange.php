<?php session_start();?>
<?php
// Include your database connection file
include 'dataBase.php';

$data = json_decode(file_get_contents('php://input'), true);

// Access the individual data fields
$firstName = $data['firstName'];
$lastName = $data['lastName'];
$mobileNumber = $data['mobileNumber'];
$birthDate = $data['birthDate'];
$job = $data['job'];

echo $_SESSION['id'];
//upate the user  attribute phone number 
// I should check the id of the user 
$sql = "UPDATE users SET `phone_number` = '$mobileNumber' WHERE `id` = '" . $_SESSION['id'] . "'"; // just did not have where conditons and updated all forms
$conn->query($sql);

// Update the userinfo information in the database
$sql = "UPDATE userinfo SET 
        `firstName` = '$firstName',
        `lastName` = '$lastName',
        `mobileNumber` = '$mobileNumber',
        `birthDate` = '$birthDate',
        `job` = '$job'
         WHERE `id` = '" . $_SESSION['id'] . "'";



if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => 'success',
        'message' => 'Record updated successfully',
        'additional_data' => array('id'=>$_SESSION['id'] ,'name' => $firstName, 'lastName' => $lastName, 'mobileNumber' => $mobileNumber, 'birthDate' => $birthDate, 'job' => $job)
    );
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error updating record: ' . $conn->error,
        'additional_data' => array()
    );
    echo json_encode($response);
}


$conn->close();

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
//     header('Location: index.php');
// } else {
//     echo "Error updating record: " . $conn->error;
//     header('Location: index.php');
// }
?>

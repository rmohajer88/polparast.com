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
$emailAddress = $data['emailAddress'];
$webSite = $data['webSite'];
$address = $data['address'];

// Use the data as needed in your PHP logic

// // Get the form data
// $firstName = $_POST['firstName'];
// $lastName = $_POST['lastName'];
// $mobileNumber = $_POST['mobileNumber'];
// $birthDate = $_POST['birthDate'];
// $emailAddress = $_POST['emailAddress'];
// $webSite = $_POST['webSite'];
// $address = $_POST['address'];

// Update the user information in the database
$sql = "UPDATE userinfo SET 
        `firstName` = '$firstName',
        `lastName` = '$lastName',
        `mobileNumber` = '$mobileNumber',
        `birthDate` = '$birthDate',
        `emailAddress` = '$emailAddress',
        `webSite` = '$webSite',
        `Address` = '$address'
         WHERE `id` = '" . $_SESSION['id'] . "'";



if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => 'success',
        'message' => 'Record updated successfully',
        'additional_data' => array('id'=>$_SESSION['id'] ,'name' => $firstName, 'lastName' => $lastName, 'mobileNumber' => $mobileNumber, 'birthDate' => $birthDate, 'emailAddress' => $emailAddress, 'webSite' => $webSite,'Address'=>$address)
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

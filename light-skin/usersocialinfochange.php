<?php session_start();?>
<?php
// Include your database connection file
include 'dataBase.php';

$data = json_decode(file_get_contents('php://input'), true);

// Access the individual data fields
$facebook = $data['fabcebookId'];
$twitter = $data['twitterId'];
$instagram = $data['instagramId'];
$linked = $data['linkedId'];



//Update the usersocial information in the database
$sql = "UPDATE usersocialinfo SET 
        `fabcebookId` = '$facebook',
        `twitterId` = '$twitter',
        `instagramId` = '$instagram',
        `linkedId` = '$linked'
         WHERE `id` = '" . $_SESSION['id'] . "'";



if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => 'success',
        'message' => 'Record updated successfully',
        'additional_data' => array('id'=>$_SESSION['id'] ,'fabcebookId' => $facebook, 'twitterId' => $twitter, 'instagramId' => $instagram, 'linkedId' => $linked)
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

?>

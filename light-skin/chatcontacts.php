<?php session_start();?>
<?php
// Include the database connection file
include 'dataBase.php';

// Select data from the chat_contacts table
$query = "SELECT * FROM chat_contacts";
$result = mysqli_query($conn, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {

  //Fetch and return the user data as JSON
  $userData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    

    // Return the data in JSON format
    //header('Content-Type: application/json');
    echo json_encode($userData);
} else {
    echo 'No contacts found';
}

// Close the database connection
mysqli_close($conn);
?>





<?php

// Include database connection file
 ini_set('display_errors', 1);

require_once('dataBase.php');
//echo "Received user ID: " . $_GET['id'] . "<br>";
if (mysqli_connect_errno()) {
  //echo "Error connecting to database: " . mysqli_connect_error();
  exit;
}


$userID = isset($_GET['id']) ? $_GET['id'] : '';

// If user ID is provided, sanitize it to prevent most basic injection attempts
if (!empty($userID)) {
  $userID = filter_var($userID, FILTER_SANITIZE_NUMBER_INT); //FILTER_SANITIZE_NUMBER_INT FILTER_SANITIZE_STRING
} else {
 // echo 'Error: Please provide a user ID.';
  exit;
}


// Create SQL query to fetch user data
$sql = "SELECT * FROM chat_contacts WHERE id = $userID";

// Execute the query
$result = mysqli_query($conn, $sql);
 
// Check if query was successful
if (mysqli_error($conn)) {
  //echo 'Error: ' . mysqli_error($conn);
  exit;
}

// Check if user with the ID exists
if ($result->num_rows > 0) {
  // Fetch user data as an associative array
  $userData = mysqli_fetch_assoc($result);
  
  // Encode user data to JSON format
  $response = json_encode($userData);

  // Send JSON response back to AJAX call
  echo $response;
} else {
  echo 'Error: User not found.';
}

// Close connection
mysqli_close($conn);

?>

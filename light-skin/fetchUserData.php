<?php session_start();?>
<?php
//Include your database connection file
include 'dataBase.php';

//Query to fetch user data  
$query = "SELECT * FROM userinfo WHERE `id` ='" . $_SESSION['id'] . "';" ;
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
  //Fetch and return the user data as JSON
  $userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  //  echo $userData;
  //this echo is needed in other part of index page do not delete it
  echo json_encode($userData);
} else {
  echo 'کاربری پیدا نشد';
}

//Close the database connection
mysqli_close($conn);
?>

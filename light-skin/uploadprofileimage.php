<?php 
session_start();
?>
<?php
require 'dataBase.php'; // Assuming 'dataBase.php' contains your database connection logic

// Retrieve user information from POST data
$id = $_SESSION['id'];

// Generate unique filename and define target path
$imageName = uniqid() . basename($_FILES["fileImg"]["name"]);
$target = "../assets/media/avatar/" . $imageName;

// Retrieve current image path from database
$query = "SELECT iconlink FROM userinfo WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $currentImagePath = $row['iconlink'];
} else {
  // Handle case where no current image exists (optional: log or notify)
  // echo "No current image found for user ID: $id";
}

// Move uploaded file
if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target)) {
  // Delete the current image file (if it exists)
  if (file_exists($currentImagePath) && $currentImagePath != "") { // Check if file exists and isn't empty path
    unlink($currentImagePath);
  }

  // Update database with new image path
  $stmt = mysqli_prepare($conn, "UPDATE userinfo SET iconlink= '$target' WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  // Build success response
  $response = array(
      "success" => true,
      "imagePath" => $target  // Optional: include path for image display
  );  
  echo json_encode($response);

} else {
  // Handle upload failure
  $response = array(
      "success" => false,
      "message" => "Error uploading image. Please try again."
  );
  echo json_encode($response);
  exit(); // Prevent further execution if upload fails
}
?>

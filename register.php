<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mohajerDataBase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the email already exists in the database
$email = $_POST['email'];

$email_check_sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($email_check_sql);

if ($result->num_rows > 0) {



    $message = "ایمیل وارد شده قبلا استفاده شده است";
    $url = "light-skin/signin.php?message=" . urlencode($message);
    header("Location: " . $url);
    exit;




    
}


// Insert user data into the database
$name = $_POST['name'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "ثبت نام با موفقیت انجام شد";
      header("Location: light-skin/signin.php"); // Redirect to the log in page  
} else {
    echo "خطا: " . $conn->error;
}

$conn->close();
?>

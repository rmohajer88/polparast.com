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
$hashed_password_value = hash('sha256', $password);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password_value')";

if ($conn->query($sql) === TRUE) {

    $newsql = "SELECT * FROM users WHERE email = '$email' and password = '$hashed_password_value'";
    $result = $conn->query($newsql);
    $id;
    if ($result->num_rows > 0) {
      
        while($row = $result->fetch_assoc()) {
        
                $id = $row['id'];// Storing the value in golobal variable
  
        }
    }

    //create userinfo user meanwhile new user is added to database
    $sqluserinfo = "INSERT INTO userinfo (id,firstName,lastName,mobileNumber,birthDate,emailAddress,webSite,Address) VALUES ('$id','$name','','','', '$email','','' )";
    $conn->query($sqluserinfo);
    echo "<script>alert('ثبت نام با موفقیت انجام شد');</script>";
    echo "<script>setTimeout(function(){ window.location='light-skin/signin.php' }, 1000);</script>";

    
} else {
    echo "خطا: " . $conn->error;
}

$conn->close();
?>

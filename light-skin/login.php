<?php session_start(); ?>
<?php
include 'dataBase.php';

// Process form data
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    // SQL query to select user with the given email and password
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
      
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
            $_SESSION['id'] = $row['id'];       // Storing the value in session
            $_SESSION['name'] = $row['name'];   // Storing the value in session
            $_SESSION['email'] =$row['email'];  // Storing the value in session
        }
        header('Location: index.php');
        exit();
    } else{
        $message = "ایمیل یا رمز اشتباه است";
        $url = "signin.php?message=" . urlencode($message);
        header("Location: " . $url);
       
    }

    $conn->close();
}


?>

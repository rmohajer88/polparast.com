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
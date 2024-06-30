<?php
// Connect to the database
$servername = "localhost";
$username = "polparas_tableuser";
$password = "o9f2u:!7DTZ7pY";
$dbname = "polparas_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
<?php
session_start();

// Destroy session variables and session cookie
session_unset();
session_destroy();

// Redirect to login page
header("Location: signin.php");
exit;
?>

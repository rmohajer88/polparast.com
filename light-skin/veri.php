<?php
session_start();
// Database connection details (replace with your actual values)
$servername = "localhost";
$username = "polparas_tableuser";
$password = "o9f2u:!7DTZ7pY";
$dbname = "polparas_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Output a JSON error response
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}

// Check if verification form is submitted
if (isset($_POST["verification_code"]) && isset($_POST["phone_number"])) {
    $phoneNumber = $_POST["phone_number"];
    $verificationCode = $_POST["verification_code"];

    // Prepare and execute the SQL statement to retrieve user information
    if ($stmt = $conn->prepare("SELECT verification_code,id,verified FROM users WHERE phone_number = ?")) {
        $stmt->bind_param("s", $phoneNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbVerificationCode = $row["verification_code"];
            $verified = $row["verified"];
            
            // Check if submitted code matches database code
            if ($verificationCode ==$dbVerificationCode) {
                if ($verified == 1) {
                    $_SESSION['verifiedNumber']=$phoneNumber;
                    $_SESSION['id']=$row["id"];
                    echo json_encode(['status' => 'success', 'redirect' => 'profile.html']);
                    exit;
                } else {
                    // Update user status to verified
                    if ($updateStmt = $conn->prepare("UPDATE users SET verified = 1 WHERE phone_number = ?")) {
                        $updateStmt->bind_param("s", $phoneNumber);
                        $updateStmt->execute();

                        if ($updateStmt->affected_rows > 0) {
                         

                            // setting the session variables id and phone number
                            $_SESSION['verifiedNumber'] = $phoneNumber;
                            $_SESSION['id']=$row["id"];
                            echo json_encode(['status' => 'success', 'session_variable' => $_SESSION['verifiedNumber'], 'redirect' => 'profile.html']);

                        } else {

                            echo json_encode(['status' => 'error', 'message' => 'Error updating verification status.']);
                        }
                        $updateStmt->close();
                    }
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'کد اشتباه است دوباره امتحان کنید.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'شماره تلفن یا کد فرستاده نشده.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error preparing statement.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}

$conn->close();

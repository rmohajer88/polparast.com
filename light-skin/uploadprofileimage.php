<?php

// Check if a file was uploaded
if (isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];

    // Check for errors during file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/media/avatar/';
        $uploadFile = $uploadDir . basename($file['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            // You can also update the user's profile information here
            $response = array('success' => true);
            echo json_encode($response);
            exit;
        } else {
            $response = array('success' => false, 'error' => 'Error moving file to upload directory');
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array('success' => false, 'error' => 'Error uploading file. Error code: ' . $file['error']);
        echo json_encode($response);
        exit;
    }
} else {
    $response = array('success' => false, 'error' => 'No file uploaded');
    echo json_encode($response);
    exit;
}

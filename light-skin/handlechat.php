<?
include 'dataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_name = $_POST['sender_name'];
    $message = $_POST['message'];
    $state = "";
    $avat = "";
    // Current timestamp
    $currentTimestamp = time();

    // Get the current datetime
    $currentDateTime = date('Y-m-d H:i:s');
    // Output the current datetime
    // Update the timestamp by adding 5 days
    $newTimestamp = strtotime('+5 days', $currentTimestamp);





    $created = $scurrentTimestamp;
    // Insert the new chat message into the database
    $sql = "INSERT INTO chat_contacts (sender_name,status,avatar,created_at,last_message) VALUES ('$sender_name','','',CURRENT_TIMESTAMP,'$message')";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Message inserted successfully
       // header("Location: index.php"); // Redirect to the same page to prevent form resubmission
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    /*

    <div class="hide-scrollbar h-100" id="chatContactsList">
    <?php
    $stmt = $pdo->query('SELECT * FROM chat_contacts');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<li class="contacts-item '.$row['status'].'">';
        echo '<a class="contacts-link" href="#">';
        echo '<div class="avatar avatar-online">';
        echo '<img src="'.$row['avatar'].'" alt="'.$row['name'].'">';
        echo '</div>';
        echo '<div class="contacts-content">';
        echo '<div class="contacts-info">';
        echo '<h6 class="chat-name">' . $row['name'] . '</h6>';
        echo '<div class="chat-time">' . $row['timestamp'] . '</div>';
        echo '</div>';
        echo '<div class="contacts-texts">';
        echo '<p class="text-truncate">' . $row['last_message'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
    }
    ?>
</div>



    */
}

?>
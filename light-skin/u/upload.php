
<?php
// Start the session
session_start();
?>

<?php
  
  include_once '../dataBase.php';

if(!empty($_FILES['picture']['name'])){
    //Include database configuration file
  
    
    //File uplaod configuration
    $result = 0;
    $uploadDir = "../../assets/media/avatar/";
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        $userId = $_SESSION['id'];

        //Update picture name in the database
       $update = $db->query("UPDATE userinfo SET iconlink = '".$fileName."' WHERE id = $userId");


            if ($update === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error : " . $db->error;
            }

    }
    
    //Load JavaScript function to show the upload status
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';
}
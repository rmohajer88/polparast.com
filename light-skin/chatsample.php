
//  <?php

//  //Include your database connection file
// include 'dataBase.php';


// //Query to fetch user data 
//  $quer = 'SELECT * FROM chat_contacts';
//  $result = mysqli_query($conn, $quer);
//  $userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
//  $totalUsers = count($userData);

//  for ($i = 0; $i < $totalUsers; $i++) {
//     $user = $userData[$i];
//     $gol_name =$user['sender_name'];
//     echo "User ID: " . $user['id'] . "<br>";
//     echo "User Name: " . $user['sender_name'] . "<br>";
//     echo "User ID: " . $user['created_at'] . "<br>";
//     echo "User Name: " . $user['last_message'] . "<br>";
  
// }

 
//  ?>
 


<!DOCTYPE html>
<html lang="fa">
 <head>
    <meta charset="UTF-8">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- SEO Meta Tags-->
    <meta name="keywords" content="InstaC, chat, messenger, conversation, social, communication" />
    <meta name="description" content="InstaC is a Bootstrap based modern and fully responsive Messaging template to help build Messaging or Chat application fast and easy." />
    <meta name="subject" content="communication">
    <title>قالب HTML چت و گفتگو کاربران - InstaC Chat Template</title>
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/fav/favicon-16x16.png">
    <link rel="shortcut icon" href="../assets/fav/favicon.ico" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../assets/css/app.min.css">   
</head>
        <body>

                <!-- Javascript Files -->
                <script src="../assets/vendors/jquery/jquery-3.5.0.min.js"></script>
                <script src="../assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
                <script src="../assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
                <script src="../assets/vendors/svg-inject/svg-inject.min.js"></script>
                <script src="../assets/vendors/modal-stepes/modal-steps.min.js"></script>
                <script src="../assets/js/app.min.js"></script>

                <ul class="contacts-list" id="chatContactTab" data-chat-list="">
                            <!-- Chat Item Start -->
                            <li class="contacts-item friends">
                                <a class="contacts-link" href="chat-1.html">
                                    <div class="avatar avatar-online">
                                        <img id="avatarimage" src="../assets/media/avatar/2.png" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate" id="chat-name"> </h6>
                                            <div class="chat-time" id="chat-time">الان</div>
                                        </div>
                                        <div class="contacts-texts">
                                            <p class="text-truncate" id="chat-texts">متاسفم، متوجه نشدم. میشه لطفا تکرار کنید</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                       <!-- Chat Item End -->
                </ul> 

        
           <script>
                 //AJAX call to get data from database
                function ajaxgetsocialdata(){

                    $.ajax({
                                url: 'chatcontacts.php', //URL of the server-side script
                                type: 'POST',
                                success: function(data) {
                                    //Handle the response data
                                    console.log(data);
                                    const response = JSON.parse(data);
                                    console.log(response);
                                    document.querySelector('#avatarimage').value =response[0].avatar;
                                    document.querySelector('#chat-name').value = response[0].sender_name;
                                    document.querySelector('#chat-time').value = response[0].created_at;
                                    document.querySelector('#chat-texts').value = response[0].last_message;
                                    id = response[0].id;
                                    console.log(id);
                                            // Loop through each contact and populate the template
                                            response.forEach(contact => {
                                            const chatTemplate = `
                                                <li class="contacts-item friends"> 
                                                <a class="contacts-link" href=${contact.chatDetailPage}?data=${contact.id}>
                                                    <div class="avatar avatar-online">
                                                        <img id="avatarimage" src="${contact.avatar}" alt="">
                                                    </div>
                                                    <div class="contacts-content">
                                                        <div class="contacts-info">
                                                            <h6 class="chat-name text-truncate" id="chat-name"> ${contact.sender_name} </h6>
                                                            <div class="chat-time" id="chat-time"> ${contact.created_at} </div>
                                                        </div>
                                                        <div class="contacts-texts">
                                                            <p class="text-truncate" id="chat-texts"> ${contact.last_message} </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                                </div>
                                            `;

                                            
                                            // Append the template to the chat container
                                            document.getElementById("chatContactTab").innerHTML += chatTemplate;
                                            });

                               


                                },
                                error: function(xhr, status, error) {
                                    //Handle any errors
                                    console.error('Error fetching user data:', error);
                                }
                                });

                }
                ajaxgetsocialdata();
                

            
            
            
            </script>
             
        </body>
</html>
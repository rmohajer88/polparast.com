<?php session_start();?>
<?php
if (!isset($_SESSION['id'])) {      // condition Check: if session is not set. 
  header('location: signin.php');   // if not set the user is sendback to login page.
}
?>
<?php
// Connect to the database
include 'dataBase.php';
?>
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

<style>
  
        .row{
        
        height:800px;

        }
        .rightsider{
            width: 200px;
            position: relative;
            float: right;
            height: 100%;
            border-radius: 1px;
            border-color: red;
            background: rebeccapurple;
        }
  
  </style>


</head>

<body>

<div class="main-layout is-rtl">

     <div class="navigation navbar navbar-light bg-primary">
        <!-- Logo Start -->
        <a class="d-none d-xl-block bg-light rounded p-1" href="../index.html">
            <!-- Default :: Inline SVG -->
            <svg height="30" width="30" viewBox="0 0 512 511"><g><path d="m120.65625 512.476562c-7.25 0-14.445312-2.023437-20.761719-6.007812-10.929687-6.902344-17.703125-18.734375-18.117187-31.660156l-1.261719-41.390625c-51.90625-46.542969-80.515625-111.890625-80.515625-183.992188 0-68.816406 26.378906-132.101562 74.269531-178.199219 47.390625-45.609374 111.929688-70.726562 181.730469-70.726562s134.339844 25.117188 181.730469 70.726562c47.890625 46.097657 74.269531 109.382813 74.269531 178.199219 0 68.8125-26.378906 132.097657-74.269531 178.195313-47.390625 45.609375-111.929688 70.730468-181.730469 70.730468-25.164062 0-49.789062-3.253906-73.195312-9.667968l-46.464844 20.5c-5.035156 2.207031-10.371094 3.292968-15.683594 3.292968zm135.34375-471.976562c-123.140625 0-216 89.816406-216 208.925781 0 60.667969 23.957031 115.511719 67.457031 154.425781 8.023438 7.226563 12.628907 17.015626 13.015625 27.609376l.003906.125 1.234376 40.332031 45.300781-19.988281c8.15625-3.589844 17.355469-4.28125 25.921875-1.945313 20.132812 5.554687 41.332031 8.363281 63.066406 8.363281 123.140625 0 216-89.816406 216-208.921875 0-119.109375-92.859375-208.925781-216-208.925781zm-125.863281 290.628906 74.746093-57.628906c5.050782-3.789062 12.003907-3.839844 17.101563-.046875l55.308594 42.992187c16.578125 12.371094 40.304687 8.007813 51.355469-9.433593l69.519531-110.242188c6.714843-10.523437-6.335938-22.417969-16.292969-14.882812l-74.710938 56.613281c-5.050781 3.792969-12.003906 3.839844-17.101562.046875l-55.308594-41.988281c-16.578125-12.371094-40.304687-8.011719-51.355468 9.429687l-69.554688 110.253907c-6.714844 10.523437 6.335938 22.421874 16.292969 14.886718zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#665dfe"></path></g> </svg>

            <!-- Alternate :: External File link -->
            <!-- <img class="injectable" src="./../assets/media/logo.svg" alt=""> -->
        </a>
        <!-- Logo End -->

        <!-- Main Nav Start -->
        <ul class="nav nav-minimal flex-row flex-grow-1 justify-content-between flex-xl-column justify-content-xl-center" id="mainNavTab" role="tablist">

            <!-- Chats Tab Start -->
            <li class="nav-item">
                <a class="nav-link p-0 py-xl-3 active" id="chats-tab" href="#chats-content" title="چت ها">
                    <!-- Default :: Inline SVG -->
                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>

                    <!-- Alternate :: External File link -->
                    <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/chat-alt-2.svg" alt="Chat icon"> -->
                </a>
            </li>
            <!-- Chats Tab End -->

            <!-- Calls Tab Start -->
            <li class="nav-item">
                <a class="nav-link p-0 py-xl-3 " id="calls-tab" href="#calls-content" title="تماس می گیرد">
                    <!-- Default :: Inline SVG -->
                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>

                    <!-- Alternate :: External File link -->
                    <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/phone.svg" alt="Phone icon"> -->
                </a>
            </li>
            <!-- Calls Tab End -->

            <!-- Friends Tab Start -->
            <li class="nav-item">
                <a class="nav-link p-0 py-xl-3" id="friends-tab" href="#friends-content" title="دوستان">
                    <!-- Default :: Inline SVG -->
                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>

                    <!-- Alternate :: External File link -->
                    <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/users.svg" alt="Friends icon"> -->
                </a>
            </li>
            <!-- Friends Tab End -->

            <!-- Profile Tab Start -->
            <li class="nav-item">
                <a class="nav-link p-0 py-xl-3" id="profile-tab" href="#profile-content" title="مشخصات">
                    <!-- Default :: Inline SVG -->
                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Alternate :: External File link -->
                    <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/user-circle.svg" alt="Profile icon"> -->
                </a>
            </li>
            <!-- Profile Tab End -->
        </ul>
        <!-- Main Nav End -->
    </div>
    <!-- Navigation End -->


</div>
</div>
</div>



</body>
</html>
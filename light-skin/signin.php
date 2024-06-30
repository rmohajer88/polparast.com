<?php session_start(); ?>   

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

<body class="authentication-page">

    <!-- Main Layout Start -->
    <div class="main-layout card-bg-1 is-rtl">
        <div class="container d-flex flex-column">
            <div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <h1 class="font-weight-bold">ورود</h1>
                    <p class="text-dark mb-3">ما متفاوت هستیم، ما شما را متفاوت می کنیم.</p>
                    <form class="mb-3"  method="post" action="login.php" >
                        <div class="form-group">
                            <label for="email" class="sr-only">آدرس ایمیل</label>
                            <input type="email" class="form-control form-control-md" id="email" name = "email" placeholder="ایمیل خود را وارد کنید"    placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">رمز عبور</label>
                            <input type="password" class="form-control form-control-md" id="password" name="password" placeholder="رمز عبور خود را وارد کنید"    placeholder="username" required>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked="" id="checkbox-remember">
                                <label class="custom-control-label text-muted font-size-sm" for="checkbox-remember">من را بخاطر بسپار</label>
                            </div>
                            <a class="font-size-sm" href="reset-password.html">بازنشانی رمز عبور</a>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">ورود</button>
                    </form>

                    <p>حساب کاربری ندارید؟ <a class="font-weight-medium" href="signup.html">ثبت نام کنید</a>.</p>

                    <div > <?php
                    // Check if the message parameter is set in the URL
                    if(isset($_GET['message'])) {
                    // Get the message from the URL
                    $message = $_GET['message'];  // Output the message in alert
                    echo '<script type="text/javascript">alert("' . $message . '")</script>';
                    
                    
                    $message = "<div class='btn-warning btn-primary'>$message</div>";
                    echo $message;
                    } else {
                             // If the message parameter is not set, show a default message
                             echo "";
                    }
                        ?>

                     </div>
        
                </div>
            </div> 
        </div>
    </div>
    <!-- Main Layout End -->
  

    <!-- Javascript Files -->
    <script src="../assets/vendors/jquery/jquery-3.5.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/svg-inject/svg-inject.min.js"></script>
    <script src="../assets/js/app.min.js"></script>

    <script>
         


        // function where the focus displays a message if the current input field is empty or it's length is less than 5
        function checkifinputisemptyorlessthan5(){

            //const submitBtn = document.getElementById('submitBtn');
            const form =document.querySelector('form')
            const inputEmail = document.getElementById('email');
            const inputPassword = document.getElementById('password');
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            

            form.addEventListener('click', function(event) {
                 
                    //check conditions for email input
                    if (inputEmail.value.trim() === '' || !emailRegex.test(inputEmail.value)) {
                        inputEmail.setCustomValidity('فرمت ایمیل را درست وارد کنید');
                    } else {
                        inputEmail.setCustomValidity('');
                    }

                    //check conditions for email input
                    if (inputPassword.value.trim() === '' ) {
                        inputPassword.setCustomValidity('  رمز  را وارد کنید');
                    } else {
                        inputPassword.setCustomValidity('');
                    }

                    });
                    

                    inputEmail.addEventListener("mouseover", function() {
                        this.title = "ایمیل را وارد کنید";});

                    inputPassword.addEventListener("mouseover", function() {
                        this.title = "رمز را وارد کنید";});
        }
        
        checkifinputisemptyorlessthan5();

    </script>
  

</body>
</html>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/css/bootstrap.min.css">   
    <link rel="stylesheet" href="assets/style.css"> <!-- Custom styles -->
    <script src="assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
    <title>فرصت های شغلی در ایران برای افغان ها</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: url('assets/media/hero.webp') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .features img, .how-it-works img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        footer .social-media a {
            margin: 0 10px;
            color: white;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .list-group-item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
        }
        .list-group-item:hover {
            background-color: #e2e3e5;
            border-color: #adb5bd;
        }
        .collapse {
            margin-bottom: 1rem;
        }
        .card-body {
            padding: 1.25rem;
        }

        .enamad{
            display: block;
            position: relative;
            bottom: 0;
            float: left;
            margin-top: 20px;
        }

        .hero-section{
            margin-bottom:15px;
        }



                .list-group-item {
        position: relative; /* Necessary for positioning the plus sign */
        }

        .list-group-item::before {
        content: '+';
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: green;
        font-size: 1.2rem;
        transition: transform 0.3s ease-in-out;
        }

        .collapse.show + .list-group-item::before {
        transform: translateY(-50%) rotate(45deg);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body >

<header class="hero-section">
    <div class="container">
      <h1>فرصت های شغلی در ایران</h1>
      <p>پیدا کردن کار مناسب در ایران، آسان و سریع.</p>
      <button class="btn btn-light btn-lg" onclick="window.location.href = 'start.html'">جستجوی کار همین حالا</button>
    </div>
</header>

<section class="features">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h2>ثبت نام آسان</h2>
                <p>ثبت نام سریع و بدون دردسر</p>
                <img src="assets/media/register.webp" alt="A graphic of a person filling out a form">
            </div>
            <div class="col-md-4">
                <h2>فرصت های متنوع شغلی</h2>
                <p>شغل مورد نظر خود را از بین صدها فرصت انتخاب کنید.</p>
                <img src="assets/media/job.webp" alt="A graphic of a diverse group of people">
            </div>
            <div class="col-md-4">
                <h2>پشتیبانی قوی</h2>
                <p>تیم پشتیبانی ما همیشه در کنار شماست.</p>
                <img src="assets/media/support.webp" alt="A graphic of a support team">
            </div>
        </div>
    </div>
</section>

<section class="how-it-works">
 <div class="container">
        <h2>چگونه کار می کند؟</h2>
        <ol class="list-group">
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#collapseOne">ثبت نام کنید</a>
                <div id="collapseOne" class="collapse">
                    <div class="card card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">دنبال کار خوب هستی؟</h5>
                                            <p class="card-text">می‌خوای یه کار خوب پیدا کنی؟ اینجا همه چی هست! مثل یه بازار کاره که توش همه جور کاری پیدا میشه. تو هم می‌تونی بیای اینجا و بهترین کار رو برای خودت انتخاب کنی.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">دنبال کار بلد میگردی ؟</h5>
                                            <p class="card-text">می‌خوای کارگر پیدا کنی؟ خیلی راحته! اینجا مثل یه بازار کاره. شما یه مغازه کوچولو می‌زنی و آگهی کار می‌دی. بعد کلی آدم میان و رزومه‌شون رو نشونت می‌دن. شما هم اونایی که به کارت می‌خورن رو انتخاب می‌کنی.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#collapseTwo">پروفایل خود را تکمیل کنید</a>
                <div id="collapseTwo" class="collapse">
                    <div class="card card-body">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">موبایلت، وارد کن</h5>
                                            <p class="card-text">"فقط با شماره موبایلت، به دنیای فرصت‌های شغلی جدید بپیوند. امنیت اطلاعاتت برامون مهمه؛ پس با تایید شماره موبایلت، حساب کاربریت رو فعال کن و از همه امکاناتمون استفاده کن."</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#collapseThree">جستجوی کار مناسب</a>
                <div id="collapseThree" class="collapse">
                    <div class="card card-body">
                        <div class="col-md-6">
                                 <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">جستجوی کار</h5>
                                            <p class="card-text">" با ما، جستجوی کار راحت‌تر از همیشه است"</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#collapseFour">با کارفرما تماس بگیرید</a>
                <div id="collapseFour" class="collapse">
                    <div class="card card-body">
                        <div class="col-md-6">
                                 <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">ارتباط با کارفرما </h5>
                                            <p class="card-text">" ارتباط با کارفرما خیلی آسونه، مثل یه تماس تلفنی معمولی! هیچ هزینه‌ای هم نداره. هر سوالی داشتی، راحت از کارفرما بپرس."</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </li>
        </ol>
        <img src="assets/media/do.webp" alt="A graphic of a numbered list or flowchart depicting the steps involved in the job-seeking process">
    </div>
</section>

<a class="enamad" referrerpolicy='origin' target='_blank'
    href='https://trustseal.enamad.ir/?id=512658&Code=No2vUFdTUrn0O4RIyRS90Bw099nUNDN4'><img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=512658&Code=No2vUFdTUrn0O4RIyRS90Bw099nUNDN4' alt='' style='cursor:pointer' code='No2vUFdTUrn0O4RIyRS90Bw099nUNDN4'>
</a>

<footer>
    <div class="container">
        <p> polparast.com 2023 &copy; </p>
        <ul class="social-media list-inline">
            <li class="list-inline-item"><a href="#">فیس‌بوک</a></li>
            <li class="list-inline-item"><a href="#">توییتر</a></li>
            <li class="list-inline-item"><a href="#">اینستاگرام</a></li>
        </ul>
        <p>تمامی حقوق معنوی سایت متعلق به پل پرست می باشد</p>
    </div>
</footer>
    
<script>
    $(document).ready(function() {
        $('.list-group-item').on('click', function(event) {
            event.preventDefault();
            $(this).find('.collapse').collapse('toggle');
        });
    });
</script>
</body>
</html>

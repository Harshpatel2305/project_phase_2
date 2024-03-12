<?php
session_start();
include 'includes/db.php';
include 'includes/main_2.php';
include 'includes/header_2.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_2.css">
    <style>
        img{
            height: auto;
            width: 100%;
            margin-top: 0;
        }
    </style>
</head>

<body>
    
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_03.png" alt="">
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_04.png" alt="">
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_05.png" alt="">
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_06.png" alt="">
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_07.png" alt="">
    <img src="https://static1.lenskart.com/media/desktop/img/Oct21/deskf_08.png" alt="">

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
                <a href="sunglasses.php"> <i class="fas fa-angle-right"></i>sunglasses </a>
                <a href="computerglasses.php"> <i class="fas fa-angle-right"></i> computerglasses</a>


                <a href="cart.php"> <i class="fas fa-angle-right"></i> cart</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="my-orders.php"> <i class="fas fa-angle-right"></i> my order </a>
                <a href="contact.php"> <i class="fas fa-angle-right"></i> contact</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="https://www.twitter.com"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
            </div>
            <div class="box">
                <h3>Join us</h3>
                <a href="login.php"> <i class="fas fa-angle-right"></i>Log in</a>
                <a href="register.php"> <i class="fas fa-angle-right"></i>Register</a>

            </div>
            <div class="box">
                <h3>Download the App</h3>
                <a href="#"> <img class="download-image" src="images/google-play-logo.png" alt=""></a>

                <a href="#"> <img class="download-image" src="images/app-store-logo.png" alt=""></a>

            </div>



        </div>

        <div class="credit">Thank you for your visit! </div>

    </section>


</body>

</html>
<?php
session_start();

include("includes/db.php");
//include("functions/functions.php");
//include("includes/header_2.php");
include("includes/main_2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/style_2.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .footer .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    gap: 1.5rem;
}

    </style>

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>

</head>

<body>

    <!-- header section starts  -->

    <?php include 'includes/header_2.php';?>
    <!-- header section ends -->

    <!-- header section  -->

    <section class="heading">
        <h1>about us</h1>
        <p> <a href="home.html">home</a> >> about </p>
    </section>

    <!-- header section -->

    <!-- about section starts  -->


    <!-- about section ends -->
    <?php

    $get_about_us = "select * from about_us";

    $run_about_us = mysqli_query($con, $get_about_us);

    $row_about_us = mysqli_fetch_array($run_about_us);

    $about_heading = $row_about_us['about_heading'];

    $about_short_desc = $row_about_us['about_short_desc'];

    $about_desc = $row_about_us['about_desc'];

    $about_image = $row_about_us['about_image'];
    ?>
    <section class="about">

        <h1 class="title">why choose us?</h1>

        <div class="row">

            <div class="image">
                <img src="images/<?php echo $about_image ?>" alt="error">
            </div>

            <div class="content">
                <h3>
                    <?php echo $about_heading; ?>
                </h3>
                <p>
                    <?php echo $about_short_desc; ?>
                </p>
                <p>
                    <?php echo $about_desc; ?>
                </p>
                <!--<a href="#" class="btn">read more</a>-->
            </div>

        </div>

        <div class="icons-container">

            <div class="icons">
                <img src="images/icon-1.png" alt="">
                <h3>all sizes</h3>
            </div>

            <div class="icons">
                <img src="images/icon-2.png" alt="">
                <h3>free delivery</h3>
            </div>

            <div class="icons">
                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/cross-platform-3407062-2840579.png"
                    alt="">
                <h3>dynamic</h3>
            </div>

            <div class="icons">
                <img src="images/icon-4.png" alt="">
                <h3>easy payments</h3>
            </div>

            <div class="icons">
                <img src="images/icon-5.png" alt="">
                <h3>24/7 support</h3>
            </div>

        </div>

    </section>












    <!-- footer section starts  -->

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

    <!-- footer section ends -->

</body>

</html>


<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
    header("Location: login.php");
    exit; // Stop further execution
}
include("includes/db.php");
//include("functions/functions.php");
include("includes/header_2.php");
//include("includes/main.php");

$customer_email = $_SESSION['customer_email'];
$query = "SELECT customer_name FROM customers WHERE customer_email = '$customer_email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$username = $row['customer_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/style_2.css">

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
    <style>
        .icons-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            /* Optional: Add some spacing between icons */
            justify-content: center;
            align-items: center;
        }

        .icons {
            text-align: center;

            /*display: flex;*/
        }

        .home {
            position: relative;
        }

        #next-slide,
        #prev-slide {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            cursor: pointer;
            color: #333;
        }

        #next-slide {
            right: 2rem;
            /* Adjust the right distance as needed */
        }

        #prev-slide {
            left: 2rem;
            /* Adjust the left distance as needed */
        }

        .home #next-slide,
        .home #prev-slide {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            height: 6rem;
            width: 6rem;
            line-height: 5.5rem;
            font-size: 4rem;
            color: #333;
            background-color: transparent;
            border-radius: 0.5rem;
            cursor: pointer;
            text-align: center;
            border: none;
        }

        .lol img {
            height: 2.5rem;
            color: gray;
        }

        .lol img:hover {
            color: crimson;
        }

        @media (max-width:450px) {

            html {
                font-size: 50%;
            }

            .home .slide .content h3 {
                font-size: 3rem !important;
            }

            .shopping-cart .box-container .box {
                flex-flow: column;
            }

        }
        .download-image{
            height: auto;
            width: 100px;
        }
    </style>
</head>

<body>
    <!--<div id="user-info">
        <span>
            <?php //echo $userId; ?>
        </span>
        <span>Welcome,
            <?php //echo $username; ?>
        </span>
        <span>Email:
            <?php //echo $_SESSION['customer_email']; ?>
        </span>
        <span>Mobile:
            <?php //echo $mobileNumber; ?>
        </span>
    </div>-->
    <!-- header section starts  -->
        <h1 class="title" style="margin-top:1.5rem;">Welcome, <?php echo $username;?></h1>

    <!-- header section ends -->

    <!-- home section starts      -->

    <section class="home">

    <!-- home section ends     -->
        <div class="slide active" style="background: url('https://images.unsplash.com/photo-1473496169904-658ba7c44d8a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); ">
            <div class="content">
                <h3>shop trending <br> sunglasses</h3>
                <a href="sunglasses.php" class="btn " style="border: 0.2rem solid #333 !important">Discover</a>
            </div>
        </div>

        <div class="slide"
            style="background: url(images/home-bg-2.png);">
            <div class="content">
            <h3>shop trending <br> computerglasses</h3>
                <a href="computerglasses.php" class="btn" style="border: 0.2rem solid #333 !important;">Discover</a>
            </div>
        </div>

        <!--<div class="slide"
            style="background: url('https://www.eyecarelive.com/wp-content/uploads/2021/02/Contact-Lens-Banner-01-1-scaled.webp');">
            <div class="content">
                <span style="color:#333">protect your eyes</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn" style="border: 0.2rem solid #333 !important">about us</a>
            </div>
        </div>-->

        <div id="next-slide" onclick="next()" class="fas fa-angle-right"></div>
        <div id="prev-slide" onclick="prev()" class="fas fa-angle-left"></div>

    </section>
    <!-- home section ends     -->

    <!-- banner section starts  --> <br><br>
    <h1 class="title">Browse Products</h1>
    <section class="banner">

        <div class="box">
            <img src="images/banner-4.jpg" alt="">
            <div class="content">
                <span>Shop Sunglasses</span>
                <!--<h3>upto 50% off</h3>--> <br>
                <a href="sunglasses.php" class="btn">shop now</a>
            </div>
        </div>

        <div class="box">
            <img src="images/banner-2.jpg" alt="">
            <div class="content">
                <span>Shop Spactacles</span>
                <br>
                <a href="computerglasses.php" class="btn">shop now</a>
            </div>
        </div>

        <!--<div class="box">
            <img src="images/banner-5.jpg" alt="">
            <div class="content">
                <span>Shop Contact Lenses</span>
                <br>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>-->

    </section>

    <!-- banner section ends -->
    <section class="about">
        <h1 class="title">Popular Brands</h1>

        <div class="icons-container">

            <div class="icons">
                <img src="images/ray-ban-logo.png" alt="">

            </div>

            <div class="icons">
                <img src="images/D&G.png" alt="">

            </div>

            <div class="icons">
                <img src="images/Dior-logo.png" alt="">

            </div>

            <div class="icons">
                <img src="images/fossil-logo.png" alt="">

            </div>

            <div class="icons">
                <img src="images/gucci-logo.png" alt="">

            </div>

        </div>


    </section>




    <!--footer-->
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

<?php
//<?php
session_start();

include("includes/db.php");
include("includes/header_2.php");
//include("functions/functions.php");
// include("includes/main.php");

function getPro3()
{
    global $db;

    $get_products = "SELECT * FROM products where p_cat_id='5'";
    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['product_label'];
        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";
        $run_manufacturer = mysqli_query($db, $get_manufacturer);
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);
        $manufacturer_name = $row_manufacturer['manufacturer_title'];
        $pro_psp_price = $row_products['product_psp_price'];
        $pro_url = $row_products['product_url'];
        $manufacturer_image=$row_manufacturer['manufacturer_image'];

        if ($pro_label == "Sale" or $pro_label == "Gift") {
            $product_price = "<del> $pro_price </del>";
            $product_psp_price = "| $pro_psp_price";
        } else {
            $product_psp_price = "";
            $product_price = "$pro_price";
        }

        if ($pro_label == "") {
            $product_label = "";
        } else {
            $product_label = "
                <a class='label sale' href='#' style='color:black;'>
                    <div class='thelabel'>$pro_label</div>
                    <div class='label-background'> </div>
                </a>";
        }

        // Display the product box with the desired style
        echo "
        <div class='box'>
            <div class='image'>
                
                <a href='$pro_url'><img src='seller/product_images/$pro_img1' alt='Product Image' style='width: 100%;'></a>
            </div>
            <div class='content'>
                <h3>$pro_title</h3>
                <img src='admin_area/other_images/$manufacturer_image' style='height:50px; margin-top:0.5rem;'>
                
                <!--<div class='stars'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star-half-alt'></i>
                </div>-->
                <div class='price'>
                ₹$product_price</div>
                <div class='price'>
                <a href='$pro_url'><button class='btn'><i class='fa-solid fa-circle-info'></i>&nbsp;view details</button></a>
                <a href='$pro_url'><button class='btn'><i class='fas fa-shopping-cart'></i>&nbsp;add to cart</button></a>

                </div>
            </div>
            
        </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles/style_2.css">
    <script src="js/script.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/style_2.css">
    <style>
        .products .box-container .box{
            background-color: white;
            width: 410px;
            max-width: 410px;
        }
        .products .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(32rem, 0.35fr))!important;
    gap: 1.5rem;
}
    </style>
    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
</head>

<body>
<section class="heading">
        <h1>computerglasses</h1>
    </section>

    <section class="products">
        
        <div class="box-container">
            <?php
            // Call the function to display products
            getPro3();
            
            ?>
        </div>
    </section>
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

    <!-- Add your other HTML elements, scripts, and closing tags here -->
</body>

</html>
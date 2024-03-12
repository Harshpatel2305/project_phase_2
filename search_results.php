<?php
session_start();

include("includes/db.php");
//include("functions/functions.php");
include("includes/header_2.php");

// Rest of your PHP code...
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles/style.css">
    <script src="js/script.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/style_2.css">
    <script src="js/script.js" defer></script>
    
    <style>
    body {
        background-color: white;
    }

    .title {
        margin-top: 1.5rem;
    }

    .box {
        width: 430px;
        max-width: 430px;
    }

    .price {
        align-items: center;
        justify-content: space-between;
    }

    .box-container .box {
        margin-left: 0px;
    }
    .products .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr))!important;
    gap: 1.5rem;
    justify-items: center;
}
.footer .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    gap: 1.5rem;
}
img{
    justify-content: center;
    align-items: center;
}
</style>

</head>
<body>
<section class="heading">
        <h1>search results</h1>
    </section>

    <?php
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];
        // Display search results message before products section
        echo "<h1 class='title' >Search results for: $search_query</h1>";
    }
    ?>

    <section class="products">
        <div class="box-container">
        <?php
//session_start();

include("includes/db.php");
//include("includes/header_2.php");

// Check if there is a search query
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
    // Display search results message before products section
    
    // SQL to retrieve products containing the search query in their title
    $query = "SELECT * FROM products WHERE product_title LIKE '%$search_query%'";

    $run_query = mysqli_query($db, $query);

    if (mysqli_num_rows($run_query) > 0) {
        echo '<section class="products">';
        echo '<div class="box-container">';

        while ($row = mysqli_fetch_array($run_query)) {
            // Extract product details from the row
            $pro_id = $row['product_id'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_img1 = $row['product_img1'];
            $manufacturer_id = $row['manufacturer_id'];
            $pro_url = $row['product_url']; // Fetch product URL

            // Get manufacturer name from manufacturers table
            $manufacturer_query = "SELECT manufacturer_title FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
            $manufacturer_result = mysqli_query($db, $manufacturer_query);
            $manufacturer_row = mysqli_fetch_assoc($manufacturer_result);
            $manufacturer_name = $manufacturer_row['manufacturer_title'];

            // Display product box
            echo "<div class='box'>
                        <div class='image'>
                            <a href='details.php?pro_id=$pro_url'><img src='admin_area/product_images/$pro_img1' alt='$pro_title'></a>
                        </div>
                        <div class='content'>
                            <h3>$pro_title</h3>
                            <h4>$manufacturer_name</h4>
                            <div class='price'>$$pro_price</div>
                            <div class='price' style='display:flex;'>
                                <a href='$pro_url'><button class='btn'><i class='fa-solid fa-circle-info'></i>&nbsp;view details</button></a>
                                <a href='$pro_url'><button class='btn'><i class='fas fa-shopping-cart'></i>&nbsp;add to cart</button></a>
                            </div>
                        </div>
                    </div>";
        }

        echo '</div>';
        echo '</section>';
    } else {
        // If no search results found
        //echo "<h1 class='title'>No search result found.</h1> <br>";
        echo "<img src='https://www.kalpamritmarketing.com/design_img/no-product-found.jpg'>";
        
    }
} else {
    // If no search query provided
    echo "<h1 class='title'>No item has been searched by you.</h1>";
}

//include("includes/footer.php");
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


</body>
<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
    exit();
} else {
    include("includes/db.php");
    include("includes/header_2.php");
    include("includes/main_2.php");

    if (isset($_POST['delete']) && $_POST['delete'] == 'yes') {
        // Delete account logic here
        $customer_email = $_SESSION['customer_email'];
        $delete_customer_query = "DELETE FROM customers WHERE customer_email = '$customer_email'";
        $run_delete_query = mysqli_query($con, $delete_customer_query);

        // Check if the account was deleted successfully
        if ($run_delete_query) {
            // Account deleted successfully
            echo "<script>alert('Your account has been deleted successfully.')</script>";
            echo "<script>window.open('home.php','_self')</script>";
            exit();
        } else {
            // Account deletion failed
            echo "<script>alert('Failed to delete your account. Please try again.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        /* Centering the content */
        .main-content {
            height: 20%;
            margin-top: 2rem;
            display: grid;
            justify-content: center;
            align-items: center;

        }
        .footer .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    gap: 1.5rem;
}

        .test {}

        h2 {
            display: grid;
            justify-content: center;
            align-items: center;

        }

        .main-content p {
            display: grid;
            justify-content: center;
            align-items: center;

        }

        /* Style for buttons */
        .btn {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-delete {
            background-color: #ff0000;
            color: #fff;
        }

        .btn-not-delete {
            background-color: #0066ff;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_2.css">
</head>

<body>
    <section class="heading">
        <h1>Delete account</h1>
        <p><a href="home.php">home</a>>> Delete account</p>
    </section>

    <div class="main-content">

        <p>Are you sure you want to delete your account?</p>
        <form action="delete-account.php" method="post">
            <button type="submit" name="delete" value="yes" class="btn btn-delete">Yes, I want to delete my
                account</button>
            <button type="submit" name="delete" value="no" class="btn btn-not-delete">No, I don't want to delete my
                account</button>
        </form>
    </div>
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

<?php

?>
<?php
session_start();

include("includes/db.php");
 include("includes/header_2.php");
//include("functions/functions.php");
// include("includes/main.php");

$get_contact_us = "select * from contact_us";
$run_conatct_us = mysqli_query($con, $get_contact_us);
$row_conatct_us = mysqli_fetch_array($run_conatct_us);

$contact_heading = $row_conatct_us['contact_heading'];
$contact_desc = $row_conatct_us['contact_desc'];
//$contact_email = $row_conatct_us['contact_email'];
$contact_location = $row_conatct_us['contact_location']; // Remove the $ before contact_location


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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/style_2.css">

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
    <style>
        .contact .row form .box,
        .contact .row form select {
            width: 100%;
            border-bottom: 0.2rem solid #333;
            margin-bottom: 1rem;
            padding: 1rem 0;
            font-size: 1.6rem;
            color: #666;
            text-transform: none;
        }
        
.download-image{
    height: auto;
    width: 100px;
}
    </style>

</head>

<body>

    <!-- header section starts  -->

    
    <!-- header section ends -->

    <!-- header section  -->

    <section class="heading">
        <h1>contact us</h1>
        <p> <a href="home.html">home</a> >> contact </p>
    </section>

    <!-- header section -->

    <!-- contact section starts  -->

    <section class="contact">

        <h1 class="title">
            <?php echo $contact_heading; ?>
        </h1>
        <h4 class="title">
            <?php echo $contact_desc; ?>
        </h4>
        <div class="row">

            <form action="dummy_contact_2.php" method="post">
                <input type="text" placeholder="Enter your name" name="name" class="box">
                <input type="email" placeholder="Enter your email" name="email" class="box">
                <input type="text" placeholder="Enter subject" name="subject" class="box">
                <textarea name="message" placeholder="Enter your message" id="" cols="30" rows="10"></textarea>
                <select name="enquiry_type" id="">
                    <?php
                    $get_enquiry_types = "select * from enquiry_types";
                    $run_enquiry_types = mysqli_query($con, $get_enquiry_types);
                    while ($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)) {
                        $enquiry_title = $row_enquiry_types['enquiry_title'];
                        echo "<option value='$enquiry_title'> $enquiry_title </option>";
                    }
                    ?>
                </select>
                <input type="submit" value="send message" name="submit" class="btn">
            </form>
                    <?php echo $contact_location; ?>
        </div>

    </section>

    <!-- contact section ends -->

    <?php

    if (isset($_POST['submit'])) {

        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];
        $enquiry_type = $_POST['enquiry_type'];

        // Insert data into the contact_page table
        $insert_contact = "INSERT INTO contact_page (name, email, subject, message, enquiry_type) 
                         VALUES ('$sender_name', '$sender_email', '$sender_subject', '$sender_message', '$enquiry_type')";

        $run_insert_contact = mysqli_query($con, $insert_contact);

        if ($run_insert_contact) {
            echo "<script>alert('Your message has been sent Successfully <3')</script>";

            echo "<script>window.open('index.php','_self')</script>";

        } else {
            echo "Error: " . $insert_contact . "<br>" . mysqli_error($con);
        }

    }

    ?>

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
<?php

session_start();

include("includes/db.php");
include("includes/header_2.php");
//include("functions/functions.php");
//include("includes/main.php");

?>


<<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/style_2.css">
  <script src="js/script.js" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .inputBox textarea {
      text-align: justify;
      margin: 1rem 0;
      display: flex;
      border-radius: 0.5rem;
      background: #eee;
      padding: 0.5rem 1rem;
      align-items: center;
      gap: 1rem;
      font-size: 1.5rem;
    }
  </style>
</head>

<body>

  <section style="background-color:crimson;" class="heading">
    <h1>account</h1>
    <p> <a href="home.php">Home</a> >> Register </p>
  </section>

  <section class="register-form">
    <form action="register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
      <h3>Register Now</h3>
      <span id="name-error" style="color:red; font-size:15px;"></span>
      <div class="inputBox">
        <span class="fas fa-user"></span>
        <input type="text" name="c_name" placeholder="Enter your name" id="name-field" required onkeyup="validateUsername()">
        
      </div>
      <span id="email-error" style="color:red; font-size:15px;"></span>
      <div class="inputBox">
        <span class="fas fa-envelope"></span>
        <input type="email" name="c_email" placeholder="Enter your email" id="email-field" required onkeyup="validateEmail()">
        
      </div>
      <span id="pass-error" style="color:red; font-size:15px;"></span>
      <div class="inputBox">
        <span class="fas fa-lock"></span>
        <input type="password" name="c_pass" placeholder="Enter your password" id="pass-field" required onkeyup="validatePassword()">
        
      </div>
      <div class="inputBox">
        <span class="fa-solid fa-city"></span>
        <select name="c_city" id="" placeholder="">
          <option value="ahmedabad">Ahmedabad</option>
          <option value="surat">Surat</option>
        </select>
      </div>
      <div class="inputBox">
        <span class="fa-solid fa-location-dot"></span>
        <textarea type="text" name="c_address" id="" placeholder="Enter your address" cols="50" rows="4"></textarea>
      </div>
      <span id="mobileNoError" style="color: red; font-size:15px;"></span>
      <div class="inputBox">
        <span class="fas fa-mobile-alt"></span>
        <input type="number" name="c_contact" id="mobile_number" placeholder="Enter your mobile number" maxlength="10" required onkeyup="validateMobileNumber()">
        
      </div>
      

      <input type="submit" name="register" value="Sign Up" class="btn" id="submitbutton">
      <a href="login.php" class="btn">Already have an account</a>
    </form>
  </section>

  <script type="text/javascript">
    function validateMobileNumber() {
      var mobile_number = document.getElementById("mobile_number").value;

      if (/^\d{10}$/.test(mobile_number) && mobile_number !== '0000000000') {
        document.getElementById("mobileNoError").innerHTML = "";
        return true;
      }

      document.getElementById("mobileNoError").innerHTML = "Please Enter A Valid 10-Digit Mobile Number";
      return false;
    }

    function validateEmail() {
      var emailField = document.getElementById("email-field").value;
      var pattern = /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;

      if (pattern.test(emailField)) {
        document.getElementById("email-error").innerHTML = "";
        return true;
      }

      document.getElementById("email-error").innerHTML = "Please enter a valid email address";
      return false;
    }

    function validatePassword() {
      var passField = document.getElementById("pass-field").value;

      if (passField.length >= 8 && passField.length <= 15) {
        document.getElementById("pass-error").innerHTML = "";
        return true;
      }

      document.getElementById("pass-error").innerHTML = "Password should be between 8 and 15 characters long";
      return false;
    }

    function validateUsername() {
      var nameField = document.getElementById("name-field").value;

      if (nameField.length >= 4 && nameField.length <= 15) {
        document.getElementById("name-error").innerHTML = "";
        return true;
      }

      document.getElementById("name-error").innerHTML = "Username should be between 4 and 15 characters long";
      return false;
    }

    function validateForm() {
      return validateUsername() && validateEmail() && validatePassword() && validateMobileNumber();
    }
  </script>

 <?php
// session_start();
include("includes/db.php");

if (isset($_POST['register'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  // Remove the following lines related to image handling
  // $c_image = $_FILES['c_image']['name'];
  // $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealUserIp();

  // $destination_directory = "customer/customer_images/";
  // if (move_uploaded_file($c_image_tmp, $destination_directory . $c_image)) {
  //   $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  //   $run_customer = mysqli_query($con, $insert_customer);

  $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_city, customer_contact, customer_address, customer_ip) VALUES ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_ip')";
  $run_customer = mysqli_query($con, $insert_customer);

  if ($run_customer) {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been Registered Successfully')</script>";
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    echo "<script>alert('Registration failed. Please try again.')</script>";
  }
  // } else {
  //   echo "<script>alert('Failed to move the uploaded image. Please try again.')</script>";
  // }
}
?>

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

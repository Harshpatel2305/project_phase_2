<?php

session_start();

include("includes/db.php");
include("includes/header_2.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles/style_2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>
  <style>
    .error {
      color: red;
      font-size: 12px;
      margin-top: -5px;
    }
  </style>
</head>

<body>

  <section style="background-color:crimson;" class="heading">
    <h1>Login</h1>
    <p> <a href="home.php">Home</a> >> Login </p>
  </section>

  <section class="login-form">
    <form action="login.php" method="post" enctype="multipart/form-data">
      <h3>Login Now</h3>
      <div id="email-error" class="error"></div>
      <div class="inputBox">
        <span class="fas fa-envelope"></span>
        <input type="email" name="c_email" placeholder="Enter your email" id="email-field" required>
        
      </div>
      <div id="password-error" class="error"></div>
      <div class="inputBox">
        <span class="fas fa-lock"></span>
        <input type="password" name="c_pass" placeholder="Enter your password" id="password-field" minlength="8" required>
        
      </div>

      <input type="submit" name="login" value="Login" class="btn">
      <a href="register.php" class="btn">Don't have an account?</a>
    </form>
  </section>

  <script>
    const emailField = document.getElementById("email-field");
    const passwordField = document.getElementById("password-field");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    emailField.addEventListener("input", function() {
      if (!emailField.validity.valid) {
        emailError.textContent = "Please enter a valid email address";
      } else {
        emailError.textContent = "";
      }
    });

    passwordField.addEventListener("input", function() {
      if (passwordField.value.length < 8) {
        passwordError.textContent = "Password should be at least 8 characters long";
      } else {
        passwordError.textContent = "";
      }
    });
  </script>

  <?php
  if (isset($_POST['login'])) {
    $c_email = mysqli_real_escape_string($con, $_POST['c_email']);
    $c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);

    // Validate email format
    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Invalid email format')</script>";
      exit();
    }

    // Validate password length
    if (strlen($c_pass) < 8) {
      echo "<script>alert('Password should be at least 8 characters long')</script>";
      exit();
    }

    $sel_customer = "SELECT * FROM customers WHERE customer_email='$c_email' AND customer_pass='$c_pass'";
    $run_customer = mysqli_query($con, $sel_customer);
    $check_customer = mysqli_num_rows($run_customer);

    if ($check_customer == 0) {
      echo "<script>alert('Password or email is incorrect, please try again!')</script>";
      exit();
    }

    if ($check_customer == 1) {
      $_SESSION['customer_email'] = $c_email;
      echo "<script>window.open('home.php','_self')</script>";
    }
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

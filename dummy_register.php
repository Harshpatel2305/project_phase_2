<?php

session_start();

include("includes/db.php");
//include("includes/header.php");
include("functions/functions.php");
//include("includes/main.php");

?>


<!DOCTYPE html>
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

  <header class="header">
    <a href="home.html" class="logo"> Glassify </a>

    <nav class="navbar">
      <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="">Products+</a>
          <ul>
            <li><a href="sun-glasses.php">Sunglasses</a></li>
            <li><a href="computer-glasses.php">Compuer glasses</a></li>
            <li><a href="contact-lenses.php">Contact Lenses</a></li>
          </ul>
        </li>

        <li><a href="#">pages +</a>
          <ul>
            <li><a href="about.php">about</a></li>
            <li><a href="blogs.php">blogs</a></li>
          </ul>
        </li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="#">account +</a>
          <?php
          if (!isset($_SESSION['customer_email'])) {
            echo ' <ul>
            <li><a href="login.php">login</a></li>
            <li><a href="register.php">register</a></li>
          </ul>';
          } else {
            echo '<ul><li><a href="./logout.php" class="login__link">Logout</a></li><ul>';
          }
          ?>

          <!--<ul>
              <li><a href="login.html">login</a></li>
              <li><a href="register.html">register</a></li>
            </ul>-->
        </li>
        </li>
      </ul>
    </nav>

    <div class="icons">
      <div id="menu-btn" class="fas fa-bars"></div>
      <div id="search-btn" class="fas fa-search"></div>
      <a href="cart.php" class="fas fa-shopping-cart"></a>
      <b>(
        <?php items(); ?>)
      </b>
      <a href="profile.php" class="fa-regular fa-user"></a>
    </div>

    <form action="" class="search-form" >
      <input type="search" name="" placeholder="search here..." id="search-box">
      <label for="search-box" class="fas fa-search"></label>
    </form>
  </header>
  <section style="background-color:crimson;" class="heading">
    <h1>account</h1>
    <p> <a href="home.php">Home</a> >> Register </p>
  </section>

  <section class="register-form">
    <form action="dummy_register.php" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      <?php
      /* Commenting out incomplete or unnecessary code
      if (isset($error)) {
          foreach ($error as $err) {
              echo '<span id="error-msg" style="color:red; font-size:15px;">' . $err . '</span>';
          }
      }
      */
      ?>
      <div class="inputBox">
        <span class="fas fa-user"></span>
        <input type="text" name="c_name" placeholder="Enter your name" id="" required>
      </div>
      <div class="inputBox">
        <span class="fas fa-envelope"></span>
        <input type="email" name="c_email" placeholder="Enter your email" id="email-field" onkeyup="validateEmail()"
          required>
      </div>
      <span id="email-error" style="color:red; font-size:15px;"></span>
      <div class="inputBox">
        <span class="fas fa-lock"></span>
        <input type="password" name="c_pass" placeholder="Enter your password" id="" required>
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
        <input type="tel" name="c_contact" id="mobile_number" placeholder="Enter your mobile number"
          onkeyup="validateMobileNumber()" maxlength="10" required>
      </div>
      

      <input type="submit" name="register" value="Sign Up" class="btn" id="submitbutton">
      <a href="login.php" class="btn">Already have an account</a>
    </form>
  </section>

  <script type="text/javascript">
    var submitButton = document.getElementById("submitbutton");

    function validateMobileNumber() {
      var mobile_number = document.getElementById("mobile_number").value;

      if (/^\d{10}$/.test(mobile_number) && mobile_number !== '0000000000') {
        document.getElementById("mobileNoError").innerHTML = "";
        submitButton.disabled = false;
        return true;
      }

      document.getElementById("mobileNoError").innerHTML = "Please Enter A Valid 10-Digit Mobile Number";
      submitButton.disabled = true;
      return false;
    }

    var emailField = document.getElementById("email-field");
    var emailError = document.getElementById("email-error");
    var submitButton = document.getElementById("submitbutton");

    function validateEmail() {
      if (!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
        emailError.innerHTML = "Please enter a valid email address";
        submitButton.disabled = true;
        return false;
      }

      emailError.innerHTML = "";
      submitButton.disabled = false;
      return true;
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
    echo "<script>window.open('home.php','_self')</script>";
  } else {
    echo "<script>alert('Registration failed. Please try again.')</script>";
  }
  // } else {
  //   echo "<script>alert('Failed to move the uploaded image. Please try again.')</script>";
  // }
}
?>


</body>

</html>
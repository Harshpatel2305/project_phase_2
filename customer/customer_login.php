<?php

session_start();

include("../includes/db.php");
include("../includes/header_2.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title><link rel="stylesheet" href="../styles/style_2.css">
  <link rel="stylesheet" href="../styles/style_2.css">
  <script src="js/script.js" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    
  </style>
</head>

<body>

  <section style="background-color:crimson;" class="heading">
    <h1>Login</h1>
    <p> <a href="home.php">Home</a> >> Login </p>
  </section>

  <section class="login-form">
    <form action="customer_login.php" method="post" enctype="multipart/form-data">
      <h3>Login Now</h3>
      <div class="inputBox">
        <span class="fas fa-envelope"></span>
        <input type="email" name="c_email" placeholder="Enter your email" id="email-field" required>
      </div>
      <div class="inputBox">
        <span class="fas fa-lock"></span>
        <input type="password" name="c_pass" placeholder="Enter your password" id="" required>
      </div>

      <input type="submit" name="login" value="Login" class="btn">
      <a href="register.php" class="btn">Don't have an account?</a>
    </form>
  </section>

  <?php
  if (isset($_POST['login'])) {
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];

    $sel_customer = "select * from customers where customer_email='$c_email' AND customer_pass='$c_pass'";
    $run_customer = mysqli_query($con, $sel_customer);

    $check_customer = mysqli_num_rows($run_customer);

    if ($check_customer == 0) {
      echo "<script>alert('Password or email is incorrect, please try again!')</script>";
      exit();
    }

    if ($check_customer == 1) {
      $_SESSION['customer_email'] = $c_email;
      echo "<script>window.open('http://localhost/project_phase_2/home.php','_self')</script>";
    }
  }
  ?>

</body>

</html>

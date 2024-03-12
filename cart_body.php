<?php
session_start();

include("includes/db.php");
include("includes/header_2.php");
//include("functions/functions.php");
//include("includes/main.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>

  <!-- Font Awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

  <!-- Custom CSS file link -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/style_2.css" defer>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom JS file link -->
  <script src="js/script.js" defer></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");

    * {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none !important;
      outline: none;
      border: none;
      text-transform: capitalize;
      transition: all 0.2s linear;
    }

    html {
      font-size: 62.5%;
      overflow-x: hidden;
    }

    section {
      padding: 2rem 9%;
    }

    .heading {
      text-align: center;
      background: crimson;
    }

    .heading h1 {
      font-size: 3rem;
      text-transform: uppercase;
      color: #fff;
    }

    .heading p {
      color: #fff;
      padding-top: 0.7rem;
      font-size: 1.7rem;
    }

    .heading p a {
      color: #fff;
    }

    .heading p a:hover {
      color: #333;
    }

    .title {
      font-size: 3rem;
      color: #333;
      margin-bottom: 2rem;
      padding: 0 1rem;
      text-align: center;
    }

    .btn {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.8rem 2.8rem;
      font-size: 1.7rem;
      color: #333;
      border: 0.2rem solid #333;
      background: none;
      cursor: pointer;
      border-radius: 0.5rem;
    }

    .btn:hover {
      background: #333;
      color: #fff;
    }

    .header {
      position: sticky;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: #fff;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      padding: 0 9%;
    }

    .header .logo {
      font-size: 2.5rem;
      color: #333;
      font-weight: bolder;
      margin-right: auto;
    }

    .header .navbar ul {
      list-style: none;
    }

    .header .navbar ul li {
      position: relative;
      float: left;
    }

    .header .navbar ul li:hover ul {
      display: block;
    }

    .header .navbar ul li a {
      font-size: 1.7rem;
      color: #666;
      padding: 2rem;
      display: block;
    }

    .header .navbar ul li a:hover {
      background: #eee;
    }

    .header .navbar ul li ul {
      position: absolute;
      left: 0;
      width: 20rem;
      background: #fff;
      display: none;
    }

    .header .navbar ul li ul li {
      width: 100%;
    }

    .header .icons div,
    .header .icons a {
      font-size: 2.5rem;
      color: #333;
      cursor: pointer;
      margin-left: 2rem;
    }

    .header .icons div:hover,
    .header .icons a:hover {
      color: crimson;
    }

    .header .search-form {
      position: absolute;
      top: 99%;
      left: 0;
      right: 0;
      border-top: 0.2rem solid #333;
      background: #fff;
      height: 6rem;
      display: flex;
      align-items: center;
      padding: 2rem;
      -webkit-clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
    }

    .header .search-form.active {
      -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    }

    .header .search-form input {
      width: 100%;
      height: 100%;
      padding-right: 1rem;
      font-size: 1.7rem;
      color: #666;
      text-transform: none;
    }

    .header .search-form label {
      font-size: 2.5rem;
      color: #333;
      cursor: pointer;
    }

    .header .search-form label:hover {
      color: crimson;
    }

    #menu-btn {
      display: none;
    }

    @keyframes fadeIn {
      0% {
        transform: translateY(3rem);
        opacity: 0;
      }
    }

    .home {
      padding: 0;
      position: relative;
    }

    .home .slide {
      display: flex;
      min-height: 60vh;
      padding: 2rem 7%;
      background-size: cover !important;
      background-position: center !important;
      display: flex;
      align-items: center;
      display: none;
    }

    .home .slide.active {
      display: flex;
    }

    .home .slide .content span {
      color: #fff;
      display: block;
      font-size: 2rem;
      animation: fadeIn 0.4s linear 0.2s backwards;
    }

    .home .slide .content h3 {
      color: #333;
      text-transform: uppercase;
      padding: 1rem 0;
      font-size: 6rem;
      animation: fadeIn 0.4s linear 0.4s backwards;
    }

    .home .slide .content .btn {
      animation: fadeIn 0.4s linear 0.6s backwards;
      border: #fff;
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
      border: 0.2rem solid #333;
      background: #fff;
      border-radius: 0.5rem;
      cursor: pointer;
      text-align: center;
    }

    .home #next-slide:hover,
    .home #prev-slide:hover {
      background: #333;
      color: #fff;
    }

    .home #prev-slide {
      right: 9rem;
    }

    .banner {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(31rem, 1fr));
      gap: 1.5rem;
    }

    .banner .box {
      position: relative;
      height: 30rem;
      overflow: hidden;
      border-radius: 0.5rem;
    }

    .banner .box:hover img {
      transform: scale(1.1);
    }

    .banner .box img {
      height: 100%;
      width: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }

    .banner .box .content {
      position: absolute;
      top: 50%;
      right: 2rem;
      transform: translateY(-50%);
    }

    .banner .box .content span {
      font-size: 1.5rem;
      color: #333;
    }

    .banner .box .content h3 {
      font-size: 2rem;
      color: #333;
      padding-top: 1rem;
    }

    .banner .box .content .btn {
      padding: 0.6rem 2rem;
      font-size: 1.5rem;
    }

    .products .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
      gap: 1.5rem;
    }

    .products .box-container .box {
      border-radius: 0.5rem;
      text-align: center;
      border: 0.2rem solid #333;
    }

    .products .box-container .box:hover .image .icons {
      transform: translateY(0);
    }

    .products .box-container .box .image {
      border-radius: 0.5rem;
      overflow: hidden;
      position: relative;
      height: 25rem;
      width: 100%;
    }

    .products .box-container .box .image .icons {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      border-bottom: 0.2rem solid #333;
      transform: translateY(-7rem);
    }

    .products .box-container .box .image .icons a {
      height: 5rem;
      width: 5rem;
      line-height: 5rem;
      font-size: 2rem;
      color: #333;
    }

    .products .box-container .box .image .icons a:hover {
      background: #333;
      color: #fff;
    }

    .products .box-container .box .image img {
      height: 100%;
      width: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }

    .products .box-container .box .content {
      padding: 1.5rem 0;
    }

    .products .box-container .box .content h3 {
      font-size: 2rem;
      color: #333;
    }

    .products .box-container .box .content .stars {
      padding: 1rem 0;
    }

    .products .box-container .box .content .stars i {
      font-size: 1.4rem;
      color: crimson;
    }

    .products .box-container .box .content .price {
      font-size: 2.2rem;
      color: #333;
    }

    .products .box-container .box .content .price span {
      font-size: 1.5rem;
      text-decoration: line-through;
      color: #666;
    }

    .about .row {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .about .row .image {
      flex: 1 1 42rem;
    }

    .about .row .image img {
      width: 100%;
      border-radius: 0.5rem;
    }

    .about .row .content {
      flex: 1 1 42rem;
    }

    .about .row .content h3 {
      font-size: 3.5rem;
      color: #333;
      line-height: 2;
    }

    .about .row .content p {
      font-size: 1.4rem;
      line-height: 2.5;
      color: #666;
      padding: 1rem 0;
    }

    .about .icons-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(16rem, 1fr));
      gap: 1.5rem;
      margin-top: 2.5rem;
    }

    .about .icons-container .icons {
      padding: 3rem 2rem;
      border-radius: 0.5rem;
      border: 0.2rem solid #333;
      text-align: center;
      cursor: pointer;
    }

    .about .icons-container .icons:hover {
      background: #333;
    }

    .about .icons-container .icons:hover img {
      filter: invert(1);
    }

    .about .icons-container .icons:hover h3 {
      color: #fff;
    }

    .about .icons-container .icons img {
      height: 7rem;
      margin-bottom: 1rem;
    }

    .about .icons-container .icons h3 {
      font-size: 1.7rem;
      color: #333;
    }

    .blogs .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
      gap: 1.5rem;
    }

    .blogs .box-container .box {
      border-radius: 0.5rem;
      overflow: hidden;
      border: 0.2rem solid #333;
    }

    .blogs .box-container .box:hover .image img {
      transform: scale(1.1);
    }

    .blogs .box-container .box .image {
      width: 100%;
      height: 25rem;
      overflow: hidden;
    }

    .blogs .box-container .box .image img {
      height: 100%;
      width: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }

    .blogs .box-container .box .content {
      padding: 2rem;
    }

    .blogs .box-container .box .content h3 {
      font-size: 2rem;
      color: #333;
      line-height: 2;
    }

    .blogs .box-container .box .content p {
      font-size: 1.4rem;
      line-height: 2.5;
      color: #666;
      padding: 1rem 0;
    }

    .blogs .box-container .box .content .icons {
      border-top: 0.2rem solid #333;
      padding-top: 2rem;
      margin-top: 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .blogs .box-container .box .content .icons a {
      font-size: 1.4rem;
      color: #666;
    }

    .blogs .box-container .box .content .icons a:hover {
      color: crimson;
    }

    .blogs .box-container .box .content .icons a i {
      padding-right: 0.5rem;
      color: crimson;
    }

    .contact .row {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .contact .row form {
      flex: 1 1 42rem;
      padding: 2rem;
      border-radius: 0.5rem;
      border: 0.2rem solid #333;
    }

    .contact .row form .box,
    .contact .row form textarea {
      width: 100%;
      border-bottom: 0.2rem solid #333;
      margin-bottom: 1rem;
      padding: 1rem 0;
      font-size: 1.6rem;
      color: #666;
      text-transform: none;
    }

    .contact .row form textarea {
      height: 15rem;
      resize: none;
    }

    .contact .row .map {
      flex: 1 1 42rem;
      border-radius: 0.5rem;
      width: 100%;
    }

    .login-form form,
    .register-form form {
      margin: 1rem auto;
      max-width: 40rem;
      border-radius: 0.5rem;
      border: 0.2rem solid #333;
      padding: 2rem;
      text-align: center;
    }

    .login-form form h3,
    .register-form form h3 {
      font-size: 2.2rem;
      text-transform: uppercase;
      color: #333;
      margin-bottom: 0.7rem;
    }

    .login-form form .inputBox,
    .register-form form .inputBox {
      margin: 1rem 0;
      display: flex;
      border-radius: 0.5rem;
      background: #eee;
      padding: 0.5rem 1rem;
      align-items: center;
      gap: 1rem;
    }

    .login-form form .inputBox span,
    .register-form form .inputBox span {
      color: #666;
      margin-left: 1rem;
      font-size: 2rem;
    }

    .login-form form .inputBox input,
    .register-form form .inputBox input {
      width: 100%;
      padding: 1rem;
      background: none;
      font-size: 1.5rem;
      color: #666;
      text-transform: none;
    }

    .login-form form .flex,
    .register-form form .flex {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem 0;
      margin-top: 1rem;
    }

    .login-form form .flex label,
    .register-form form .flex label {
      font-size: 1.5rem;
      cursor: pointer;
      color: #666;
    }

    .login-form form .flex a,
    .register-form form .flex a {
      font-size: 1.5rem;
      color: 0;
      margin-left: auto;
    }

    .login-form form .flex a:hover,
    .register-form form .flex a:hover {
      color: crimson;
    }

    .login-form form input[type=submit],
    .register-form form input[type=submit] {
      background: #333;
      color: #fff;
    }

    .login-form form input[type=submit]:hover,
    .register-form form input[type=submit]:hover {
      background: crimson;
    }

    .login-form form .btn,
    .register-form form .btn {
      width: 100%;
    }

    .shopping-cart .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .shopping-cart .box-container .box {
      border-radius: 0.5rem;
      border: 0.2rem solid #333;
      padding: 3rem 2rem;
      position: relative;
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .shopping-cart .box-container .box .fa-times {
      position: absolute;
      top: 1rem;
      right: 1.5rem;
      font-size: 2.5rem;
      cursor: pointer;
      color: #666;
    }

    .shopping-cart .box-container .box .fa-times:hover {
      color: crimson;
    }

    .shopping-cart .box-container .box img {
      height: 10rem;
    }

    .shopping-cart .box-container .box .content h3 {
      font-size: 1.7rem;
      padding-bottom: 0.5rem;
      color: #333;
    }

    .shopping-cart .box-container .box .content form {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem 0;
    }

    .shopping-cart .box-container .box .content form span {
      color: #666;
      font-size: 1.5rem;
    }

    .shopping-cart .box-container .box .content form input {
      width: 8rem;
      font-size: 1.5rem;
      color: #666;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      background: #eee;
    }

    .shopping-cart .box-container .box .content .price {
      font-size: 2rem;
      color: #333;
    }

    .shopping-cart .box-container .box .content .price span {
      color: #666;
      font-size: 1.5rem;
      text-decoration: line-through;
    }

    .shopping-cart .cart-total {
      padding: 2rem;
      border-radius: 0.5rem;
      border: 0.2rem solid #333;
    }

    .shopping-cart .cart-total h3 {
      margin-bottom: 1rem;
      font-size: 2rem;
      color: #333;
    }

    .shopping-cart .cart-total h3 span {
      color: crimson;
    }

    .footer .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
      gap: 1.5rem;
    }

    .footer .box-container .box h3 {
      font-size: 2.2rem;
      color: #333;
      padding: 1rem 0;
    }

    .footer .box-container .box a {
      display: block;
      font-size: 1.4rem;
      color: #666;
      padding: 1rem 0;
    }

    .footer .box-container .box a:hover {
      color: crimson;
    }

    .footer .box-container .box a:hover i {
      padding-right: 2rem;
    }

    .footer .box-container .box a i {
      color: crimson;
      padding-right: 0.5rem;
    }

    .footer .box-container .box p {
      font-size: 1.5rem;
      color: #666;
      margin-bottom: 1rem;
    }

    .footer .box-container .box form input[type=email] {
      width: 100%;
      padding: 1rem 1.2rem;
      border-radius: 0.5rem;
      background: #eee;
      font-size: 1.6rem;
      text-transform: none;
      margin: 0.5rem 0;
    }

    .footer .credit {
      text-align: center;
      padding: 1rem;
      padding-top: 2.5rem;
      margin-top: 2.5rem;
      font-size: 2rem;
      color: #666;
      border-top: 0.2rem solid #333;
    }

    .footer .credit span {
      color: crimson;
    }

    @media (max-width: 1200px) {
      html {
        font-size: 55%;
      }

      .header {
        padding: 0 2rem;
      }

      section {
        padding: 2rem;
      }
    }

    @media (max-width: 768px) {
      #menu-btn {
        display: inline-block;
      }

      .header {
        padding: 2rem;
      }

      .header .navbar {
        position: absolute;
        top: 99%;
        left: 0;
        right: 0;
        background: #fff;
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
        clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      }

      .header .navbar.active {
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
      }

      .header .navbar ul li {
        width: 100%;
      }

      .header .navbar ul li ul {
        position: relative;
        width: 100%;
      }

      .header .navbar ul li ul li a {
        padding-left: 4rem;
      }
    }

    @media (max-width: 450px) {
      html {
        font-size: 50%;
      }

      .home .slide .content h3 {
        font-size: 3rem;
      }

      .shopping-cart .box-container .box {
        flex-flow: column;
      }
    }

    /*# sourceMappingURL=style.css.map */
  </style>
  <style>
    .navbar {
      position: relative;
      min-height: 50px;
      margin-bottom: 0px;
      border: 1px solid transparent;

    }

    .cart-body {
      display: flex;
      justify-content: space-between;
      padding: 20px;
      margin: 2rem;
    }

    .form-body {
      margin-left: 2.5rem;
      display: flex;
      box-shadow: ;
      height: auto;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      width: 60%;
    }

    .form-body form {
      height: auto;
      padding: 2rem;
      width: 100%;
      background-color: whitesmoke;
    }

    .form-body table {
      border: 2px solid black;
      background-color: white;
      width: 100%;
      text-align: justify;
    }

    .order-details table {
      background-color: white;
      width: 100%;
      text-align: start;
    }

    .form-body form img {
      height: auto;
      max-height: 120px;
    }

    .form-body table th {
      border: 1px solid gray;
    }

    .form-body form a {
      font-size: 1.5rem;
      display: inline-block;
      margin-top: 1rem;
      padding: 0.8rem 2.8rem;
      font-size: 1.7rem;
      color: #333;
      border: 0.2rem solid #333;
      background: none;
      cursor: pointer;
      border-radius: 0.5rem;

    }

    .order-details {
      height: auto;
      width: 40%;
      margin-left: 2rem;
    }

    .box-footer {}

    .pull-right {
      float: right;
    }

    .pull-left {
      float: left;
    }

    @media (max-width: 1024px) {
      .body {
        max-width: 1024px;
      }

      .header,
      .heading {
        max-width: 1024px;
      }

      .cart-body {
        max-width: 1024px;
        display: flex;
        justify-content: space-between;
        padding: 20px;
        margin: 2rem;
      }

      .form-body {
        margin-left: 2.5rem;
        display: flex;
        box-shadow: ;
        height: auto;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        width: 60%;
      }

      .form-body form {
        height: auto;
        padding: 2rem;
        width: 100%;
        background-color: whitesmoke;
      }

      .form-body table {
        border: 2px solid black;
        background-color: white;
      }

      .form-body form img {
        height: auto;
        max-height: 120px;
      }

      .form-body form a {
        font-size: 1.5rem;
      }

      .order-details {
        height: auto;
        width: 40%;
        margin-left: 2rem;
      }

    }

    @media (max-width:768px) {
      .cart-body {
        height: auto;
        width: 100%;
        margin: 0rem;
      }

      .form-body {
        height: auto;
        width: 60%;
        margin-left: 0px;
      }

      .form-body form h1 {
        font-size: 2rem;
      }

      .form-body form p {
        font-size: 1.5rem;
      }

      .form-body table {
        height: auto;
        width: 100%;
        display: inherit;
        font-size: 1rem;
      }

      .form-body table img {
        height: auto;
        max-height: 50px;
      }

      .form-body table th,
      .form-body table tr.form-body table td b {
        font-size: 0.7rem;
      }
    }
  </style>
</head>

<body>

  

    
  <section class="heading">
    <h1>CART</h1>
    <p><a href="home.php">home</a> >> cart </p>
  </section>

  <div class="cart-body">
    <div class="form-body">
      <form action="cart.php" method="post" enctype="multipart-form-data">
        <h1>Shopping Cart</h1>

        <?php
        $ip_add = getRealUserIp();
        $select_cart = "select * from cart where ip_add='$ip_add'";
        $run_cart = mysqli_query($con, $select_cart);
        $count = mysqli_num_rows($run_cart);
        ?>

        <p class="text-muted"> You currently have
          <?php echo $count; ?> item(s) in your cart.
        </p>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th colspan="2">Product</th>
                <th class="lol">Quantity</th>
                <th>Unit Price</th>
                <th>Size</th>
                <th colspan="1">Delete</th>
                <th colspan="2">Sub Total</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $total = 0;
              while ($row_cart = mysqli_fetch_array($run_cart)) {
                $pro_id = $row_cart['p_id'];
                $pro_size = $row_cart['size'];
                $pro_qty = $row_cart['qty'];
                $only_price = $row_cart['p_price'];
                $get_products = "select * from products where product_id='$pro_id'";
                $run_products = mysqli_query($con, $get_products);

                while ($row_products = mysqli_fetch_array($run_products)) {
                  $product_title = $row_products['product_title'];
                  $product_img1 = $row_products['product_img1'];
                  $sub_total = $only_price * $pro_qty;
                  $_SESSION['pro_qty'] = $pro_qty;
                  $total += $sub_total;
                  ?>
                  <tr>
                    <td>
                      <img src="admin_area/product_images/<?php echo $product_img1; ?>">
                    </td>
                    <td><b>
                        <?php echo $product_title; ?>
                      </b></td>
                    <td><input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>"
                        data-product_id="<?php echo $pro_id; ?>" class="quantity form-control"></td>
                    <td>$
                      <?php echo $only_price; ?>.00
                    </td>
                    <td>
                      <?php echo $pro_size; ?>
                    </td>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                    <td>$
                      <?php echo $sub_total; ?>.00
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>

            <tfoot>
              <tr>
                <th colspan="5">Total</th>
                <th colspan="2">$
                  <?php echo $total; ?>.00
                </th>
              </tr>
            </tfoot>
          </table>

          <div class="box-footer">
            <div class="pull-left">
              <a href="home.php" class="btn btn-default">
                <i class="fa fa-chevron-left"></i> Continue Shopping
              </a>
            </div>
            <div class="pull-right">
              <button class="btn btn-info" type="submit" name="update" value="Update Cart">
                <i class="fa fa-refresh"></i> Update Cart
              </button>
              <a href="checkout.php" class="btn">
                Proceed to Checkout <i class="fa fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>

    <?php
    function update_cart()
    {
      global $con;
      if (isset($_POST['update'])) {
        foreach ($_POST['remove'] as $remove_id) {
          $delete_product = "delete from cart where p_id='$remove_id'";
          $run_delete = mysqli_query($con, $delete_product);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo @$up_cart = update_cart();
    ?>


    <div class="order-details">
      <div class="box" id="order-summary">
        <div class="box-header">
          <h3>Order Summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>Order Subtotal</td>
                <th>$
                  <?php echo $total; ?>.00
                </th>
              </tr>
              <tr>
                <td>Shipping and handling</td>
                <th>$0.00</th>
              </tr>
              <tr>
                <td>Tax</td>
                <th>$0.00</th>
              </tr>
              <tr class="total">
                <td>Total</td>
                <th>$
                  <?php echo $total; ?>.00
                </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- footer-->
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function (data) {
    $(document).on('keyup', '.quantity', function () {
      var id = $(this).data("product_id");
      var quantity = $(this).val();
      if (quantity != '') {
        $.ajax({
          url: "change.php",
          method: "POST",
          data: { id: id, quantity: quantity },
          success: function (data) {
            $("body").load('cart_body.php');
          }
        });
      }
    });
  });
</script>

</body>

</html>
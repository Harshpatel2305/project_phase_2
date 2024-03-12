<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="container"><!-- container Starts -->

        <form class="form-login" action="" method="post"><!-- form-login Starts -->

            <h2 class="form-login-heading">seller Login</h2>

            <input type="text" class="form-control" name="seller_email" placeholder="Email Address" required>

            <input type="password" class="form-control" name="seller_pass" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="seller_login">

                Log in

            </button>


        </form><!-- form-login Ends -->

    </div><!-- container Ends -->



</body>

</html>

<?php

if (isset($_POST['seller_login'])) {

    $seller_email = mysqli_real_escape_string($con, $_POST['seller_email']);

    $seller_pass = mysqli_real_escape_string($con, $_POST['seller_pass']);

    $get_seller = "select * from seller where seller_email='$seller_email' AND seller_pass='$seller_pass'";

    $run_seller = mysqli_query($con, $get_seller);

    $count = mysqli_num_rows($run_seller);

    if ($count == 1) {

        $_SESSION['seller_email'] = $seller_email;

        echo "<script>alert('You are Logged in into seller panel')</script>";

        echo "<script>window.open('index.php?dashboard','_self')</script>";

    } else {

        echo "<script>alert('Email or Password is Wrong')</script>";

    }

}

?>
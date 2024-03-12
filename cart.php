<?php
session_start();

include("includes/db.php");
//include("functions/functions.php");
include("includes/header_2.php");
//include("includes/main.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about</title>

  <!-- Font Awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

  <!-- Custom CSS file link -->
  <link rel="stylesheet" href="styles/style_2.css" defer>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom JS file link -->
  <script src="js/script.js" defer></script>
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
      background-color: white;
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
    <h1>Cart</h1>
    <p><a href="home.php">home</a> >> cart </p>
  </section>
  <div>
    <?php
    if (!isset($_SESSION['customer_email'])) {
      echo "Welcome :Guest";
    } else {
      echo "Welcome : " . $_SESSION['customer_email'] . "";
    }
    ?>
  </div>
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
                    <td>₹
                      <?php echo $only_price; ?>.00
                    </td>
                    <td>
                      <?php echo $pro_size; ?>
                    </td>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                    <td>₹
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
                <th colspan="2">₹
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
                <th>₹
                  <?php echo $total; ?>.00
                </th>
              </tr>
              <tr>
                <td>Shipping and handling</td>
                <th>₹0.00</th>
              </tr>
              <tr>
                <td>Tax</td>
                <th>₹0.00</th>
              </tr>
              <tr class="total">
                <td>Total</td>
                <th>₹
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





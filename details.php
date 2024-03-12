<style>
  body {
    background-color: #fff !important;
  }

  /* Additional CSS for slider */
  .carousel-inner .item img {
    width: 100%;
  }

  .carousel-control {
    width: 5%;
    background: rgba(0, 0, 0, 0.5);
  }

  .carousel-control:hover {
    background: rgba(0, 0, 0, 0.8);
  }

  .carousel-control.left {
    left: 0;
  }

  .carousel-control.right {
    right: 0;
  }

  /* Styling for thumbs */
  #thumbs {
    margin-top: 20px;
  }

  .thumb {
    margin-bottom: 10px;
  }

  .thumb img {
    width: 100%;
    height: auto;
  }

  /* Additional styling for description tab */
  #details .tab-content {
    margin-top: 20px;
  }

  #details .tab-content .tab-pane {
    padding: 15px;
  }

  .col-xs-4 {
    border: 2px solid gray;
  }

  .price {
    justify-content: center;
    align-items: center;

    display: flex;
  }
</style>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="styles/bootstrap.min.css">
<link rel="stylesheet" href="styles/backend.css">
<script src="js/script.js" defer></script>
<?php

session_start();

include("includes/db.php");
include("includes/header_2.php");
//include("functions/functions.php");
//include("includes/main.php");

?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {

  echo "<script> window.open('index.php','_self') </script>";

} else {



  $row_product = mysqli_fetch_array($run_product);

  $p_cat_id = $row_product['p_cat_id'];

  $pro_id = $row_product['product_id'];

  $pro_title = $row_product['product_title'];

  $pro_price = $row_product['product_price'];

  $pro_desc = $row_product['product_desc'];

  $pro_img1 = $row_product['product_img1'];

  $pro_img2 = $row_product['product_img2'];

  $pro_img3 = $row_product['product_img3'];

  $pro_label = $row_product['product_label'];

  $pro_psp_price = $row_product['product_psp_price'];

  $pro_features = $row_product['product_features'];

  $pro_video = $row_product['product_video'];

  $status = $row_product['status'];

  $pro_url = $row_product['product_url'];

  if ($pro_label == "") {


  } else {

    $product_label = "

  <a class='label sale' href='#' style='color:black;'>

  <div class='thelabel'>$pro_label</div>

  <div class='label-background'> </div>

  </a>

  ";

  }

  $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

  $run_p_cat = mysqli_query($con, $get_p_cat);

  $row_p_cat = mysqli_fetch_array($run_p_cat);

  $p_cat_title = $row_p_cat['p_cat_title'];




  ?>
  <style>
    section {
      padding: 2rem 9%;
      margin-bottom: 2rem;
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
  </style>
  <section class="heading">
    <h1>product details</h1>
  </section>

  <div id="content"><!-- content Starts -->
    <div class="container"><!-- container Starts -->





      <div class="col-md-12"><!-- col-md-12 Starts -->

        <div class="row" id="productMain"><!-- row Starts -->

          <div class="col-sm-6"><!-- col-sm-6 Starts -->

            <div id="mainImage"><!-- mainImage Starts -->

              <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators"><!-- carousel-indicators Starts -->

                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>

                </ol><!-- carousel-indicators Ends -->

                <div class="carousel-inner"><!-- carousel-inner Starts -->

                  <div class="item active">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                    </center>
                  </div>

                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                    </center>
                  </div>

                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                    </center>
                  </div>

                </div><!-- carousel-inner Ends -->

                <a href="#myCarousel" class="left carousel-control"
                  data-slide="prev"><!-- left carousel-control Starts -->

                  <span class="glyphicon glyphicon-chevron-left"> </span>

                  <span class="sr-only"> Previous </span>

                </a><!-- left carousel-control Ends -->

                <a class="right carousel-control" href="#myCarousel"
                  data-slide="next"><!-- right carousel-control Starts -->

                  <span class="glyphicon glyphicon-chevron-right"> </span>

                  <span class="sr-only"> Next </span>

                </a><!-- right carousel-control Ends -->

              </div>

            </div><!-- mainImage Ends -->

            <?php //echo $product_label;  ?>

          </div><!-- col-sm-6 Ends -->


          <div class="col-sm-6"><!-- col-sm-6 Starts -->

            <div class="box"><!-- box Starts -->

              <h1 class="text-center">
                <?php echo $pro_title; ?>
              </h1>

              <?php


              if (isset($_POST['add_cart'])) {
                $ip_add = getRealUserIp();
                $p_id = $pro_id;
                $product_qty = $_POST['product_qty'];
                $product_size = $_POST['product_size'];
                $customer_email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : ''; // Check if customer_email is set in the session
            
                $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id' AND customer_email='$customer_email'";
                $run_check = mysqli_query($con, $check_product);

                if (mysqli_num_rows($run_check) > 0) {
                  echo "<script>alert('This Product is already added in cart')</script>";
                  echo "<script>window.open('$pro_url','_self')</script>";
                } else {
                  $get_price = "SELECT * FROM products WHERE product_id='$p_id'";
                  $run_price = mysqli_query($con, $get_price);
                  $row_price = mysqli_fetch_array($run_price);
                  $pro_price = $row_price['product_price'];
                  $pro_psp_price = $row_price['product_psp_price'];
                  $pro_label = $row_price['product_label'];

                  if ($pro_label == "Sale" or $pro_label == "Gift") {
                    $product_price = $pro_psp_price;
                  } else {
                    $product_price = $pro_price;
                  }

                  $query = "INSERT INTO cart (p_id, ip_add, qty, p_price, size, customer_email) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_price', '$product_size', '$customer_email')";
                  $run_query = mysqli_query($con, $query);

                  echo "<script>window.open('$pro_url','_self')</script>";
                }
              }


              ?>

              <form action="" method="post" class="form-horizontal"><!-- form-horizontal Starts -->

                <?php

                if ($status == "product") {

                  ?>

                  <div class="form-group"><!-- form-group Starts -->

                    <label class="col-md-5 control-label">Product Quantity </label>

                    <div class="col-md-7"><!-- col-md-7 Starts -->

                      <select name="product_qty" class="form-control">


                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>


                      </select>

                    </div><!-- col-md-7 Ends -->

                  </div><!-- form-group Ends -->

                  <div class="form-group"><!-- form-group Starts -->

                    <label class="col-md-5 control-label">Product Size &nbsp;<a href="size-details.php"> &nbsp;(<span class="fa-solid fa-info"></span>)</a></label> 

                    <div class="col-md-7"><!-- col-md-7 Starts -->

                      <select name="product_size" class="form-control">

                        <option>extra narrow</option>
                        <option>narrow</option>
                        <option>Medium</option>
                        <option>wide</option>
                        <option>extra wide</option>


                      </select>

                    </div><!-- col-md-7 Ends -->


                  </div><!-- form-group Ends -->

                <?php } else { ?>


                  <div class="form-group"><!-- form-group Starts -->

                    <label class="col-md-5 control-label">Bundle Quantity </label>

                    <div class="col-md-7"><!-- col-md-7 Starts -->

                      <select name="product_qty" class="form-control">


                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>


                      </select>

                    </div><!-- col-md-7 Ends -->

                  </div><!-- form-group Ends -->

                  <div class="form-group"><!-- form-group Starts -->

                    <label class="col-md-5 control-label">Bundle Size</label>

                    <div class="col-md-7"><!-- col-md-7 Starts -->

                      <select name="product_size" class="form-control">

                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>


                      </select>

                    </div><!-- col-md-7 Ends -->


                  </div><!-- form-group Ends -->


                <?php } ?>


                <?php

                if ($status == "product") {




                  if ($pro_label == "Sale" or $pro_label == "Gift") {

                    echo "

  <p class='price'>

  Product Price : <del> ₹$pro_price </del><br>

  

  </p>

  ";

                  } else {

                    echo "

  <p class='price'>

  Product Price : ₹$pro_price

  </p>

  ";

                  }

                } else {


                  if ($pro_label == "Sale" or $pro_label == "Gift") {

                    echo "

  <p class='price'>

  Bundle Price : <del> ₹$pro_price </del><br>

  Bundle sale Price : ₹$pro_psp_price

  </p>

  ";

                  } else {

                    echo "

  <p class='price'>

  Bundle Price : ₹$pro_price

  </p>

  ";

                  }


                }

                ?>

                <p class="text-center buttons"><!-- text-center buttons Starts -->

                  <button class="btn btn-danger" type="submit" name="add_cart">

                    <i class="fa fa-shopping-cart"></i> Add to Cart

                  </button>





                </p><!-- text-center buttons Ends -->

              </form><!-- form-horizontal Ends -->

            </div><!-- box Ends -->


            <div class="row" id="thumbs"><!-- row Starts -->

              <div class="col-xs-4"><!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->

              <div class="col-xs-4"><!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->

              <div class="col-xs-4"><!-- col-xs-4 Starts -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Ends -->


            </div><!-- row Ends -->


          </div><!-- col-sm-6 Ends -->


        </div><!-- row Ends -->

        <div class="box" id="details"><!-- box Starts -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#description"
            data-toggle="tab"><!-- btn btn-primary tab Starts -->

            <?php

            if ($status == "product") {

              echo "Product Description";

            } else {

              echo "Bundle Description";

            }

            ?>

          </a><!-- btn btn-primary tab Ends -->


          <hr style="margin-top:0px;">

          <div class="tab-content"><!-- tab-content Starts -->

            <div id="description" class="tab-pane fade in active" style="margin-top:7px;">
              <!-- description tab-pane fade in active Starts -->
              <textarea rows="10" cols="70" readonly>
                <?php echo $pro_desc; ?>
                </textarea>

            </div><!-- description tab-pane fade in active Ends -->



          </div><!-- tab-content Ends -->

        </div><!-- box Ends -->


      </div><!-- col-md-12 Ends -->


    </div><!-- container Ends -->
  </div><!-- content Ends -->




  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>


  </body>

  </html>

<?php } ?>
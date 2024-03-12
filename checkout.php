<?php
session_start();
include("includes/db.php");
//include("functions/functions.php");
include("includes/header_2.php");
include("includes/main_2.php");

// Calculate total amount from cart items
$total = 0;
$ip_add = getRealUserIp();
$select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
$run_cart = mysqli_query($con, $select_cart);
while ($row_cart = mysqli_fetch_array($run_cart)) {
    $pro_id = $row_cart['p_id'];
    $pro_qty = $row_cart['qty'];
    $only_price = $row_cart['p_price'];
    $sub_total = $only_price * $pro_qty;
    $total += $sub_total;
}

// Razorpay API Key
$razorpay_key = "rzp_test_HHcbiM23nOgHx9";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles/style_2.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }

        /* Center the table */
        .cart-table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30vh;
            /* Adjust height as needed */
        }

        .cart-table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            /* Adjust margin as needed */
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cart-table th {
            background-color: crimson;
            color: white;
        }

        .product-img {
            max-width: 100px;
            /* Adjust image size as needed */
            max-height: 100px;
            /* Adjust image size as needed */
        }

        .btn {
            margin-left: 9rem;
            position: relative;
        }
    </style>
</head>

<body>
    <section class="heading">
        <h1>Checkout</h1>
        <p><a href="home.php">Home</a> >> Checkout</p>
    </section>

    <div class="cart-table-container">
        <!-- Display cart items in table format -->
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through cart items and display them
                $ip_add = getRealUserIp();
                $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
                $run_cart = mysqli_query($con, $select_cart);
                while ($row_cart = mysqli_fetch_array($run_cart)) {
                    // Display each cart item details
                    $pro_id = $row_cart['p_id'];
                    $pro_qty = $row_cart['qty'];
                    $only_price = $row_cart['p_price'];
                    $sub_total = $only_price * $pro_qty;
                    $total += $sub_total;

                    // Fetch product information including image URL based on product ID
                    $select_product = "SELECT * FROM products WHERE product_id='$pro_id'";
                    $run_product = mysqli_query($con, $select_product);
                    $row_product = mysqli_fetch_array($run_product);
                    $product_image = $row_product['product_img1'];

                    echo "<tr>";
                    echo "<td>$pro_id</td>";
                    echo "<td><img src='admin_area/product_images/$product_image' alt='Product Image' class='product-img'></td>";
                    echo "<td>$pro_qty</td>";
                    echo "<td>₹$only_price</td>";
                    echo "<td>₹$sub_total</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Checkout form -->
    <div class="form-body">
        <form action="process_payment.php" method="post" id="paymentForm">
            <input type="hidden" name="razorpay_payment_id" id="razorpayPaymentId">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $razorpay_key; ?>"
                data-amount="<?php echo $total/2 * 100; ?>" data-currency="INR" data-name="Glassify"
                data-description="Payment for Order" data-prefill.name="<?php echo $_SESSION['customer_name']; ?>"
                data-prefill.email="<?php echo $_SESSION['customer_email']; ?>" data-theme.color="#F37254"></script>
            <script>
                var form = document.getElementById('paymentForm');
                var razorpayPaymentIdField = document.getElementById('razorpayPaymentId');

                document.addEventListener('payment.success', function (event) {
                    var paymentId = event.detail.razorpay_payment_id;
                    razorpayPaymentIdField.value = paymentId;
                    form.submit();
                });
            </script>

            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
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
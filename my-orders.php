<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
    exit();
} else {
    include("includes/db.php");
    include("includes/header_2.php");
    include("includes/main_2.php");

    // Fetch customer_id using customer_email session variable
    $customer_email = $_SESSION['customer_email'];
    $get_customer_id = "SELECT customer_id FROM customers WHERE customer_email = '$customer_email'";
    $run_customer_id = mysqli_query($con, $get_customer_id);
    $row_customer_id = mysqli_fetch_array($run_customer_id);
    $customer_id = $row_customer_id['customer_id'];
?>
    <style>
        /* Centering the content */
#content {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 3rem;
    height: auto;
}

.container {
    width: 80%;
}

.main-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th,
table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: crimson;
    color: white;
}



table tbody tr:hover {
    background-color: #e2e2e2;
}
tr:nth-child(even){
    background-color: f9f9f9;
}
.footer .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    gap: 1.5rem;
}
    </style>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_2.css">
    <section class="heading">
    <h1>orders</h1>
    <p><a href="home.html">home</a> >> my orders </p>
  </section>
  
  <div id="content">
    <div class="container">
        <div class="main-content">
            <h2>My Orders</h2>
            <?php
            // Fetch orders using customer_id
            $get_orders = "SELECT order_id, created_at, amount, status, payment_id
                           FROM orders
                           WHERE customer_id='$customer_id'";
            $run_orders = mysqli_query($con, $get_orders);
            if (mysqli_num_rows($run_orders) > 0) {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Payment ID</th>
                            <th>Date and Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row_orders = mysqli_fetch_array($run_orders)) {
                            $order_id = $row_orders['order_id'];
                            $payment_id = $row_orders['payment_id'];
                            $created_at = $row_orders['created_at'];
                            $amount = $row_orders['amount'];
                            $status = $row_orders['status'];
                            ?>
                            <tr>
                                <td><?php echo $order_id; ?></td>
                                <td><?php echo $payment_id; ?></td>
                                <td><?php echo $created_at; ?></td>
                                <td>₹<?php echo $amount; ?></td>
                                <td style="color:green;"><?php echo $status; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo "<p>No orders found.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php
}
?>
<?php
$customer_email = $_SESSION['customer_email'];
    $get_customer_id = "SELECT customer_id FROM customers WHERE customer_email = '$customer_email'";
    $run_customer_id = mysqli_query($con, $get_customer_id);
    $row_customer_id = mysqli_fetch_array($run_customer_id);
    $customer_id = $row_customer_id['customer_id'];
?>

<div id="content">
    <div class="container">
        <div class="main-content">
            <h2>Order items</h2>
            <?php
            // Fetch orders using customer_id
            $get_orders = "SELECT order_id, created_at, amount, status FROM orders WHERE customer_id='$customer_id'";
            $run_orders = mysqli_query($con, $get_orders);
            if (mysqli_num_rows($run_orders) > 0) {
                while ($row_orders = mysqli_fetch_array($run_orders)) {
                    $order_id = $row_orders['order_id'];
                    $created_at = $row_orders['created_at'];
                    $amount = $row_orders['amount'];
                    $status = $row_orders['status'];
                    ?>
                    <div class="order">
                        <h3>Order ID: <?php echo $order_id; ?></h3>
                        <p>Order Date: <?php echo $created_at; ?></p>
                        <p>Amount:₹ <?php echo $amount; ?></p>
                        <p>Status: <?php echo $status; ?></p>
                        <?php
                        // Fetch order items for this order
                        $get_order_items = "SELECT product_id, product_title, quantity, price FROM order_items WHERE order_id='$order_id'";
                        $run_order_items = mysqli_query($con, $get_order_items);
                        if (mysqli_num_rows($run_order_items) > 0) {
                            ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_order_items = mysqli_fetch_array($run_order_items)) {
                                        $product_id = $row_order_items['product_id'];
                                        $product_title = $row_order_items['product_title'];
                                        $quantity = $row_order_items['quantity'];
                                        $price = $row_order_items['price'];
                                        ?>
                                        <tr>
                                            <td><?php echo $product_id; ?></td>
                                            <td><?php echo $product_title; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td>₹<?php echo $price; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<p>No order items found for this order.</p>";
                        }
                        ?>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No orders found.</p>";
            }
            ?>
        </div>
    </div>
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


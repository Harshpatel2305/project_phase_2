<?php
session_start();
include("includes/db.php");
include 'functions/functions.php';

// Retrieve customer information from session
$customer_email = $_SESSION['customer_email'];
$payment_id = $_POST['razorpay_payment_id'];

// Store the payment ID in the session
$_SESSION['razorpay_payment_id'] = $payment_id;

// Retrieve customer details from the database using the email
$get_customer_query = "SELECT customer_id, customer_name FROM customers WHERE customer_email = '$customer_email'";
$run_customer_query = mysqli_query($con, $get_customer_query);

if (mysqli_num_rows($run_customer_query) > 0) {
    $row_customer = mysqli_fetch_assoc($run_customer_query);
    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];

    // Retrieve cart items
    $ip_add = getRealUserIp();
    $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_cart = mysqli_query($con, $select_cart);

    // Calculate total amount
    $total_amount = 0;

    // Create order
    $insert_order_query = "INSERT INTO orders (customer_id, amount, status, payment_id) VALUES ('$customer_id', '$total_amount', 'PAID', '$payment_id')";
    mysqli_query($con, $insert_order_query);
    $order_id = mysqli_insert_id($con); // Get the last inserted order_id

    // Insert order items
    while ($row_cart = mysqli_fetch_array($run_cart)) {
        $pro_id = $row_cart['p_id'];
        $pro_qty = $row_cart['qty'];
        $only_price = $row_cart['p_price'];

        // Get product details
        $get_product_query = "SELECT product_title, product_price FROM products WHERE product_id='$pro_id'";
        $run_product_query = mysqli_query($con, $get_product_query);
        $row_product = mysqli_fetch_assoc($run_product_query);
        $product_title = $row_product['product_title'];
        $price = $row_product['product_price'];

        // Calculate subtotal for the current product
        $sub_total = $price * $pro_qty;
        $total_amount += $sub_total;

        // Insert order item into order_items table
        $insert_order_item_query = "INSERT INTO order_items (order_id, product_id, product_title, quantity, price) VALUES ('$order_id', '$pro_id', '$product_title', '$pro_qty', '$price')";
        mysqli_query($con, $insert_order_item_query);

        // Remove the item from the cart after inserting into the order_items table
        $delete_cart_item_query = "DELETE FROM cart WHERE p_id='$pro_id' AND ip_add='$ip_add'";
        mysqli_query($con, $delete_cart_item_query);
    }

    // Update total amount and payment ID in the orders table
    $update_order_query = "UPDATE orders SET  amount='$total_amount', payment_id='$payment_id' WHERE order_id='$order_id'";
    mysqli_query($con, $update_order_query);

    // Redirect user to order details page
    header("Location: my-orders.php");
    exit();
} else {
    // Customer not found with the provided email
    echo "Customer not found with email: $customer_email";
}
?>

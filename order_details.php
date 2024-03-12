<?php
session_start();
include("includes/db.php");
//include("includes/header_2.php");
include("functions/functions.php");

// Assuming you have retrieved customer information after login or registration
// Retrieve customer email from the session
echo $_SESSION['customer_email'];
$customer_email = $_SESSION['customer_email']; // Example session key (replace with actual key)

// Retrieve customer ID and name based on the email
$get_customer_query = "SELECT customer_id, customer_name FROM customers WHERE customer_email = '$customer_email'";
$run_customer_query = mysqli_query($con, $get_customer_query);

// Check if customer exists
if (mysqli_num_rows($run_customer_query) == 1) {
    // Fetch customer information
    $row_customer = mysqli_fetch_assoc($run_customer_query);
    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];

    // Retrieve order information based on the customer ID
    $get_order_query = "SELECT * FROM orders WHERE customer_id = '$customer_id'";
    $run_order_query = mysqli_query($con, $get_order_query);

    // Check if orders exist
    if (mysqli_num_rows($run_order_query) > 0) {
        // Display order details
        while ($row_order = mysqli_fetch_assoc($run_order_query)) {
            $order_id = $row_order['order_id'];
            $amount = $row_order['amount'];
            $created_at = $row_order['created_at'];

            // Display order information
            echo "<h2>Order ID: $order_id</h2>";
            echo "<p>Order Amount: $amount</p>";
            echo "<p>Order Date: $created_at</p>";

            // Retrieve and display order items
            $get_order_items_query = "SELECT * FROM order_items WHERE order_id = '$order_id'";
            $run_order_items_query = mysqli_query($con, $get_order_items_query);
            if (mysqli_num_rows($run_order_items_query) > 0) {
                echo "<h3>Order Items:</h3>";
                echo "<ul>";
                while ($row_order_item = mysqli_fetch_assoc($run_order_items_query)) {
                    $product_title = $row_order_item['product_title'];
                    $quantity = $row_order_item['quantity'];
                    $price = $row_order_item['price'];
                    echo "<li>$product_title - Quantity: $quantity - Price: $price</li>";
                }
                echo "</ul>";
            } else {    
                echo "<p>No order items found.</p>";
            }
        }
    } else {
        echo "<p>No orders found for customer: $customer_name</p>";
    }
} else {
    echo "<p>Customer not found with email: $customer_email</p>";
}

// Footer section
include("includes/footer.php");
?>

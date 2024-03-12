<?php
//session_start();
include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    // Include the sidebar and page-wrapper
   // include("includes/sidebar.php");
    echo '<div id="page-wrapper"><!-- page-wrapper Starts -->';
    echo '<div class="container-fluid"><!-- container-fluid Starts -->';

    // Modify the query to join the products table to get the product name
    $get_order_items_query = "SELECT order_items.order_item_id, order_items.product_id, order_items.quantity, order_items.price, products.product_title 
                              FROM order_items 
                              INNER JOIN products ON order_items.product_id = products.product_id";
    $run_order_items_query = mysqli_query($con, $get_order_items_query);

    // Display the table of order items
    echo '<h2>Order Items</h2>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Order Item ID</th>';
    echo '<th>Product ID</th>';
    echo '<th>Product Name</th>';
    echo '<th>Quantity</th>';
    echo '<th>Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($run_order_items_query)) {
        echo '<tr>';
        echo '<td>' . $row['order_item_id'] . '</td>';
        echo '<td>' . $row['product_id'] . '</td>';
        echo '<td>' . $row['product_title'] . '</td>'; // Product name retrieved from the join
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    echo '</div><!-- container-fluid Ends -->';
    echo '</div><!-- page-wrapper Ends -->';
    // Include scripts and close the body and HTML tags
    //include("includes/scripts.php");
}
?>

<?php
//session_start();
include("includes/db.php");



// Retrieve orders from the database
$get_orders_query = "SELECT orders.order_id, orders.customer_id, orders.amount, orders.created_at,orders.payment_id,orders.status, customers.customer_name
                     FROM orders
                     INNER JOIN customers ON orders.customer_id = customers.customer_id where status='PAID'";
$run_orders_query = mysqli_query($con, $get_orders_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-3">Orders</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>payment id</th>
                        <th>status</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_order = mysqli_fetch_assoc($run_orders_query)) {
                        $order_id = $row_order['order_id'];
                        $customer_name = $row_order['customer_name'];
                        $amount = $row_order['amount'];
                        $created_at = $row_order['created_at'];
                        $payment_id=$row_order['payment_id'];
                        $status='paid';
                    ?>
                    <tr>
                        <td><?php echo $order_id; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $created_at; ?></td>
                        <td><?php echo $payment_id;?></td>
                        <td style="color:green;"><?php echo strtoupper($status);?></td>
                        <!-- Add more cells as needed -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

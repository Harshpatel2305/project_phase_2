<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <?php
    // Include database connection file
    include("includes/db.php");

    // Get product ID from the URL
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    // Display product details
    echo "<h1>" . $row['product_title'] . "</h1>";
    echo "<p>" . $row['product_desc'] . "</p>";
    ?>
    <form action="process_payment.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['product_price']; ?>">
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>

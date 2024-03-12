<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <?php
    // Include database connection file
    include("includes/db.php");

    // Fetch products from the database
    $query = "SELECT * FROM products";
    $result = mysqli_query($con, $query);

    // Display products
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='product'>";
        echo "<h2>" . $row['product_title'] . "</h2>";
        echo "<p>" . $row['product_desc'] . "</p>";
        echo "<a href='product_details.php?product_id=" . $row['product_id'] . "'>View Details</a>";
        echo "</div>";
    }
    ?>
</body>
</html>

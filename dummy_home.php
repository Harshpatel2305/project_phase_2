<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instamojo Payment Gateway Integration</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
    <div class="container">
        <div class="py-5 text-center">
            <h2> Products List (Instamojo Payment Gateway Integration) </h2>
        </div>
        <div class="row">
            <?php
                // Database configuration    
                require "includes/db.php";

                $sql = "SELECT * FROM products";
                $query = $con->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {

            ?>
            <div class="card col-md-4" style="width: 18rem;">
                <img src="images/<?php echo $row['product_img1']?>" class="card-img-top" alt="<?php echo $row['product_name']?>" 
                style="width: 350px; height: 250px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['product_title']?></h5>
                    <p class="card-text"><?php echo $row['product_desc']?></p>
                    <a href="checkout.php?product_id=<?php echo $row['product_id']?>" class="btn btn-sm btn-primary">Buy Now</a> 
                    <b><span style="float: right;"> ₹<?php echo $row['product_price']?></span></b>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</body>
</html>
Create HTML Checkout Form
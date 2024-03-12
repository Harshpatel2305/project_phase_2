<?php include ("includes/db.php");
include("includes/header_2.php");?>
<section class="products">
    <h1 class="title">Featured Products</h1>
    <div class="box-container">
        <?php
        function getsunglasses()
        {
            global $con;

            $get_products = "SELECT * 
            FROM products
            JOIN product_categories ON products.p_cat_id = product_categories.p_cat_id
            WHERE product_categories.p_cat_id = '4'";

            $run_products = mysqli_query($con, $get_products);

            while ($row_products = mysqli_fetch_array($run_products)) {
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_psp_price = $row_products['product_psp_price'];
                $pro_img1 = $row_products['product_img1'];
                $pro_url = $row_products['product_url'];

                $product_price_html = $pro_price;
                if ($pro_psp_price) {
                    $product_price_html .= " <span>$pro_psp_price</span>";
                }

                echo "
                <div class='box'>
                    <div class='image'>
                        <img src='admin_area/product_images/$pro_img1' alt='$pro_title'>
                    </div>
                    <div class='content'>
                        <h3>$pro_title</h3>
                        <div class='price'>$product_price_html</div>
                    </div>
                </div>";
            }
        }

        getsunglasses();
        ?>
    </div>
</section>

<?php

include 'includes/db.php';
include 'includes/sidebar.php';

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    //echo $_SESSION['admin_email'];


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <!-- <h1 class="page-header">Dashboard</h1> -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-primary"><!-- panel panel-primary Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-tasks fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge">
                                <?php echo $count_products; ?>
                            </div>

                            <div>Products</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_products">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-primary Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-green"><!-- panel panel-green Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-user fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge">
                                <?php echo $count_customers; ?>
                            </div>

                            <div>Customers</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_customers">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-green Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-shopping-cart fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge">
                                <?php echo $count_p_categories; ?>
                            </div>

                            <div>Products Categories</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_p_cats">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-yellow Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->



        <div class="row">


            <!--<div class="col-lg-3 col-md-6">

                        <div class="panel panel-warning">

                            <div class="panel-heading">

                                <div class="row">

                                    <div class="col-xs-3">

                                        <i class="fa fa-spinner fa-5x"> </i>

                                    </div>

                                    <div class="col-xs-9 text-right">

                                        <div class="huge">
                                            <?php //echo $count_pending_orders      ?>
                                        </div>

                                        <div>Pending Orders</div>

                                    </div>

                                </div>

                            </div>

                            <a href="index.php?view_orders">

                                <div class="panel-footer">

                                    <span class="pull-left"> View Details </span>

                                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                                    <div class="clearfix"></div>

                                </div>

                            </a>

                        </div>

                    </diV>-->



            <div class="col-lg-3 col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-rupee fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT SUM(amount) AS total_earnings FROM orders WHERE status = 'paid'";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total Earnings</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?test">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-spinner fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(order_id) AS total_earnings FROM orders WHERE status = 'PAID'";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total orders</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?test">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-building fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(manufacturer_id) AS total_earnings FROM manufacturers ";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total manufacturers</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?view_manufacturers">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>





            <div class="row"><!-- 3 row Starts -->

                <div class="col-lg-12"><!-- col-lg-8 Starts -->

                    <div class="panel panel-primary"><!-- panel panel-primary Starts -->

                        <!--<div class="panel-heading">

                            <h3 class="panel-title">

                                <i class="fa fa-money fa-fw"></i> New Orders

                            </h3> -->

                    </div><!-- panel-heading Ends -->

                    <!--<div class="panel-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover table-striped">
                                    

                                    <thead>

                                        <tr>
                                            <th>Order #</th>
                                            <th>Customer</th>
                                            <th>Invoice No</th>
                                            <th>Product ID</th>
                                            <th>Qty</th>
                                            <th>Size</th>
                                            <th>Status</th>


                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $i = 0;

                                        $get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
                                        $run_order = mysqli_query($con, $get_order);

                                        while ($row_order = mysqli_fetch_array($run_order)) {


                                            $order_id = $row_order['order_id'];

                                            $c_id = $row_order['customer_id'];

                                            $invoice_no = $row_order['invoice_no'];

                                            $product_id = $row_order['product_id'];

                                            $qty = $row_order['qty'];

                                            $size = $row_order['size'];

                                            $order_status = $row_order['order_status'];


                                            $i++;

                                            ?>

                                            <tr>

                                                <td>
                                                    <?php echo $i; ?>
                                                </td>

                                                <td>
                                                    <?php

                                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                                    $run_customer = mysqli_query($con, $get_customer);
                                                    $row_customer = mysqli_fetch_array($run_customer);
                                                    $customer_email = $row_customer['customer_email'];
                                                    echo $customer_email;
                                                    ?>
                                                </td>

                                                <td>
                                                    <?php echo $invoice_no; ?>
                                                </td>
                                                <td>
                                                    <?php echo $product_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $qty; ?>
                                                </td>
                                                <td>
                                                    <?php echo $size; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($order_status == 'pending') {

                                                        echo $order_status = 'pending';

                                                    } else {

                                                        echo $order_status = 'Complete';

                                                    }

                                                    ?>
                                                </td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>


                                </table>

                            </div>

                            <div class="text-right">

                                <a href="index.php?view_orders">

                                    View All Orders <i class="fa fa-arrow-circle-right"></i>

                                </a>

                            </div> -->


                </div><!-- panel-body Ends -->

            </div><!-- panel panel-primary Ends -->

        </div><!-- col-lg-8 Ends -->

        <div class="col-md-4"><!-- col-md-4 Starts -->

            <div class="panel"><!-- panel Starts -->



            </div><!-- panel Ends -->

        </div><!-- col-md-4 Ends -->

    </div><!-- 3 row Ends -->

<?php } ?>
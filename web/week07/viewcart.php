<?PHP
session_start();
$product_ids = array();
//session_destroy();

if(filter_input(INPUT_GET, 'action')== 'delete') {
    foreach($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['item_id'] == filter_input(INPUT_GET, 'item_id')) {
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Browse Items</title>
    <link href="03ProveStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body><div class="topnav">
    <a class="active" href="Customer_home.php">Home</a>
    <a href="store.php">Store</a>
    <a href="viewcart.php">View Cart</a>
    <div class="login-container">
        <form action="logout.php">

            <?php
            if(isset($_SESSION['username'])) {

                echo '<button type="submit">Log Out</button>';
            }
            else
            {
                echo '<button type="submit">Login</button>';
            }

            ?>


        </form>
    </div>
</div>
<br>
<div class="header">
    <h1 class="headtitle"> Items Available</h1>
    <br>
    <br>
</div>
<div class="container">

    <?php

    require ('DbConnect.php');
    $con = get_db();

    ?>





    <div style="clear:both"></div>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <tr><th colspan="5"><h3>Order Details</h3></th> </tr>
            <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION['shopping_cart'])):

                $total = 0;
                foreach ($_SESSION['shopping_cart'] as $key => $product):
                    ?>
                    <tr>
                        <td><?php echo $product['item_name']; ?></td>
                        <td><?php echo $product['item_quantity']; ?></td>
                        <td>$ <?php echo $product['item_price']; ?></td>
                        <td>$ <?php echo number_format($product['item_quantity'] * $product['item_price'], 2); ?> </td>
                        <td><a href="viewcart.php?action=delete&item_id=<?php echo $product['item_id']; ?> ">
                                <div class="btn-danger" id="remove">Remove</div>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $total = $total + ($product['item_quantity'] * $product['item_price']);
                endforeach;
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <?php
                        if (isset($_SESSION['shopping_cart'])):
                            if (count($_SESSION['shopping_cart'])> 0):
                                ?>
                                <a href="confirmation.php" class="button">Checkout</a>
                            <?php endif; endif; ?>
                    </td>
                </tr>
            <?php
            endif;
            ?>
        </table>
    </div>
    <div>
        <p class="btn-warning btn btn-lg">
            <a href="store.php">
                Back to Search
            </a>
        </p>
    </div>


</body>
</html>
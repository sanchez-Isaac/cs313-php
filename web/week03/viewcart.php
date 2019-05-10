<?PHP
session_start();
$product_ids = array();
//session_destroy();

if(filter_input(INPUT_GET, 'action')== 'delete') {
    foreach($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
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
<body>

<h1>View Cart</h1><br><br>
<div class="container">

    <?php

    $host = "ec2-23-21-129-125.compute-1.amazonaws.com";
    $user = "qvuhdtpvtfgheg";
    $pass = "e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08";
    $db = "dbe43cu3qv6rjv";
    $port = "5432";

    $con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");
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
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td>$ <?php echo $product['price']; ?></td>
                <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?> </td>
                <td><a href="viewcart.php?action=delete&id=<?php echo $product['id']; ?> ">
                        <div class="btn-danger" id="remove">Remove</div>
                    </a>
                </td>
            </tr>
            <?php
            $total = $total + ($product['quantity'] * $product['price']);
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
                    <a href="confirmation%20page.php" class="button">Checkout</a>
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
            <a href="03Prove.php">
               Back to Search
            </a>
        </p>
    </div>


</body>
</html>
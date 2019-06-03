<?PHP
session_start();

/*
pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
*/

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
    <title>Confirmation page</title>
</head>
<body>

<div class="container">
    <div style="clear:both"></div>
    <br/>
    <div>
        <h1>Thank you for your purchase</h1>

    </div>
    <div style="clear:both"></div>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <tr><th colspan="5"><h3>Your items will be shipped to:</h3></th> </tr>
            <br>
            <tr><th><?php echo$_SESSION['firstName'] ?>  <?php echo$_SESSION['lastName']?> <br>
                    <?php echo$_SESSION['address'] ?> <br>
                    <?php echo$_SESSION['address2'] ?> <br>
                    <?php echo$_SESSION['country'] ?> <br>
                    <?php echo$_SESSION['state']?> <br>
                    <?php echo$_SESSION['zip'] ?>  </th></tr>
        </table>
        <div>
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
                        <th width="5%">     </th>
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
                                <td> </td>

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
        </div>
    </div>

</body>
</html>

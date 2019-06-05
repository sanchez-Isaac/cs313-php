<?PHP
session_start();
$product_ids = array();
//session_destroy();
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset ($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'item_id');

        if (!in_array(filter_input(INPUT_GET,'item_id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array
            (
                'item_id'=>filter_input(INPUT_GET,'item_id'),
                'item_name' => filter_input(INPUT_POST, 'item_name'),
                'item_price' => filter_input(INPUT_POST, 'item_price'),
                'item_quantity' => filter_input(INPUT_POST, 'item_quantity')
            );
        }
        else {
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'item_id')){
                    $_SESSION['shopping_cart'][$i]['item_quantity'] += filter_input(INPUT_POST,'item_quantity');
                }
            }
        }
    }
    else{
        $_SESSION['shopping_cart'][0] = array
        ('item_id'=>filter_input(INPUT_GET,'item_id'),
            'item_name' => filter_input(INPUT_POST, 'item_name'),
            'item_price' => filter_input(INPUT_POST, 'item_price'),
            'item_quantity' => filter_input(INPUT_POST, 'item_quantity')

        );
    }
}
//pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Browse Items</title>
    <link href="03ProveStyle.css" rel="stylesheet" />
    <link href="homestyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>
<div class="topnav">
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


    $query = 'SELECT * FROM items ORDER by item_id ASC';

    $result = pg_query( $con, $query);

    if($result):
        if(pg_num_rows($result)>0):
            while($product = pg_fetch_assoc($result)):

                ?>
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="store.php?action=add&item_id=<?php echo $product['item_id']; ?>">
                        <div class="products">
                            <img src="<?php echo $product['photo_desc']; ?>" width="250px;" class="img-responsive" />
                            <h4 class="text-info"><?php echo $product['item_name']; ?></h4>
                            <h4>$ <?php echo $product['item_price']; ?></h4>
                            <input type="text" name="item_quantity" class="form-control" value="1" />
                            <input type="hidden" name="item_name" value="<?php echo $product['item_name']; ?>" />
                            <input type="hidden" name="item_price" value="<?php echo $product['item_price']; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" Value="Add to Cart" />
                        </div>
                    </form>
                </div>
            <?php
            endwhile;
        endif;
    endif;

    ?>
    <table class="table">
        <tr>
            <td colspan="5">
                <?php
                if(isset($_SESSION['shopping_cart'])):
                    if (count($_SESSION['shopping_cart'])>0):
                        ?>
                        <a href="viewcart.php" class="button" > View Cart </a>
                    <?php endif; endif;?>
            </td>

        </tr>
    </table>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="footer">
    <p>CS 313 - Web Engineering II    &copy; 2016 - <?php echo date("Y");?> </p>

</div>

</body>
</html>







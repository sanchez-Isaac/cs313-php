<?PHP
session_start();
$product_ids = array();
//session_destroy();
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset ($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

       if (!in_array(filter_input(INPUT_GET,'id'), $product_ids)){
           $_SESSION['shopping_cart'][$count] = array
           (
               'id'=>filter_input(INPUT_GET,'id'),
               'name' => filter_input(INPUT_POST, 'name'),
               'price' => filter_input(INPUT_POST, 'price'),
               'quantity' => filter_input(INPUT_POST, 'quantity')
           );
       }
       else {
           for ($i = 0; $i < count($product_ids); $i++){
               if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                   $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
               }
           }
       }
    }
    else{
        $_SESSION['shopping_cart'][0] = array
        ('id'=>filter_input(INPUT_GET,'id'),
         'name' => filter_input(INPUT_POST, 'name'),
         'price' => filter_input(INPUT_POST, 'price'),
         'quantity' => filter_input(INPUT_POST, 'quantity')

        );
    }
}
pre_r($_SESSION);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>

<h1>Available Items</h1><br><br>
<div class="container">





<?php

$host = "ec2-23-21-129-125.compute-1.amazonaws.com";
$user = "qvuhdtpvtfgheg";
$pass = "e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08";
$db = "dbe43cu3qv6rjv";
$port = "5432";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");


$query = 'SELECT * FROM products ORDER by id ASC';

$result = pg_query( $con, $query);

if($result):
    if(pg_num_rows($result)>0):
        while($product = pg_fetch_assoc($result)):

        ?>
        <div class="col-sm-4 col-md-3" >
            <form method="post" action="03Prove.php?action=add&id=<?php echo $product['id']; ?>">
                <div class="products">
                    <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                    <h4 class="text-info"><?php echo $product['name']; ?></h4>
                    <h4>$ <?php echo $product['price']; ?></h4>
                    <input type="text" name="quantity" class="form-control" value="1" />
                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" Value="Add to Cart" />
                </div>
            </form>
        </div>
    <?php
        endwhile;
        endif;
        endif;

?>


</div>





</body>
</html>







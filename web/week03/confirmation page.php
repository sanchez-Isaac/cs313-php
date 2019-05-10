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

if(filter_input(INPUT_GET, 'action')== 'delete') {
    foreach($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
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
    <title>Confirmation Page</title>
    <link href="styleSheet.css" rel="stylesheet" />
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

</body>
</html>

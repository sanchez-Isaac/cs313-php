<?php

include_once 'DbConnect.php';

$con = get_db();

$first_name = $_SESSION['first_name'];
$middle_name = $_SESSION['middle_name'];
$last_name = $_SESSION['last_name'];
$street = $_SESSION['street'];
$ext_home_number = $_SESSION['ext_home_number'];
$city = $_SESSION['city'];
$country = $_SESSION['country'];
$state = $_SESSION['state'];
$zip = $_SESSION['zip'];
$telephone = $_SESSION['telephone'];
$customer_id = $_SESSION['customer_id'];



$date = date('Y/m/d');

$num_of_order_id = mt_rand(100, 9999999);

$order_id = 0 ;
$id = 0;


console_log( $order_id );
console_log( $id );
$query = 'SELECT order_id FROM orders';
$result = pg_query($con, $query);


while ($row = pg_fetch_array($result)){
    $id = $row['$order_id'];

}
$order_id = ($id+1);
console_log( $order_id );

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}



foreach ($_SESSION['shopping_cart'] as $key => $product):
    $item_id = $product['item_id'];
    $item_name = $product['item_name'];
    $item_price = $product['item_price'];
    $quantity = $product['item_quantity'];


    $sql_order = "INSERT INTO orders(order_id, num_of_order_id, customer_id, to_street, ext_home_number, to_city, to_state, to_zip, ship_date, item_id, item_quantity, item_name)
    VALUES($num_of_order_id, $num_of_order_id, $customer_id, '$street', $ext_home_number, '$city','$state' ,'$zip', '$date', $item_id, '$quantity', '$item_name' );";
    pg_query($con ,$sql_order);

endforeach;


pg_close($con);
session_destroy();



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

$i_counter = 0;
$item_id =   $_SESSION['$item_id'];
$item_name = $_SESSION['shopping_cart'][$i_counter]['$item_name'];
$item_price = $_SESSION['shopping_cart'][$i_counter]['$item_price'];
$quantity = $_SESSION['shopping_cart'][$i_counter]['$quantity'];
$date = date('Y/m/d');

$num_of_order_id = mt_rand(1000, 9999999999);

$order_id = 0 ;
$id = 0;


console_log( $order_id );
console_log( $id );
$query = 'SELECT order_id FROM orders';
$result = pg_query($con, $query);
while ($row = pg_fetch_array($result)){
    $id = $row['$order_id'];

    console_log( $id );
}
$order_id = ($id+1);
console_log( $order_id );
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}


while ($i_counter < $_SESSION['shopping_cart'][$i_counter]['$item_id']) {
    $sql_order = "INSERT INTO order(order_id, num_of_order_id, customer_id, to_street, ext_home_number, to_city, To_zip, ship_date, item_id, item_quantity, item_name)
    VALUES($order_id, $num_of_order_id, $customer_id, '$street', $ext_home_number, '$city', '$zip', $date, $item_id, '$quantity', '$item_name' );";
    pg_query($con ,$sql_order);
    $i_counter ++;
}



pg_close($con);
session_destroy();



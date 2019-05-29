<?php
include_once 'DbConnect.php';

$con = get_db();

$item_name = $_POST['item_name'];
$item_type = $_POST['item_type'];
$item_price = $_POST['item_price'];
$item_quantity = $_POST['item_quantity'];
$photo_desc = $_POST['photo_desc'];
$item_id = 1 ;


$query = 'SELECT item_id FROM items';
$result = pg_query( $con, $query);


while($rows = pg_fetch_assoc($result))
{
    $item_id ++;
}





$sql = "INSERT INTO items(item_id, item_barcode, item_name, item_type, item_price, item_quantity, photo_desc)
VALUES($item_id, $item_id, '$item_name', '$item_type', $item_price, $item_quantity, '$photo_desc');";

pg_query($con ,$sql);

header("Location: insert_items.php?insert=");

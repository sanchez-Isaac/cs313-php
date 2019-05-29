<?php
include_once 'DbConnect.php.php';

$item_name = pg_escape_string($_POST['item_name']);
$item_type = pg_escape_string($_POST['item_type']);
$item_price = pg_escape_string($_POST['item_price']);
$item_quantity = pg_escape_string($_POST['item_quantity']);
$photo_desc = pg_escape_string($_POST['photo_desc']);


$sql = "INSERT INTO items(item_name, item_type, item_price, item_quantity)
VALUES($item_name, $item_type, $item_price,$item_quantity, $photo_desc);";

pg_query($con ,$sql);

header("Location: insert_items?insert=success");

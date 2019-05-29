<?php
include_once 'DbConnect.php.php';

$item_name = $_POST['item_name'];
$item_type = $_POST['item_type'];
$item_price = $_POST['item_price'];
$item_quantity = $_POST['item_quantity'];
$photo_desc = $_POST['photo_desc'];


$sql = "INSERT INTO items(item_name, item_type, item_price, item_quantity)
VALUES($item_name, $item_type, $item_price,$item_quantity, $photo_desc);";

pg_query($con ,$sql);

header("Location: insert_items.php?insert=success");

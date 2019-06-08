<?php
include_once 'DbConnect.php';

$con = get_db();

$item_name = pg_escape_string($_POST['item_name']);
$item_type = pg_escape_string($_POST['item_type']);
$item_price = pg_escape_string($_POST['item_price']);
$item_quantity = pg_escape_string($_POST['item_quantity']);
$photo_desc = pg_escape_string($_POST['photo_desc']);
$item_id = 0 ;
$id = 0;

console_log( $item_id );
console_log( $id );

$query = 'SELECT item_id FROM items';

$result = pg_query($con, $query);
while ($row = pg_fetch_array($result)){
    $id = $row['item_id'];

    console_log( $id );
}
$item_id = ($id+1);

console_log( $item_id );


function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';

}

//nextval('items_item_id_seq')


$sql = "INSERT INTO items(item_id, item_barcode, item_name, item_type, item_price, item_quantity, photo_desc)
VALUES($item_id, $item_id, '$item_name', '$item_type', $item_price, $item_quantity, '$photo_desc');";

pg_query($con ,$sql);

pg_close($con);

header("Location: insert_items.php?insert=");

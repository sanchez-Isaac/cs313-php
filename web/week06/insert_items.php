<?php
session_start();
require ('DbConnect.php');
$con = get_db();



    $item_name = pg_escape_string($_POST['item_name']);
    $item_type = pg_escape_string($_POST['item_type']);
    $item_price = pg_escape_string($_POST['item_price']);
    $item_quantity = pg_escape_string($_POST['item_quantity']);
    $photo_desc = pg_escape_string($_POST['photo_desc']);
    /*
        $query = $con->prepare ('INSERT INTO items(item_id, item_barcode, item_name, item_type, item_price, item_quantity)
    VALUES(DEFAULT, DEFAULT, :$item_name, :$item_type, :$item_price,:$item_quantity, :$photo_desc);') ;
        $query->bindValue(':$item_name', $item_name, PDO::PARAM_STR);
        $query->bindValue(':$item_type', $item_type, PDO::PARAM_STR);
        $query->bindValue(':$item_price', $item_price, PDO::PARAM_INT);
        $query->bindValue(':$item_quantity', $item_quantity, PDO::PARAM_INT);
        $query->bindValue(':$photo_desc', $photo_desc, PDO::PARAM_STR);
        $query->execute();

    */


    $sql = "INSERT INTO items(item_name, item_type, item_price, item_quantity)
VALUES($item_name, $item_type, $item_price,$item_quantity, $photo_desc);";

    pg_query($con ,$sql);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insert into the DB</title>
</head>
<body>
<div><h1>Inserting new Items</h1></div>
<div>

<form method="post" action="insert_items.php">
    Item name:<br>
    <input type="text" name="item_name" >
    <br>
    Item type: (Ask a manager)<br>
    <input type="text" name="item_type" >
    <br>
    Item price:<br>
    <input type="text" name="item_price" >
    <br>
    Item quantity:<br>
    <input type="number" name="item_quantity" >
    <br>
    Item picture: (URL)<br>
    <input type="text" name="photo_desc" >
    <br><br>
    <input type="submit" name="insert" value="Insert">
</form>
</body>

</html>

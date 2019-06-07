<?php
include_once 'DbConnect.php';

$con = get_db();

$_SESSION['userCRT'] = test_input($_POST['userCRT']);
$_SESSION['passwordCRT'] = test_input($_POST['passwordCRT']);





function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$query = 'SELECT email FROM identification';
$result = pg_query( $con, $query);


if(pg_num_rows($result) > 0){
    $name_error ="Sorry username is already taken";
    $_SESSION['userCRT'] = NULL;
    $_SESSION['passwordCRTCRT'] = NULL;
    echo "<script type='text/javascript'>alert(\"$name_error\");</script>";

    header("Location: create_user_pass.php?Error=NotUnique");


}
else{
    $name_error = "Username Available";
    echo "<script type='text/javascript'>alert(\"$name_error\");</script>";
    header("Location: create_account.php?Aproved=");
}




$sql = "INSERT INTO items(item_id, item_barcode, item_name, item_type, item_price, item_quantity, photo_desc)
VALUES($item_id, $item_id, '$item_name', '$item_type', $item_price, $item_quantity, '$photo_desc');";

pg_query($con ,$sql);

pg_close($con);

header("Location: insert_items.php?insert=");

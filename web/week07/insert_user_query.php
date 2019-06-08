<?php
session_start();
include_once 'DbConnect.php';

$con = get_db();

$first_name = pg_escape_string($_POST['first_name']);
$middle_name = pg_escape_string($_POST['middle_name']);
$last_name = pg_escape_string($_POST['last_name']);
$user = $_SESSION['userCRT'];
$street = pg_escape_string($_POST['street']);
$ext_home_number = pg_escape_string($_POST['ext_home_number']);
$city = pg_escape_string($_POST['city']);
$country = pg_escape_string($_POST['country']);
$state = pg_escape_string($_POST['state']);
$zip = pg_escape_string($_POST['zip']);
$telephone = pg_escape_string($_POST['telephone']);
$pass = md5($_SESSION['passwordCRT']);
$login_id = 0 ;
$id = 0;

console_log( $login_id );
console_log( $id );

$query = 'SELECT login_id FROM identification';

$result = pg_query($con, $query);
while ($row = pg_fetch_array($result)){
    $id = $row['login_id'];

    console_log( $id );
}
$login_id = ($id+1);

console_log( $login_id );


function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';

}


$sql_identification = "INSERT INTO identification(login_id, email, password)
VALUES($login_id, '$user', '$pass');";

$sql_address = "INSERT INTO address(address_id, street, city, state, zip, telephone, ext_home_number, country)
VALUES($login_id, '$street', '$city', '$state', '$zip', '$telephone', $ext_home_number, '$country');";

$sql_customers = "INSERT INTO customers(customer_id, first_name, middle_name, last_name, address_id, login_id)
VALUES($login_id, '$first_name', '$middle_name', '$last_name', $login_id, $login_id);";


pg_query($con ,$sql_identification);
pg_query($con ,$sql_address);
pg_query($con ,$sql_customers);
pg_close($con);
session_destroy();

header("Location: 07Prove.php?Registration=Success");

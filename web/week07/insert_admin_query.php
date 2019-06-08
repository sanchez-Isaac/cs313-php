<?php
session_start();
include_once 'DbConnect.php';

$con = get_db();

$first_name = pg_escape_string($_POST['first_name']);
$last_name = pg_escape_string($_POST['last_name']);
$email = pg_escape_string($_POST['emailad']);
$user = pg_escape_string($_POST['usernamead']);
$pass1 = pg_escape_string($_POST['passwordad']);
$pass = md5($pass1);
$login_id = 1 ;


$query = 'SELECT admin_id FROM admin';
$result = pg_query( $con, $query);
while($rows = pg_fetch_assoc($result))
{
    $login_id ++;
}




$sql_admin = "INSERT INTO admin(admin_id, name, last_name, user_name, email, password)
VALUES($login_id, '$first_name', '$last_name', '$user', '$email', '$pass');";




pg_query($con ,$sql_admin);
pg_close($con);



header("Location: 07Prove.php?Registration=Success");

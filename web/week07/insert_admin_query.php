<?php
session_start();
include_once 'DbConnect.php';

$con = get_db();

$first_name = $_SESSION['first_namead'];
$last_name = $_SESSION['last_namead'];
$email =  $_SESSION['emailad'];
$user = $_SESSION['usernamead'];
$pass1 =  $_SESSION['passwordad'];
$pass = md5($pass1);
$admin_id = 0 ;
$id = 0;

console_log( $admin_id );
console_log( $id );

$query = 'SELECT admin_id FROM admin';

$result = pg_query($con, $query);
while ($row = pg_fetch_array($result)){
    $id = $row['admin_id'];

    console_log( $id );
}
$admin_id = ($id+1);

console_log( $admin_id );


function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';

}

$sql_admin = "INSERT INTO admin(admin_id, name, last_name, user_name, email, password)
VALUES($admin_id, '$first_name', '$last_name', '$user', '$email', '$pass');";

pg_query($con ,$sql_admin);
pg_close($con);
session_destroy();



header("Location: 07Prove.php?Registration=Success");

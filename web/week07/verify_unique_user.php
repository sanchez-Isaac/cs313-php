<?php
include_once 'DbConnect.php';

$con = get_db();

$user = test_input($_POST['userCRT']);
$pass = test_input($_POST['passwordCRT']);





function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$query = "SELECT email FROM identification WHERE email = '$user'";
$result = pg_query( $con, $query);


if(pg_num_rows($result) > 0){
    $name_error ="Sorry username is already taken";
    $_SESSION['userCRT'] = NULL;
    $_SESSION['passwordCRTCRT'] = NULL;
    echo "<script type='text/javascript'>alert(\"$name_error\");</script>";

    header("Location: create_user_pass.php?Error=NotUnique");


}
else{

   // header("Location: create_account.php?Approved=");
}




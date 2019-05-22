<?php
session_start();

$host = "ec2-54-235-167-210.compute-1.amazonaws.com";
$user = "bgioyeuxgspzay";
$pass = "2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa";
$db = "dedc617q6k4b6s";
$port = "5432";
$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");


if(isset($_POST['login_btn'])){

    $username = pg_escape_string($_POST['username']);
    $password = pg_escape_string($_POST['password']);
   // $password= md5($password); // Hashes the passwords (this is only to register new users)
    $query = "SELECT * FROM admin WHERE user_name = '$username' AND password = '$password'";
    $resultLogin = pg_query( $con, $query);

    if(pg_num_rows($resultLogin) == 1) {
        $_SESSION['message'] = "You are logged in";
        $_SESSION['username'] = $username;
        header("location: home.php");
    }
    else{
        $_SESSION['message'] = "ERROR, User or password incorrect";
    }
}



?>

<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">


<meta name="description" content="The HTML5 Herald">
<meta name="author" content="SitePoint">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
</head>
<body>

<form method="post" action="05Prove.php">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="username" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login_btn" class="Login"></td>
        </tr>
    </table>


</form>



</body>
</html>
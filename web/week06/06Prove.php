<?php
session_start();
require ('DbConnect.php');
$con = get_db();


if(isset($_POST['login_btn'])){

    $username = pg_escape_string($_POST['username']);
    $password = pg_escape_string($_POST['password']);
   // $password= md5($password); // Hashes the passwords (this is only to register new users)
    $query = "SELECT * FROM admin WHERE user_name = '$username' AND password = '$password'";
    $resultLogin = pg_query( $con, $query);

// SECOND LOGIN - NOT ADMIN
    $query2 = "SELECT * FROM identification WHERE email = '$username' and password = '$password';";
    $resultLogin2 = pg_query( $con, $query2);

    if(pg_num_rows($resultLogin) == 1) {
        $_SESSION['message'] = "You are logged in";
        $_SESSION['username'] = $username;
        header("location: home.php");
    }
    else if(pg_num_rows($resultLogin) != 1) { // NEW LINE FOR SECOND LOGIN
        if(pg_num_rows($resultLogin2) == 1) {
            $_SESSION['message'] = "You are logged in ";
            $_SESSION['username'] = $username;
            header("location: home.php");
        }
            else{
                $_SESSION['message'] = "ERROR, User or password incorrect";
                $error = $_SESSION['message'];
                echo "<script type='text/javascript'>alert(\"$error\");</script>";
            }
        }


    else{
        $_SESSION['message'] = "ERROR, User or password incorrect";
        $error = $_SESSION['message'];
        echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }
}



?>

<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">



    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
</head>
<body>

<form method="post" action="06Prove.php">
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
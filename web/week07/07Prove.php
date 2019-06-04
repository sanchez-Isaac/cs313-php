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
            header("location: Customer_home.php");
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
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Login Page</title>
</head>
<body>

<div class="container">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="jumbotron jumbotron-fluid">
            <div class="row">
                <form method="post" action="07Prove.php">


                <div class="form-group">
                    <div class="pic"><img src="https://www.fit2work.com.au/assets/img/avatars/LoginIconAppl.png" width="150px;"></div>
                    <br>
                    <label>Username</label>
                    <input size="35" type="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input size="35" type="password" name="password" class="form-control" required>
                </div>
                <input type="submit"  name="login_btn" value="login" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>

    </div>


</div>
</body>
</html>
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


    //GET USER INFO
    $u_D_Query = "SELECT  cu.customer_id, ad.ext_home_number, ad.street, ad.city, ad.state, ad.zip, ad.telephone, id.email, cu.first_name, cu.middle_name, cu.last_name, ad.country
FROM address ad, identification id, customers cu
WHERE cu.customer_id = ad.address_id and cu.customer_id = id.login_id and id.email = '$username' and id.password = '$password';";
    $resultUserData = pg_query( $con, $u_D_Query);



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



    if(pg_num_rows($resultLogin) == 1) {
        $_SESSION['message'] = "You are logged in Admin";
        $_SESSION['username'] = $username;
        header("location: home.php");
    }
    else if (pg_num_rows($resultLogin) != 1) {
        if (pg_num_rows($resultLogin2) == 1) {
            $_SESSION['message'] = "You are logged in Customer";
            $_SESSION['username'] = $username;

            if (pg_num_rows($resultUserData) > 0) {
                while ($row = pg_fetch_array($resultUserData)) {

                    $_SESSION['customer_id'] = $row[0];
                    $_SESSION['ext_home_number'] = $row[1];
                    $_SESSION['street'] = $row[2];
                    $_SESSION['city'] = $row[3];
                    $_SESSION['state'] = $row[4];
                    $_SESSION['zip'] = $row[5];
                    $_SESSION['telephone'] = $row[6];
                    $_SESSION['email'] = $row[7];
                    $_SESSION['first_name'] = $row[8];
                    $_SESSION['middle_name'] = $row[9];
                    $_SESSION['last_name'] = $row[10];
                    $_SESSION['country'] = $row[11];

                }

            }
            header("location: Customer_home.php");
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



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>
<body>

<div class="container">
    <div class="col-sm-6 col-sm-offset-4 ">
        <div class="jumbotron">

            <div class="row">
                <div>
                <div class="pic"><img src="https://www.digicert.com/account/images/login-shield.png" width="150px;"></div>
                </div>
                <br>

                <form method="post" action="07Prove.php">


                <div class="form-group">

                    <label>Username</label>
                    <input size="35" type="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input size="35" type="password" name="password" class="form-control" required>
                </div>
                <input type="submit"  name="login_btn" value="Login" class="btn btn-info btn-block">
                    <div class="labelor"><b>Or</b></div>
                    <button class="btn btn-success btn-block" formaction="create_account.php">Create Account</button>


            </div>
                </form>
            </div>



    </div>


</div>
</body>
</html>
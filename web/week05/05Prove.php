<?php
session_start();

$host = "ec2-54-235-167-210.compute-1.amazonaws.com";
$user = "bgioyeuxgspzay";
$pass = "2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa";
$db = "dedc617q6k4b6s";
$port = "5432";
$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");



$username = $_POST['user'];
echo $username;
$_SESSION["user"] = $username;
$password = $_POST['pass'];
$_SESSION["pass"] = $password;
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = pg_escape_string($username);
$password = pg_escape_string($password);


$query = "SELECT * FROM admin WHERE user_name = '" . $username . "'" . "and password = '" . $password . "'";
$resultLogin = pg_query( $con, $query);
$row = pg_fetch_array($resultLogin);


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

<div class="container" id="frm">
    <img id="img" src="https://kooledge.com/assets/default_medium_avatar-57d58da4fc778fbd688dcbc4cbc47e14ac79839a9801187e42a796cbd6569847.png" width="100" height="100" alt="login image"
         <form action="05Prove.php" method="post">
             <div class="form-input">
                 <i class="fa fa-user fa-2x cust" aria-hidden="true"></i>

                 <input type="text" id="user" name="user" value="" placeholder="Enter Username" required><br />

                 <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>

                 <input type="text" id="pass" name="pass" value="" placeholder="Enter Password" required><br/>

                 <input type="submit" id="btn" name="submit" value="Login"><br/>
                 <a href="#">FORGET PASSWORD</a>
             </div>

         </form>
    <?php

    if ($row['username'] == $username && $row['password'] == $password ){
    echo "Login Success!! Welcome" . $row['username'];
    }
    else
    {
    echo "failed to login";
    }
?>

</div>

</body>
</html>
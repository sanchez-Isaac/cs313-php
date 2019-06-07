<?PHP
session_start();
require 'DbConnect.php';
$con = get_db();

/*
pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

*/

if(isset($_POST['submit_btn'])) {

$user = pg_escape_string($_POST['userCRT']);
$pass = pg_escape_string($_POST['passwordCRT']);



$query = "SELECT email FROM identification WHERE email = '$user'";
$result = pg_query( $con, $query);

if(pg_num_rows($result) > 0){
    $name_error ="Sorry username is already taken";
    $_SESSION['userCRT'] = NULL;
    $_SESSION['passwordCRTCRT'] = NULL;
    echo "<script type='text/javascript'>alert(\"$name_error\");</script>";

   // header("Location: create_user_pass.php?Error=NotUnique");


}
else{
    $_SESSION['userCRT'] = $user;
    $_SESSION['passwordCRTCRT'] = $pass;
     header("Location: create_account_user.php?Approved=");
}



}





?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="stylelogin.css">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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

                    <form method="post" action="create_user_pass.php">
                        <div class="form-group">
                            <label for="passwordCRT">Email address</label>
                            <input type="email" name="userCRT" class="form-control" id="userCRT" aria-describedby="emailHelp" placeholder="Enter email" required>

                        </div>



                        <div class="form-group">
                            <label for="passwordCRT">Password</label>
                            <input type="password" name="passwordCRT" class="form-control" id="passwordCRT" placeholder="Password" pattern=".{5,10}" required title="5 to 10 characters" >
                        </div>
                        <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






</body>
</html>
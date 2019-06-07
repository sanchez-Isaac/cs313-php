<?PHP
session_start();

$_SESSION['userCRT'] = test_input($_POST['userCRT']);
$_SESSION['passwordCRT'] = md5(test_input($_POST['passwordCRT']));





function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

*/

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

<div class="header">
    <h1 class="headtitle"> Register an Account</h1>
    <br>
    <br>
</div>


<br>
    <div class="container">
        <div class="col-sm-6 col-sm-offset-4 ">
            <div class="jumbotron">

                <div class="row">
                    <div>
                        <div class="pic"><img src="https://www.digicert.com/account/images/login-shield.png" width="150px;"></div>
                    </div>
                    <br>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="passwordCRT">Email address</label>
                            <input type="email" class="form-control" id="passwordCRT" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="passwordCRT">Password</label>
                            <input type="password" class="form-control" id="passwordCRT" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





</body>
</html>

<?PHP
session_start();

$_SESSION['first_name'] = test_input($_POST['first_name']);
$_SESSION['last_name'] = test_input($_POST['last_name']);
$_SESSION['email'] = test_input($_POST['email']);
$_SESSION['street'] = test_input($_POST['street']);
$_SESSION['username'] = test_input($_POST['username']);
$_SESSION['password'] = md5(test_input($_POST['password']));





function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>Confirmation Page</title>
    <link href="03ProveStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="CustomStyles.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>


<div class="header">
    <h1 class="headtitle"> Register a New Admin Account</h1>
    <br>
    <br>
</div>


<div class="container">
    <div class="col-6 col-sm-4"></div>
    <div class="col-6 col-sm-4">
        <div class="jumbotron">

<div class="container">
    <div style="clear:both"></div>
    <br/>

        <form  method="post" action="addAdmin.php?">
            <div class="row">

                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" value="" required>
                <br>
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="" required>
                <br>
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="" value="" required>
                <br>
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="you@example.com" required>
                <br>
                <label for="password">Password</label>
                <input size="16" type="password" name="password" class="form-control" id="password" placeholder="Password" pattern=".{5,10}" required title="5 to 10 characters" >

            <br>
            <br>
            <div>
                <button class="btn btn-success btn-lg" value="submit" name="Submit" type="submit"> Confirm </button><br><br>

            </div>
        </form>
</div>
        </div>
    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="footer">
    <p>CS 313 - Web Engineering II    &copy; 2016 - <?php echo date("Y");?> </p>

</div>
</body>
</html>

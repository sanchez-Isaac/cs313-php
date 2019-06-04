<?php
session_start();
?>

    <!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">




    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <div class="login-container">
        <form action="/logout.php">

            <button type="submit">LogOut</button>
        </form>
    </div>
</div>




<?php
if(!isset($_SESSION['username']))
{
    header('location: 07Prove.php?Login=False');
}
?>
<div class="header">
    <h1>Home Page</h1>
    <br>
    <br>
    <a href="logout.php">Logout</a>
    <br>
</div>
<div> Welcome <?php echo $_SESSION['username']; ?></div>

<?php
if(isset($_SESSION['username']))
{
    echo '<br>';
    echo '<a href="itemsSearch.php" >Search and edit the items in the store</a>';

}
?>




</body>
</html>
















</body>
</html>
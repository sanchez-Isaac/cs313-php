<?php
session_start();
?>

    <!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">




    <link rel="stylesheet" href="homestyle.css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home Page</title>
</head>
<body>
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


















<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <div class="login-container">
        <form action="/logout.php.php">
            <button type="submit">LogOut</button>
        </form>
    </div>
</div>

<div style="padding-left:16px">
    <h2>Responsive Login Form in Navbar</h2>
    <p>Navigation menu with a login form and a submit button inside of it.</p>
    <p>Resize the browser window to see the responsive effect.</p>
</div>

</body>
</html>
















</body>
</html>
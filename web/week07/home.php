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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <div class="login-container">
        <form action="logout.php">

            <button type="submit">Log Out</button>
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
    <h1> Welcome <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>
</div>




<br>

<div class="w3-container">
    <h2>Select Admin tool</h2><br><br>
</div>
<form action="home.php" type="POST">
<div class="w3-row-padding">

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-black w3-xlarge w3-padding-32">Admin</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">Add Admins </h2>
                <span class="w3-opacity">To manage the store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-green w3-padding-large">Add Admins</button>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-green w3-xlarge w3-padding-32">Add Items</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">Query and Search</h2>
                <span class="w3-opacity">Items in/to the store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <button formaction="itemsSearch.php" class="w3-button w3-green w3-padding-large">Query/Add items</button>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-black w3-xlarge w3-padding-32">Users</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">Add Users</h2>
                <span class="w3-opacity">To use the Store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-green w3-padding-large">Add Users</button>
            </li>
        </ul>
    </div>

</div>
</form>

</body>


















<div class="footer">
    <p>CS 313 - Web Engineering II    &copy; 2016 - <?php echo date("Y");?> </p>

</div>

</body>
</html>
















</body>
</html>
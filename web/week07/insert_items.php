<?php
session_start();
require ('DbConnect.php');

$con = get_db();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insert into the DB</title>


    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(!isset($_SESSION['username']))
{
    header('location: 07Prove.php?Login=False');
}
?>


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
<br>


<div class="header">
    <h1 class="headtitle">Inserting new Items</h1>
    <br>
    <br>
</div>


div class="container">';
<form method="post" action="insert_query.php">
    Item name:<br>
    <input type="text" name="item_name" required>
    <br>
    Item type: (Ask a manager)<br>
    <input type="text" name="item_type" required>
    <br>
    Item price:<br>
    <input type="text" name="item_price" required>
    <br>
    Item quantity:<br>
    <input type="number" name="item_quantity" required>
    <br>
    Item picture: (URL)<br>
    <input type="text" name="photo_desc" required>
    <br><br>

    <?php
    if(isset($_SESSION['username']))
    {

        echo '<input type="submit" class="btn btn-primary" name="insert" value="Insert">';
        echo '</div>';
    }
    ?>

</form>
    <br>
    <div class="container">
        <a class="btn btn-success" href="home.php" role="button">Back Home</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="footer"><p>CS 313 - Web Engineering II   &copy; 2016 - <?php echo date("Y");?> </p></div>
</body>
</html>

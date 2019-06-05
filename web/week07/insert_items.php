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
<div><h1>Inserting new Items</h1></div>
<div>

<form method="post" action="insert_query.php">
    Item name:<br>
    <input type="text" name="item_name" >
    <br>
    Item type: (Ask a manager)<br>
    <input type="text" name="item_type" >
    <br>
    Item price:<br>
    <input type="text" name="item_price" >
    <br>
    Item quantity:<br>
    <input type="number" name="item_quantity" >
    <br>
    Item picture: (URL)<br>
    <input type="text" name="photo_desc" >
    <br><br>

    <?php
    if(isset($_SESSION['username']))
    {
        echo '<input type="submit" class="btn btn-primary" name="insert" value="Insert">';
    }
    ?>

</form>

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

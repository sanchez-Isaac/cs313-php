<?php
require ('DbConnect.php');
session_start();
$con = get_db();


$query = 'SELECT DISTINCT item_type FROM items';
$result = pg_query( $con, $query);


?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Query and Insert Items</title>

    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php

if(!isset($_SESSION['username']))
{    header('location: 07Prove.php?Login=False');}
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
    <h1 class="headtitle"> Items Available</h1>
    <br>
    <br>
</div>


<br>
<br>
<form action="itemsSearch.php" class="search" method="post"
<b><label for="name">Items type:</label></b>
<select name="item_type_name">
    <?php
    // the pg_fetch_assoc($result) will use the query and assign it to rows variable
    while($rows = pg_fetch_assoc($result))
    {
        //auto population of an option drop down menu from a database
        $item_type = $rows['item_type'];
        echo "<option value='$item_type' >$item_type</option>";
    }
    ?>
</select>

<?php
if(isset($_SESSION['username']))
{
 echo '<input type="submit" value="Search">';
}
?>


</form>

<?php
$item_typ_name = $_POST['item_type_name'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo 'Searching items in the: '.'<b>' . $item_typ_name .'</b>' . ' section';
}

?>
<br>
<br>
<br>
<br>
<div class="container" >
    <div class="col-sm-6 col-sm-offset-4 ">

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {

    $sqlQuery = "SELECT item_name, item_type, item_price, item_quantity FROM items WHERE item_type = '" . $item_typ_name . "'";
    $result2 = pg_query($con, $sqlQuery);

    if (pg_num_rows($result2) > 0) {
        while ($row = pg_fetch_array($result2)) {
            echo "<div class=\"card-columns\" >";
            echo  "<div class=\"card bg-light\">";
            echo "<div class=\"card-body text-center\">";
            echo "<p class=\"card-text\"><b>Name: </b>" .$row[0] . "<br>" ."<b>Type of Item: </b>". $row[1] . "<br>" ."<b>Price: </b>$". $row[2] . "<br>" ."<b>Quantity available: </b>". $row[3] . "<br></p>";
            echo "<br></div></div></div>";

        }
    }

}
?>
    </div>
</div>
<br><br>


<div>
    <a class="btn btn-primary" href="insert_items.php" role="button">Insert Item</a>
    <br>
    <br>
    <a class="btn btn-success" href="home.php" role="button">Back Home</a>
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
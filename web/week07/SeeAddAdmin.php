<?php
require ('DbConnect.php');
session_start();
$con = get_db();


$query = $query = 'SELECT DISTINCT admin_id, name, last_name, user_name, email FROM admin';


?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Query and Insert Items</title>

    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>

<?php

if(!isset($_SESSION['username']))
{    header('location: 07Prove.php?Login=False');}
?>

<div class="topnav">
    <a class="active" href="home.php">Home</a>
    <a href="store.php">Store</a>
    <a href="itemsSearch.php">Search inventory</a>
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





<br>
<br>
<br>
<br>
<div class="container">
    <div class="card-columns">
        <?php



        $result = pg_query( $con, $query);


        if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_array($result)) {
                    echo  "<div class='card bg-light'>";
                    echo "<div class='card-body text-center'>";
                    echo "<p class='card-text'><b># of Employee: </b>" .$row[0] . "<br>" ."<b>Name: </b>". $row[1] . "<br>" ."<b>Username: </b>$". $row[2] . "<br>" ."<b>Email: </b>". $row[3] . "</p>";
                    echo "</div></div>";

                }
        }
        ?>
    </div>
</div>
<br><br>

<div class="container">
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
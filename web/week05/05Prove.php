<?php

$host = "ec2-54-235-167-210.compute-1.amazonaws.com";
$user = "bgioyeuxgspzay";
$pass = "2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa";
$db = "dedc617q6k4b6s";
$port = "5432";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")

or die ("Could not connect to server\n");




$query = 'SELECT DISTINCT item_type FROM items';
$result = pg_query( $con, $query);

$item_typ_name = $_POST["item_type_name"];
echo $item_typ_name;
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Query and Insert Items</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<h1>Items available</h1>
<br>
<br>
<form action="05Prove.php" class="search" method="post"
<b><label for="name">Items type:</label></b>
<select name="items">
    <?php
    // the pg_fetch_assoc($result) will use the query and assign it to rows variable
    while($rows = pg_fetch_assoc($result))
    {
        //auto population of an option drop down menu from a database
        $item_type = $rows['item_type'];
        echo "<option value='$item_type' name='item_type_name'>$item_type</option>";
    }
    ?>
</select>
<input type="submit" value="Search">

</form>




</body>
</html>
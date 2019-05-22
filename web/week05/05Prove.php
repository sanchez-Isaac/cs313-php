<?php

$host = "ec2-54-235-167-210.compute-1.amazonaws.com";
$user = "bgioyeuxgspzay";
$pass = "2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa";
$db = "dedc617q6k4b6s";
$port = "5432";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")

or die ("Could not connect to server\n");




$query_one = 'SELECT item_type FROM items';
$result = pg_query( $con, $query_one);
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


<b><label for="name">Items:</label></b>
<input type="text" name="name" id="name">
<input type="submit" value="Search">


<select name="items">
    <?php
    while($rows = $result->pg_fetch_assoc())
    {
        $item_type = $rows['item_type'];
        echo "<option value='$item_type'>$item_type</option>";
    }

    ?>

</select>



</form>




</body>
</html>
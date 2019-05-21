<?php
require('connection.php');


$query_one = 'SELECT DISTINCT item_type FROM items';
$result = pg_query($sql);
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
    while($rows = $result->fetch_assoc())
    {
        $item_type = $rows['item_type'];
        echo "<option value='$item_type'>$item_type</option>";
    }

    ?>

</select>



</form>




</body>
</html>
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


    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<?php
if(!isset($_SESSION['username']))
{
    header('location: 06Prove.php?Login=False');
}
    ?>

<h1>Items available</h1>
<?php
$item_typ_name = $_POST['item_type_name'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo 'Searching items in the: '.'<b>' . $item_typ_name .'</b>' . ' section';
}
?>
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
<br>
<br>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {

    $sqlQuery = "SELECT item_name, item_type, item_price, item_quantity FROM items WHERE item_type = '" . $item_typ_name . "'";
    $result2 = pg_query($con, $sqlQuery);

    if (pg_num_rows($result2) > 0) {
        while ($row = pg_fetch_array($result2)) {
            echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . " " . $row[4] . " " . $row[5];
            echo "<br>";
        }
    }

}
?>
<br><br>
<?php
if(isset($_SESSION['username']))
{
    echo '<a href="insert_items.php">Insert new items</a>';
}
?>



<br>
<br>
<a href="home.php" >Go back to Home</a>


</body>
</html>
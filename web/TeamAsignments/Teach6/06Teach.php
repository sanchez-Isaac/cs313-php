<?php
session_start();
require ('DbConnect.php');
$con = get_db();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Teach06">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<h1>Insert Scripture</h1>

<form method="post" action="insert.php">

    Book:<br>
    <input type="text" name="book"><br>
    Chapter:<br>
    <input type="text" name="chapter"><br>
    Verse:<br>
    <input type="text" name="verse"><br>
    Content:<br>
    <textarea  rows="4" cols="50" name="content"></textarea><br>

    <h2><b>Topic</b></h2>

    <?php
    $query = 'SELECT * FROM topic';
    $result = pg_query( $con, $query);

    if (pg_num_rows($result) > 0) {
        // output data of each row
        while($row = pg_fetch_assoc($result)) {
            echo " <input type='checkbox' name='". $row['id'] . "'value='". $row['id'] . "'>" . $row['name'] . "<br>" ;
        }
    } else {

    }
    ?>
    <br>
    <button type="submit" name="insert">Insert</button>


</form>

<a href="query_scriptures.php">See DB scriptures</a>


</body>
</html>

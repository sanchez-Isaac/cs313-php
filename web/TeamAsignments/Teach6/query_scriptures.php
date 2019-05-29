<?php

session_start();
require ('DbConnect.php');
$con = get_db();



$query = 'SELECT * FROM scriptures s, scripture_and_topic st,topic t WHERE s.id = st.scrip_id and st.topic_Id=t.id;';
$result = pg_query( $con, $query);


$query2 = 'SELECT s.book, s.chapter, s.verse, s.content, t.name
FROM scriptures s   join topic t USING(id);';
$result2 = pg_query( $con, $query2);



?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Teach 05">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<script src="js/scripts.js"></script>


<?php
if (pg_num_rows($result) > 0) {
    // output data of each row
    while($row = pg_fetch_assoc($result)) {
        echo "<br><b>".$row["book"]. "</b>" . " - " . $row["chapter"]. ":" . $row["verse"]. "<br>" . $row["content"] . "<br>" . "<b> Topic: " . $row["name"] . "<br>";
    }

}


?>


</body>

<?php
$conn->close();
?>
</html>

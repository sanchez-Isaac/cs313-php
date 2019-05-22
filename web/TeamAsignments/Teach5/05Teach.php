<?php


$host = "ec2-23-21-129-125.compute-1.amazonaws.com";
$user = "qvuhdtpvtfgheg";
$pass = "e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08";
$db = "dbe43cu3qv6rjv";
$port = "5432";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");


$query = 'SELECT * FROM Scriptures';
$result = pg_query( $con, $query);


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
        echo "book " . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
</body>
</html>

<?php

$con = "dbname=dbe43cu3qv6rjv port=5432 user=qvuhdtpvtfgheg password=e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08 sslmode=require";
if (!$con)
{
    echo "Database connection failed.";
}
else
{
    echo "Database connection success.";
}


$query = 'SELECT * FROM products ORDER by id ASC';
$result = pg_query($con, $query);
$resultArr = pg_fetch_all($result);
print_r($resultArr);

if($result){
    if(pg_num_rows($result)>0){
        while($product = pg_fetch_assoc($result)){
            print_r($product);
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Browse Items</title>
    <link href="styleSheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>

<h1>Available Items</h1><br><br>

<?php


?>



</body>
</html>

<?php

$host = "ec2-23-21-129-125.compute-1.amazonaws.com";
$user = "qvuhdtpvtfgheg";
$pass = "e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08*";
$db = "dbe43cu3qv6rjv";
$port = "5432";

$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");


$query = 'SELECT * FROM products ORDER by id ASC';

$result = pg_query( $con, $query);

if($result){
    if(pg_num_rows($result)>0){
        while($product = pg_fetch_assoc($result)){
            print_r($product);
        }
    }
}
pg_close($con);
?>

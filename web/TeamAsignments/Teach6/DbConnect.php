<?php

function get_db()
{
    $host = "ec2-23-21-129-125.compute-1.amazonaws.com";
    $user = "qvuhdtpvtfgheg";
    $pass = "e50137efad45ae63f6a5fa81a0f202027a32756361cc2b8c818d5acecc268e08";
    $db = "dbe43cu3qv6rjv";
    $port = "5432";

    $con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")

    or die ("Could not connect to server\n");

    return $con;
}
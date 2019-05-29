<?php
session_start();

$item_type = $_SESSION['item_type'];
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insert into the DB</title>
</head>

<body>

<div> <?php echo $item_type ?></div>

</body>

</html>

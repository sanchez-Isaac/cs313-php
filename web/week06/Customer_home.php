<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">




    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home Page</title>
</head>
<body>
<?php
if(!isset($_SESSION['username']))
{
    header('location: 06Prove.php?Login=False');
}
?>
<div class="header">
    <h1>Home Page</h1>

    <br>
    <br>
    <a href="logout.php">Logout</a>
    <br>

</div>
<div> Welcome <?php echo $_SESSION['username']; ?></div>

<?php
if(isset($_SESSION['username']))
{
    echo '<br>';
    echo '<a href="store.php" >Go to the Store</a>';

}
?>

</body>
</html>
<?php
session_start();
?>

    <!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">


<meta name="description" content="The HTML5 Herald">
<meta name="author" content="SitePoint">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home Page</title>
</head>
<body>

<div class="header">
    <h1>Home Page</h1>

</div>
<div> Welcome <?php echo $_SESSION['username']; ?></div>

<?php
if(isset($_SESSION['username']))
{
    echo '<br>';
    echo '<a href="itemsSearch.php" target="_blank">Search and edit the items in the store</a>';

}
?>

</body>
</html>
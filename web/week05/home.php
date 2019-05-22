<?php
/**
 * Created by PhpStorm.
 * User: idsm_
 * Date: 22/05/2019
 * Time: 12:07 AM
 */

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
    <h1>HomePage</h1>

</div>
<div> Welcome <?php echo $_SESSION['username']; ?></div>

</body>
</html>
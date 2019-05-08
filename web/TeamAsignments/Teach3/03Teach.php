<?php


?>


<html>
<body>

Welcome <?php echo htmlspecialchars($_POST["name"]); ?><br>
mailto: <?php echo htmlspecialchars($_POST["email"]);?><br><br>
Major: <?php echo htmlspecialchars($_POST["major"]);?><br>
comments:<?php echo htmlspecialchars($_POST["comment"]);?><br>
<br>
<br>
<h3>Part 3 - continents the user has visited</h3> <br> <br>





Continents:<br><?php
$continentss = $_POST["continent"];
foreach ($continentss as $val){
    echo $val."<br>";
}
?>



</body>
</html>
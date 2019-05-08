<?php
$continents = $_POST['continents'];

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





Continents:<?php
foreach ($continents as $val){
    echo $val."<br>";
}
?>



</body>
</html>
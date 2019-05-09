<html>
<body>

Welcome <b><?php echo htmlspecialchars($_POST["name"]); ?></b><br>
Your email address is: <b><a href="mailto:<?php echo $_POST["email"];?>" target="_blank"><?php echo $_POST["email"] ?> </a></b><br>
Major: <b><?php echo htmlspecialchars($_POST["major"]);?></b><br>
comments:<?php echo "<b>" . htmlspecialchars($_POST["comment"]). "</b>";?><br>
<br>

Continents:<br><?php

$cont = array("na" => "North America", "sa"=> "South America", "eu"=>"Europe","au"=>"Australia", "as"=>"Asia","af"=>"Africa","an"=>"Antarctica");


$continentss = $_POST["continent"];
foreach ($continentss as $val){
    echo "<b>". $cont[$val]."<b>"."<br>";
}
?>

</body>
</html>
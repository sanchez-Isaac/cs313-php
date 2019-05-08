<!DOCTYPE HTML>
<html>
<body>

<h1>Team Activity</h1>
<br><br>

<form action="03Teach.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>

    <h2><b>Select your Major:</b></h2>
    <?php
    $majors = array("Computer Science", "Web Design and Development", "Computer information Technology", "Computer Engineering");
    $sizeM = sizeof($majors);
    for ($i = 0; $i < $sizeM; $i++){
        echo "<input type='radio' name='major' value='" . $majors[$i] . "'>" . $majors[$i] . "<br>";
    };
		?>
    <br>

    <h2><b>Places you have been:</b></h2>

    <input type="checkbox" name="continent[]"  value="North America">North America<br>
    <input type="checkbox" name="continent[]"  value="South America">South America<br>
    <input type="checkbox" name="continent[]"  value="Europa">Europa<br>
    <input type="checkbox" name="continent[]"  value="Asia">Australia<br>
    <input type="checkbox" name="continent[]"  value="Australia">Africa<br>
    <input type="checkbox" name="continent[]"  value="Africa">Africa<br>
    <input type="checkbox" name="continent[]"  value="Antarctica">Antarctica<br/>
    <br><br>
    Comment: <br><textarea name="comment" rows="5" cols="40"></textarea>
    <br> <br>


    <input type="submit" name="submit" value="Submit">

</form>

</body>
</html>
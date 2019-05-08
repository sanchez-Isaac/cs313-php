<html>
<body>

Welcome <?php echo htmlspecialchars($_POST["name"]); ?><br>
mailto: <?php echo htmlspecialchars($_POST["email"]);?><br><br>
Major: <?php echo htmlspecialchars($_POST["major"]);?><br>
comments:<?php echo htmlspecialchars($_POST["comment"]);?><br>

</body>
</html>
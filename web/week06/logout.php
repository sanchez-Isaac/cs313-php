<?php
session_start();
session_unset();
session_destroy();
header('Location: 06prove.php');
exit();

<?php
session_start();
session_unset();
session_destroy();
header('Location: 07Prove.php');
exit();

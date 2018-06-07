<?php
session_start();
session_unset($_SESSION['firstName']);
session_unset($_SESSION['lastName']);
session_unset($_SESSION['userId']);
session_unset($_SESSION['userEmail']);
header("location:index.php");


?>
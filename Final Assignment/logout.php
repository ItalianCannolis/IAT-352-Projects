<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // redirect to the login page after logout
exit();
?>

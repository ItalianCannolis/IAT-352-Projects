<?php
session_start();
session_unset();
session_destroy();

// Redirect to the initialize page
header("Location: initialize.php");
exit();
?>

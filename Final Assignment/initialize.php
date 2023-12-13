<?php
  ob_start(); // output buffering is turned on
  session_start();

//   session_start(); // turn on sessions

  require_once('db.php');
  require_once('queryfunctions.php');
  require_once('login.php');
  require_once('register.php');

  $db = db_connect();
  $errors = [];

?>

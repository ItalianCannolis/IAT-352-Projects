<?php 
include 'header.php';
include 'query_functions.php';

$errors = [];
$username = '';
$password = '';

if(isset($_SESSION['username'])){
    header("Location: showmodels.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Retrieve data from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, hashed_password from "
    // not done am currently adding a new table in mysql to store the user information
}

?>


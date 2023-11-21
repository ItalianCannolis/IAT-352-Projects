<?php 
    include 'header.php';
    include 'query_functions.php';

    //code referenced from  PHP and MySQL Web Development, 5th edition Chap 22

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_POST['email']) && isset($_POST['encryptedPassword'])){
            //if the user has tried to log in
            $email = $_POST['email'];
            $password = $_POST['encryptedPassword'];

            $conn = db_connect();

            if (mysqli_connect_errno()){
                echo "connection to database failed: ".mysqli_connect_error();
                exit();
            }

            $sql = "SELECT * FROM users WHERE email='".$email."' and encrytedPassword=shal('".$password."')";

            $result = $conn->query($sql);
            if ($result->num_rows){
                //if query is registered
                $_SESSION['email'] = $email;
            }
            db_disconnect();

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<div>
    <h1>Watchlist</h1>
    <?php
        if (isset($_SESSION['email'])){ //check to see if the user's session has an email attached to it. If so, proceed to this page. 
            echo '<p> you are logged in</p>';
        }
        else{
            if (isset($email)){
                //if they've tried and failed to log in
                echo "<p> could not log you in </p>";
            }
            else { //If not, redirect to the login page.
                //are not logged and dont have an account
                header('Location: login.php');
            }
        }
    ?>
</div>

<?php 
    include 'header.php';
    include 'query_functions.php';

    //check to see if the user's session has an email attached to it. If so, proceed to this page. If not, redirect to the login page.
    if (!isset($_SESSION['email'])) {
        // redirect to login pg
        $_SESSION['callback_url'] = 'addtowatchlist.php';
        header("Location: login.php");
        exit;
    }

?>

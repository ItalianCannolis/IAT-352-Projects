
<?php
//not sure how to implement this (from lecture slide)
// Check if the current protocol is not HTTPS, switch to HTTPS for login and register pages
//if ($_SERVER['HTTPS'] != 'on') {
   // $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    //if (strpos($url, 'login.php') !== false || strpos($url, 'register.php') !== false) {
      //  header("Location: $url");
        //exit();
    //}
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="showmodels.php">All Models</a></li>
                <li><a href="addtowatchlist.php">Watchlist</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

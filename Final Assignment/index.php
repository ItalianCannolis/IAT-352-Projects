<?php 
 session_start();
 include 'header.php';
 include 'queryfunction.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Query Form</title>
    <style>
        /* trying to add css (339) to make it look like the example */
        form {
            display: flex;
            flex-direction: column;
        }
        /* spaces btwn boxes */
        .checkbox-section {
            margin-left: 10px; /* 10 seems reasonable */
        }
        /* styling page button to specific width and location */
        input[type="submit"] {
            max-width: 200px; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>


    <h2>Search Cover Arts</h2>
    <form method="get" action="albumdetails.php">
        <!-- search for cover art -->
        <input type="text" name="search_term" id = "search_term" placeholder="search cover art">
        <input type="submit" value="Search">
    </form>

</body>

</html>


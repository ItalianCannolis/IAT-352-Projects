<?php 
 include 'header.php';
 include 'queryfunction.php';

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $albumname = $_POST['albumname'];
    $albumData = find_album_by_name($albumname);
    echo $albumData[0];
    echo $albumData[1];
    echo $albumData[2];
 }
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
    <h2>Query</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Select Order Paramters</h3>
        <label for="orderNumber">Album Name:</label>
        <input type="textbox" name="albumname">
        <br>

        <input type="submit" value="Search Album">
    </form>

    
</body>
</html>



<!-- select id, name from employee -->
<!-- fetch_row [1, 'David'] -->
<!-- -->
<!-- -->
<!-- -->

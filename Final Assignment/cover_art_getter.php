<?php

include 'query_functions.php';
$cover = find_cover_by_id(5864);

//$truth = $_POST[$cover];

?>

<!DOCTYPE html>
<html lang='en'>
<head>
    
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Your Website</title>

</head>
<body>
<a href="cover_art_collage.php?varname=<?php echo $cover ?>">Page2</a>


</body>
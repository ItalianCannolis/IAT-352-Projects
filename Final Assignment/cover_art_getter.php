<?php 
 include 'header.php';
 include 'queryfunction.php';
 ?>
<!DOCTYPE html>
<html lang='en'>
<head>|
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/grid.css">
  <script type="text/javascript" src="blob_reader.js"></script> 
    <!--<script type="text/javascript" src="cover_art_generator.js"></script>-->
</head>
<body>
<div class = "collage">
    <!---<img width="390" height="390" id='image1' class = 'collageImg'/> -->

</div>


    <?php 
        $file = fopen("Img/cover_art-cover.bin", "rb");

        $image = find_cover_by_id(5864);

        $path = "img";
        

        $name = "test.jpg";
           // option 1
           $file = fopen($path."/".$name,"w");
           echo "File name: ".$path."$name".    "\n";
           fwrite($file, $image[0]);

           fclose($file);

           echo '<img src="Img/test.jpg' . '" />';

    ?>



</body>
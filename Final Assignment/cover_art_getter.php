<?php 
 include 'header.php';
 include 'queryfunction.php';
 include 'cover_art_functions.php';
 session_start();
 ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/grid.css">
    <!---<script type="text/javascript" src="blob_reader.js"></script>---> 
    <!--<script type="text/javascript" src="cover_art_generator.js"></script>-->
</head>
<body>
<div class = "collage">
    <!---<img width="390" height="390" id='image1' class = 'collageImg'/> -->

</div>


    <?php 
    if(isset($_SESSION['mem_id'])){
     
       $collageNames = find_collage_owner_by_mem_id($_SESSION['mem_id']);

        generate_dropdown($collageNames);
    }

    if(isset($_POST['collagename'])){
            $coverID = find_collage_id_by_name($_POST['collagename']);
            $ids = explode(",",$coverID[1]);
            shuffle($ids);


        

            $path = "img";
            for ($x = 0; $x < 12; $x++) {
                //echo $ids[$x];
                    $image = find_cover_by_id(intval($ids[$x]));

                    $fileExtension = $image[1];

                    $name = "collage".$x.$fileExtension;
                    // option 1
                    $file = fopen($path."/".$name,"w");
                    //echo "File name: ".$path."$name".    "\n";
                    fwrite($file, $image[0]);

                    fclose($file);
                    echo '<img src="Img/'.$name . '" width="25%" height="25%" />';
            }
        }
    
           //echo '<img src="Img/collage'.$x.'.jpg' . '" />';

    ?>



</body>
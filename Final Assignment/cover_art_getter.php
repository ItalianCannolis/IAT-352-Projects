<?php 
 session_start();
 include 'header.php';
 include 'queryfunction.php';
 include 'cover_art_functions.php';

 ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/grid.css">

</head>
<body>
<div class = "collage">
    <!---<img width="390" height="390" id='image1' class = 'collageImg'/> -->

</div>


    <?php 

    if(isset($_SESSION['mem_id'])){
        //echo $_SESSION['mem_id'];
        $path = "img";
        $collageNames = find_collage_owner_by_mem_id($_SESSION['mem_id']);

        if($collageNames != null){
            if(isset($_POST['collagename'])){
                    $coverID = find_collage_id_by_name($_POST['collagename']);
                    if ($coverID[1] != '/n'){
                        $ids = explode(",",$coverID[1]);
                        shuffle($ids);

                        storeDispImages($ids, $path);
                    }
                    else{
                        echo "<h2> This collage has nothing in it! Add some stuff!</h2>";
                    }
                }
            else if(!isset($_POST['collagename'])){
                $collageNames = find_collage_owner_by_mem_id($_SESSION['mem_id']);
                $coverID = find_collage_id_by_name($collageNames[0]);
                $ids = explode(",",$coverID[1]);
                shuffle($ids);

                storeDispImages($ids, $path);
            }
            generate_dropdown($collageNames);
        }
        else{
            echo "<h2> you don't have any collages yet or you don't have anything in them, better get on that!</h2>";
        }

        generate_new_collage_form();
       
        if(isset($_POST['newCollage'])){
            create_new_collage_by_mem_id($_SESSION['mem_id'],$_POST['newCollage']);
            //$coverID = find_collage_id_by_name($_POST['collagename']);
            $ids = explode(",",$coverID[1]);
            shuffle($ids);

            storeDispImages($ids, $path);
        }

   
        
    }
    
           //echo '<img src="Img/collage'.$x.'.jpg' . '" />';


    function storeDispImages($ids, $path){

        for ($x = 0; $x < 12; $x++) {
            //echo $ids[$x];
                $total = count($ids);
                
                if($total >= 12 ||($total < 12 && $x < ($total-1)) ){
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
                else if($total < 12 && $x >= ($total-1)){


                    $duped_id = rand(0, ($total-1));
                    $image = find_cover_by_id(intval($ids[$duped_id]));
                    $fileExtension = $image[1];

                    $name = "collage".$x.$fileExtension;

                    $file = fopen($path."/".$name,"w");

                    fwrite($file, $image[0]);

                    fclose($file);
                    echo '<img src="Img/'.$name . '" width="25%" height="25%" />';

                }
        }
    }

    ?>



</body>
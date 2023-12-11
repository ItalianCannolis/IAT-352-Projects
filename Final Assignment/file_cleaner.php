<?php

    //include 'query_functions.php';
//$combined = [][];
    $combined = array();
    $combined[] = array();
    $readonce = false;


    //echo "i happen";

function readingFileCSV(){
    
    $file2 = fopen('data/release_raw.csv','r');
    global $combined;
    $countX = 0;

    while ($line2 = fgetcsv($file2)){
        $ids[] = $line2[0];

    }
    fclose($file2);

    
    $file = fopen('data/track_raw.csv','r');
    while ($line = fgetcsv($file)){

        //$lineExploded = (explode(",", $line));

        for ($i = 0; $i< count($ids); $i++){
            if($ids[$i] == $line[0]){
                //echo $lineExploded[0].'\n';
                //echo $ids[$i];
                //echo $lineExploded[0];
                for ($y = 0; $y< count($line); $y++){
                    $combined[$countX][$y] =  $line[$y];
    
                }
                $countX++;
            }


        }

    }



    fclose($file);

    //echo strval($combined[0][0]);
    echo "i finished";

}

function readingFileTXT(){
    
    $file2 = fopen('data/release_raw.csv','r');
    global $combined;
    $countX = 0;

    while ($line2 = fgetcsv($file2)){
        $ids[] = $line2[1];

    }
    fclose($file2);
    /*
    $file = fopen('data/cdtoc_raw.txt','r');
    while ($line = fgets($file)){

        $lineExploded = (explode(":", $line));

        for ($i = 0; $i< count($ids); $i++){
            if($ids[$i] == $lineExploded[0]){
                echo $lineExploded[0].'\n';
                //echo $ids[$i];
                //echo $lineExploded[0];
                for ($y = 0; $y< count($lineExploded); $y++){
                    $combined[$countX][$y] =  $lineExploded[$y];
    
                }
                $countX++;
            }


        }

    }
    */
    $file = fopen('data/Data_needed/release.tsv','r');
    //$file = fopen('data/Data_needed/artist.txt','r');
    //$file = fopen('data/Data_needed/artist_credit.txt','r');
    while ($line = fgets($file)){

        $lineExploded = (explode("  ", $line));

        $test = 10;
        for ($i = 0; $i< count($ids); $i++){
        //for ($i = 0; $i< $test; $i++){
            if($ids[$i] == $lineExploded[2]){



                //echo $lineExploded[0]."\n";
                //echo $ids[$i];
                //echo $lineExploded[2];
                //echo count($lineExploded)."\n";
                for ($y = 0; $y< count($lineExploded); $y++){
                    
                    //Checks Name value for commas
                    /*
                    if($y == 2){
                        $commaCheck = explode(",", $lineExploded[$y]);
                        //If explosion has more than 1 item in array, begin reconstruction
                        if (count($commaCheck) > 1){
                            $newLine;
                            for ($b = 0; $b< count($commaCheck); $b++){

                                if($b == 0){
                                    $newLine = $commaCheck[$b];
                                }
                                else{
                                $newLine = $newLine."++".$commaCheck[$b];
                                }
                            }
                            $combined[$countX][$y] =  $newLine;
                        }
                        else{
                            $combined[$countX][$y] =  $lineExploded[$y];
                        }

                    }
                    else{
                    */
                        $combined[$countX][$y] =  $lineExploded[$y];
                    //}
    
                }
                $countX++;
            }


        }

    }




    fclose($file);

    //echo strval($combined[0][0]);
    echo "i finished";

}
function writeCSV(){

    //For cdtoc file
    /*
    $file = fopen('new_data/cdtoc_raw.csv','w');
    global $combined;

    
    for ($i = 0; $i< count($combined); $i++){
        $combinedCSV = $combined[$i][0].",". $combined[$i][1].",". $combined[$i][2].",". $combined[$i][3].",". $combined[$i][4].",". $combined[$i][5];
        fwrite($file, $combinedCSV);
    }
    */
    //For track file
    /*
    $file = fopen('new_data/track.csv','w');
    global $combined;

    
    for ($i = 0; $i< count($combined); $i++){
        //echo (count($combined));
        //echo '<br>';
        //echo (count($combined[0]));
        $combinedCSV = $combined[$i][0].",". $combined[$i][1].",". $combined[$i][2].",". $combined[$i][3].",". $combined[$i][4];
        fwrite($file, "\n".$combinedCSV);
    }
    */
        //For artist file
    
    $file = fopen('new_data/artist.csv','w');
    //$file = fopen('new_data/artist_credit.csv','w');
    global $combined;

    
    for ($i = 0; $i< count($combined); $i++){
        //echo (count($combined));
        //echo '<br>';
        //echo (count($combined[0]));
    for  ($y = 0; $y< count($combined[$i]); $y++){


                if($y == 0){
                    $combinedCSV = $combined[$i][$y];
                }
                else{
                    $combinedCSV = $combinedCSV."++".$combined[$i][$y];
                    //$combinedCSV = $combinedCSV.",".$combined[$i][$y];
                }
    
        }
        //$combinedCSV = $combined[$i][0].",". $combined[$i][1].",". $combined[$i][2].",". $combined[$i][3].",". $combined[$i][4];
        fwrite($file, $combinedCSV);
        //fwrite($file, "\n".$combinedCSV);
    }


    fclose($file);
    

}

if($readonce == false){
    //readingfileCSV();
    readingfileTXT();
    writeCSV();
    $readonce = true;
}

?>
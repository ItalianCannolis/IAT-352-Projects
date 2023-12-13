<?php

    //include 'query_functions.php';
//$combined = [][];
    $combined = array();
    $combined[] = array();
    $combined2 = array();
    $readonce = false;
    $releaseAtr = array("id", "gid", "name", "artist_credit", "release_group", "status", "packaging", "language", "script", "barcode", "comment", "edits_pending", "quality", "last_updated");
    $track = array();
    $medium = array();
    $release = array();
    $release_group = array();
    $artist_credit = array();

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
    
    //$file2 = fopen('data/release_raw.csv','r');
    global $combined;
    $countX = 0;
    /*
    while ($line2 = fgetcsv($file2)){
        $ids[] = $line2[1];

    }
    fclose($file2);
    */
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
    $fileTrack = fopen('data/Data_needed/track.txt','r');
    $fileMedium = fopen('data/Data_needed/medium.tsv','r');
    $fileRelease = fopen('data/Data_needed/release.tsv','r');
    $fileReleaseGroup = fopen('data/Data_needed/release_group.txt','r');
    $fileReleaseGroupMeta = fopen('data/Data_needed/release_group_meta.txt','r');
    $fileReleaseGroupTag = fopen('data/Data_needed/release_group_tag.txt','r');
    $fileArtCred = fopen('data/Data_needed/artist_credit.txt','r');


    $fileNewTrack = fopen('newer_data/tracks.csv','r');
    $fileNewMedium = fopen('newer_data/medium.csv','r');
    $fileNewRelease = fopen('newer_data/release.csv','r');
    $fileNewReleaseGroup = fopen('newer_data/release_group.csv','r');
    $count2 = 0;
    while ($lineTrack = fgetcsv($fileNewTrack)){
        $ids[] = $lineTrack[7];
        //
        //$count2++;
        /*
        if($count2 > 500){
            break;
        }
        */

    }
    fclose($fileNewTrack);

    $testing = false;
    $count = 0;
   
    
/*
    while ($line = fgets($fileTrack)){

        if($testing == true){
            echo "id gid recording medium position number name artist_credit length edits_pending last_updated is_data_track";
            echo "<br>";
            echo $line;
            echo "<br>";
            
            $lineExploded = (explode("	", $line));
            
            for ($i = 0; $i< count($lineExploded); $i++){
                echo $lineExploded[$i];
                echo "<br>";

            }
            
            $idcomp = $lineExploded[3];
            break;
        }

        $lineExploded = (explode("	", $line));
        $skip = false;

        if(count($combined) > 0){

            for ($y = 0; $y< count($combined); $y++){
                //echo $combined[$y][6];
                if($combined[$y][6] == $lineExploded[6]){
                    $skip = true;
                    break;
                }

            }
            
        }

        for ($i = 0; $i< count($lineExploded); $i++){

            if($skip == false){
                $combined[$count][$i] = $lineExploded[$i];
                
            }

        }

        if($skip == false){
            $count++;
        }

       

        if($count > 1000){
            break;
        }
        



    }
    


    fclose($fileTrack);
    
    */
    $count = 0;
    global $combined2;
    /*


    while ($line2 = fgets($fileMedium)){
        
        //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

        $lineExploded = (explode("	", $line2));

        echo count($ids);
        for ($i = 0; $i< count($ids); $i++){
            if($lineExploded[0] == $ids[$i]){
                //for ($y = 0; $y< count($lineExploded); $y++){
                    //$combined[$count][$y] = $lineExploded[$y];
                $combined2[$count] = $line2;;
                //}
                $count++;
                break;
            }
            
        }

        if($count > count($ids)){
            break;
        }
        
    }
    fclose($fileMedium);

    */

    global $releaseAtr;
    /*
    while ($line2 = fgets($fileRelease)){
        
                //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

                $lineExploded = (explode("	", $line2));

                echo count($ids);
                for ($i = 0; $i< count($ids); $i++){
                    if($lineExploded[0] == $ids[$i]){
                        //for ($y = 0; $y< count($lineExploded); $y++){
                            //$combined[$count][$y] = $lineExploded[$y];
                        $combined2[$count] = $line2;;
                        //}
                        $count++;
                        break;
                    }
                    
                }
        
                if($count > count($ids)){
                    break;
                }
        
    }
    fclose($fileRelease);
    */
/*
    while ($line2 = fgets($fileReleaseGroup)){
        
        //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

        $lineExploded = (explode("	", $line2));

        echo count($ids);
        for ($i = 0; $i< count($ids); $i++){
            if($lineExploded[0] == $ids[$i]){
                //for ($y = 0; $y< count($lineExploded); $y++){
                    //$combined[$count][$y] = $lineExploded[$y];
                $combined2[$count] = $line2;;
                //}
                $count++;
                break;
            }
            
        }

        if($count > count($ids)){
            break;
        }

}
fclose($fileReleaseGroup);
*/
/*
while ($line2 = fgets($fileReleaseGroupMeta)){
        
    //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

    $lineExploded = (explode("	", $line2));

    echo count($ids);
    for ($i = 0; $i< count($ids); $i++){
        if($lineExploded[0] == $ids[$i]){
            //for ($y = 0; $y< count($lineExploded); $y++){
                //$combined[$count][$y] = $lineExploded[$y];
            $combined2[$count] = $line2;;
            //}
            $count++;
            break;
        }
        
    }

    if($count > count($ids)){
        break;
    }

}
fclose($fileReleaseGroupMeta);
*/
/*
while ($line2 = fgets($fileReleaseGroupTag)){
        
    //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

    $lineExploded = (explode("	", $line2));

    echo count($ids);
    for ($i = 0; $i< count($ids); $i++){
        if($lineExploded[0] == $ids[$i]){
            //for ($y = 0; $y< count($lineExploded); $y++){
                //$combined[$count][$y] = $lineExploded[$y];
            $combined2[$count] = $line2;;
            //}
            $count++;
            break;
        }
        
    }

    if($count > count($ids)){
        break;
    }

}
fclose($fileReleaseGroupTag);
*/
while ($line2 = fgets($fileArtCred)){
        
    //echo "id, release, position, format, name, edits_pending, last_updated, track_count";

    $lineExploded = (explode("	", $line2));

    echo count($ids);
    for ($i = 0; $i< count($ids); $i++){
        if($lineExploded[0] == $ids[$i]){
            //for ($y = 0; $y< count($lineExploded); $y++){
                //$combined[$count][$y] = $lineExploded[$y];
            $combined2[$count] = $line2;;
            //}
            $count++;
            break;
        }
        
    }

    if($count > count($ids)){
        break;
    }

}
fclose($fileArtCred);
    echo "<br>";
    echo "i finished";

}
function writeCSV(){


    
    //$file = fopen('newer_data/tracks.csv','w');
    //$file = fopen('newer_data/medium.csv','w');
    $file = fopen('newer_data/release.csv','w');
    //$file = fopen('new_data/artist_credit.csv','w');
    global $combined;

    
    for ($i = 0; $i< count($combined); $i++){

    for  ($y = 0; $y< count($combined[$i]); $y++){


                if($y == 0){
                    $combinedCSV = $combined[$i][$y];
                }
                else{
                    $combinedCSV = $combinedCSV."+V+V+".$combined[$i][$y];

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
    //writeCSV();
    writeCSV2();
    $readonce = true;
}

function writeTest($line2){

    
    $file = fopen('new_data/test.txt','w');



    fwrite($file, $line2);



    fclose($file);
    

}

function writeCSV2(){


    
    //$file = fopen('newer_data/tracks.csv','w');
    //$file = fopen('newer_data/medium.csv','w');
    //$file = fopen('newer_data/release.csv','w');
    //$file = fopen('newer_data/release_group.csv','w');
    //$file = fopen('newer_data/release_group_meta.csv','w');
    //$file = fopen('newer_data/release_group_tag.csv','w');
    $file = fopen('newer_data/artist_cred.csv','w');
    //$file = fopen('new_data/artist_credit.csv','w');
    global $combined2;

    
    for ($i = 0; $i< count($combined2); $i++){


        //$combinedCSV = $combined[$i][0].",". $combined[$i][1].",". $combined[$i][2].",". $combined[$i][3].",". $combined[$i][4];
        fwrite($file, $combined2[$i]);
        //fwrite($file, "\n".$combinedCSV);
    }


    fclose($file);
    

}

?>
<?php


function storeDispProfileImg($member_data, $path){


    //$image = $member_data[2];

    if($member_data != null){
        $name = "profile.jpeg";
        // option 1
        $file = fopen($path."/".$name,"w");
        //echo "File name: ".$path."$name".    "\n";
        fwrite($file, $member_data);

        fclose($file);
        //echo '<img src="Img/'.$name . '" width="25%" height="25%" />';
        return '<img src="Img/'.$name . '" width="25%" height="25%" />';
    }
    else{
        return '<img src="Img/default_profile_pic.jpg " width="25%" height="25%" />';
    }
             
}


?>
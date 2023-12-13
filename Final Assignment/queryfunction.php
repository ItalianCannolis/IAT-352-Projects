<?php
    include 'db.php';
    function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
        }
        return $output;
    }

    function find_cover_by_id($id) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = "SELECT cover, filetype FROM cover_art WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param("i", $id);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            $row = $result->fetch_assoc();
            //header("Content-type: " . $row["imageType"]);
            //echo $row["cover"];
            
            //echo base64_decode($row["cover"]);
            //echo ($row["filetype"]);
            $array[0] = $row["cover"];
            $array[1] = $row["filetype"];
            return $array;
      }

      function find_collage_id_by_name($name) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = "SELECT id_list, name FROM cover_list WHERE name=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $name);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            $row = $result->fetch_assoc();
            //header("Content-type: " . $row["imageType"]);
            //echo $row["cover"];
            
            //echo base64_decode($row["cover"]);
            //echo ($row["filetype"]);
            $array[0] = $row["name"];
            $array[1] = $row["id_list"];
            return $array;
            //return $result;
      }




      function find_collage_owner_by_mem_id($id) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = "SELECT name FROM cover_list WHERE mem_id=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param("i", $id);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving collage names<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            
            //header("Content-type: " . $row["imageType"]);
            //echo $row["cover"];
            $array = array();
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                $array[$count] = $row['name'];
                $count++;
            }
            //echo base64_decode($row["cover"]);
            //echo ($row["filetype"]);
            //$array[0] = $row["name"];
            return $array;

      }

      function create_new_collage_by_mem_id($id,$name) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = "INSERT INTO cover_list(mem_id,name,id_list) 
            VALUES (?,?,'/n')";
            
            $statement = $conn->prepare($sql);
            $statement->bind_param("is", $id,$name);
            $statement->execute() or die("<b>Error:</b> Problem on sending collage data<br/>" . mysqli_connect_error());


      }
      function add_to_collage_by_mem_id($mem_id,$cover_list_name,$album_id) { 
        $album_id_list = find_collage_id_by_name($cover_list_name);
        if($album_id_list[1] != '/n'){
            
            $album_id_list[1] = $album_id_list[1].",".$album_id;
        }
        else{
            $album_id_list[1] = $album_id;
        }

        $conn = db_connect();

        
            $sql = "UPDATE cover_list
            SET id_list = ?
            WHERE mem_id = ? AND name = ?";


            
            $statement = $conn->prepare($sql);
            $statement->bind_param("sis", $album_id_list[1],$mem_id,$cover_list_name);
            $statement->execute() or die("<b>Error:</b> Problem on sending collage data<br/>" . mysqli_connect_error());


      }

      function find_album_by_name($name) { //search for cover art by ID
        
        $conn = db_connect();
                    
            $sql ='SELECT release_group.name AS "album_name",medium.track_count AS "track_count",tracks.length AS "track_length",tracks.name AS "track_name", artist_cred.name AS "artist_name" FROM release_group, songs, `medium`,tracks, artist_cred WHERE release_group.name = ? AND release_group.id = songs.release_group AND medium.song = songs.id AND medium.id = tracks.medium AND artist_cred.id = release_group.artist_credit';
            
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $name);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            $row = $result->fetch_assoc();
            //header("Content-type: " . $row["imageType"]);
            //echo $row["cover"];
            
            //echo base64_decode($row["cover"]);
            //echo ($row["filetype"]);
            //$array[0] = $row["id"];
            $array[0] = $row["album_name"];
            $array[1] = $row["artist_name"];
            $array[2] = $row["track_name"];
            $array[3] = $row["track_count"];
            $array[4] = $row["track_length"];
            return $array;
      }


      function find_id_by_username($username) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = "SELECT mem_id FROM member WHERE username=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $username);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving mem_id<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            $row = $result->fetch_assoc();

          
            return  $row["mem_id"];
      }




?>  

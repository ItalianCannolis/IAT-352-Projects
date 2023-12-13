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
      }

      function find_album_by_name($name) { //search for cover art by ID
        
        $conn = db_connect();

            $sql = 'SELECT release_group.id,release_group.name,release_group.artist_credit,songs.release_group,songs.name,medium.track_count,tracks.length FROM release_group, songs, medium,tracks WHERE release_group.name=? AND release_group.id = songs.release_group AND medium.song == songs.id AND medium.id == tracks.medium';
            
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $name);
            $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
            $result = $statement->get_result();
        
            $row = $result->fetch_assoc();
            //header("Content-type: " . $row["imageType"]);
            //echo $row["cover"];
            
            //echo base64_decode($row["cover"]);
            //echo ($row["filetype"]);
            $array[0] = $row["id"];
            $array[1] = $row["artist_credit"];
            $array[2] = $row["name"];
            return $array;
      }
?>  

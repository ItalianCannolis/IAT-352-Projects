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
?>  

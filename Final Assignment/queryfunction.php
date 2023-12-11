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

    function find_cover_by_id($id) { //search for model by name 
        
        $conn = db_connect();
        /*
        $sql = "SELECT cover FROM cover_art ";
        //$sql .= "WHERE id ='" . db_escape($conn, $id) . "' ";
        
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        confirm_result_set($result);

        //echo $result;
        //return $result;
        $model = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $model; // returns an assoc. array
        // db_disconnect($conn);
        */


        //if (isset($_GET['image_id'])) {
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
        //}
      }
?>  

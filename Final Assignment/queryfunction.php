<?php
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
    
        $sql = "SELECT * FROM cover_art ";
        $sql .= "WHERE id ='" . db_escape($conn, $id) . "' ";
        
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        confirm_result_set($result);
        $model = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $model; // returns an assoc. array
        // db_disconnect($conn);
      }
?>  

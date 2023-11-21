<?php
include 'db.php';
    function find_all_models() { //gather all models 
    $conn = db_connect();


    $sql = "SELECT * FROM products";
    
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);
    return $result;
    db_disconnect($conn);
  }

  function find_model_by_name($name) { //search for model by name 
    $conn = db_connect();

    $sql = "SELECT * FROM products ";
    $sql .= "WHERE productName ='" . db_escape($conn, $name) . "' ";
    
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);
    $model = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $model; // returns an assoc. array
    // db_disconnect($conn);
  }

    //  Functions
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
  

?>


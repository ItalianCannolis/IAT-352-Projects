<?php

// ----------- TASK 1 ----------- //

// Import the db configuration file here and create a connection to the DB
// Make sure the connection is successfully established, otherwise stop processing the rest of the script.
require("data/db.php");
$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error()){
  echo mysqli_connect_error();
}
// ----------- END OF TASK 1 ----------- //
?>

<html lang="en">
  <head>
    <title>Databases</title>
    <style>
      td {
        padding-right: 20px;
      }

    </style>
  </head>

  <body>
    <h2>Task 2:</h2>
    <?php
      // ----------- TASK 2 ----------- //
      $sql = "SELECT customerName FROM customers where country ='USA'";
      $result = mysqli_query($conn, $sql);

      if (!$result){
        echo mysqli_error($conn);
        exit();
        
      }

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo $row["customerName"]. "<br>";
        }
      }
      
      // ----------- END OF TASK 2 ----------- //
    ?>

    <h2>Task 3:</h2>
    <?php

      // ----------- TASK 3 ----------- //

      // Insert the following data in the database (choose an appropriate table):
        // Customer Number = 247
        // Amount = 432.45
        // Payment Date = 2014-01-2
        // Check Number = abc-002
      // $sql = "INSERT INTO payments (customerNumber, checkNumber, paymentDate, amount ) values ( 247, 'abc-002', '2014-01-2', 432.45)";
      // $result = mysqli_query($conn, $sql);
      // if ($result){
      //   echo " inserted successfully!";
      // }
      // else{
      //   echo "insert fail.";
      // }



      // ----------- END OF TASK 3 ----------- //

  ?>

  <h2>Task 4</h2>
  <?php

      // ----------- TASK 4 ----------- //

      $sql = "select * from payments where checkNumber = ?";
      $checknumber = "abc-002";

      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, "s", $checknumber);

      mysqli_stmt_execute($statement);

      $result = mysqli_stmt_get_result($statement);

      while($row = mysqli_fetch_assoc($result)){
        echo $row["checkNumber"]. " ". $row["customerNumber"]. " ". $row["amount"]. "<br>";
      }


      $update_sql = "UPDATE payments SET amount = 19 WHERE checkNumber = 'abc-002' and customerName = '247'";
      mysqli_query($conn, $update_sql);

      if(mysqli_affected_rows($conn) >0){
        echo "updated successful";
      }

      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      while($row = mysqli_fetch_assoc($result)){
        echo $row["checkNumber"]. " ". $row["customerNumber"]. " ". $row["amount"];
      }

      // ----------- END OF TASK 4 ----------- //
    ?>

    <h2>Task 5:</h2>
    <?php
      // ----------- TASK 5 ----------- //

      // Remove the entries we added in step 3
      $sql = "delete from payments where checkNumber='abc-002' and customerNumber='247'";
      mysqli_query($conn, $sql);
      if(mysqli_affected_rows($conn)>0){
        echo "deleted successfully";
      }
      else{
        echo "delete fail.";
      }
      // ----------- END OF TASK 5 ----------- //


    ?>
  </body>
</html>






<?php
  // 5. Close database connection
?>

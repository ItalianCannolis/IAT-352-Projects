<?php include 'header.php'; 
  include 'query_functions.php';
?>
<!-- code reference from hands on lab 8 -->
<?php
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // TODO: check for existing user account, if there is none, encrypt the password and save the entry
  $db = db_connect();

  //check to see if there are inputs in first name, last name, email, password + password confirm
  if(isset($_POST['firstName']) && isset($_POST['lastName']) 
  && isset($_POST['email']) &&
  isset($_POST['password']) && isset($_POST['password_confirm'])){
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) 
    && !empty($_POST['email']) &&
    !empty($_POST['password']) && !empty($_POST['password_confirm'])){

      //password match
      if($_POST['password'] == $_POST['password_confirm']){
        //email should not be taken
        $sql ="select count(*) as count from users where email= ?"; //prepared statement to run query, NEVER USE CONCATENATION
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result){
          $row = mysqli_fetch_assoc($result);
          if($row['count'] > 0){
            echo "This email has already been used.";
          }
          else{
            $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = 'insert into users(firstName, lastName, email, encryptedPassword) 
            values (?,?,?,?)';
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", //data types all string so pass 4 's'
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $hash_pass);

            $result = mysqli_stmt_execute($stmt);
            if($result){ //for each 'if' there should be an 'else' that prints error
              $_SESSION['email'] = $_POST['email'];
              header("Location: showmodels.php");
            }
            
          }


        }
      }
    }
  }

  // END TODO
}
else{
  if(isset($_SESSION['email'])){
    header('Location: showmodels.php');
  }
}

?>

<?php $page_title = 'Register'; ?>

<link rel="stylesheet" type="text/css" href="css/styles.css">

<div >
  
  <h1>Register</h1>

  <?php echo display_errors($errors); ?>

  <form action="register.php" method="post">
    First Name:<br />
    <input type="text" name="firstName" value="" required /><br />
    Last Name:<br />
    <input type="text" name="lastName" value="" required /><br />
    Email:<br />
    <input type="text" name="email" value="" required /><br />
    Password:<br />
    <input type="password" name="password" value="" required /><br />
    Confirm Password:<br />
    <input type="password" name="password_confirm" value="" required /><br />
    <input type="submit" />
  </form>
</div>
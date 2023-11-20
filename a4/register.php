<?php include 'header.php'; ?>

<?php
$errors = [];


if(is_post_request()) {
  // TODO: check for existing user account, if there is none, encrypt the password and save the entry
  if(isset($_POST['first_name']) && isset($_POST['last_name']) 
  && isset($_POST['email']) && isset($_POST['username']) &&
  isset($_POST['password']) && isset($_POST['password_confirm'])){
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) 
    && !empty($_POST['email']) && !empty($_POST['username']) &&
    !empty($_POST['password']) && !empty($_POST['password_confirm'])){
      //password match
      if($_POST['password'] == $_POST['password_confirm']){
        //usernmae should not be taken
        $sql ="select count(*) as count from admins where username= ?"; //prepared statement to run query, NEVER USE CONCATENATION
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result){
          $row = mysqli_fetch_assoc($result);
          if($row['count'] > 0){
            echo "this username is taken";
          }
          else{
            $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = 'inset into admins(first_name, last_name, email, username, hashed_password) 
            values (?,?,?,?,?)';
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", //data types all string so pass 5 's'
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['username'],
            $hash_pass);

            $result = mysqli_stmt_execute($stmt);
            if($result){ //for each 'if' there should be an 'else' that prints error
              $_SESSION['username'] = $_POST['username'];
              header("Location: index.php");
            }
            
          }
        }
      }
    }
  }
  // Make sure password matches
  if (isset($_POST['password']) != ($_SESSION['password'])){
    
  }
  // After the entry is inserted successfully, redirect to dashboard page


  // END TODO
}
else{
  if(isset($_SESSION['username'])){
    header('Location: index.php');
  }
}

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Register</h1>

  <?php echo display_errors($errors); ?>

  <form action="register.php" method="post">
    First Name:<br />
    <input type="text" name="first_name" value="" required /><br />
    Last Name:<br />
    <input type="text" name="last_name" value="" required /><br />
    Email:<br />
    <input type="text" name="email" value="" required /><br />
    Username:<br />
    <input type="text" name="username" value="" required /><br />
    Password:<br />
    <input type="password" name="password" value="" required /><br />
    Confirm Password:<br />
    <input type="password" name="password_confirm" value="" required /><br />
    <input type="submit" />
  </form>
</div>
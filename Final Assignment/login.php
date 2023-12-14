<?php 
 //include 'header.php';
session_start();
dirname(__FILE__);
include(dirname(__FILE__).'\queryfunction.php');
// include(dirname(__FILE__).'\db.php');
include(dirname(__FILE__).'\header.php');

$errors = [];
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve data from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    
    if(!empty($username) && !empty($password)){
        $db = db_connect();
        
        // Retrieve encrypted password that matches username
        $query = "SELECT encryptedPassword FROM member WHERE username = ?";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($pass_hash);

        if ($stmt->fetch() && password_verify($password, $pass_hash)) {
            $_SESSION['username'] = $username; // Set session variable upon successful login
            $mem_id = find_id_by_username($_SESSION['username']);
            $_SESSION['mem_id'] = $mem_id; // Set session variable upon successful login
            header("Location: index.php"); // Redirect to index page after successful login
            exit();
        } else {
            $message = "Sorry, email and password combination is not correct.";
            echo $message; // Output login failure message
        }
    }
}

?>

<html>

    <h1>Login</h1>

    <form class = "form-container" method = "POST">
        <div class = "form-element-cont">
            <label> Username </label>
            <input type="textbox" name="username">
        </div>

        <div class = "form-element-cont">
            <label> Password </label>
            <input type="textbox" name="password">
        </div>

        <input type = "submit" value = "Login"> 
        <br>
        <!-- redirect non-members to the register page -->
        <a href="register.php"> Not registered yet. Register here. </a>
    </form>

</html>



<?php 
session_start();
dirname(__FILE__);
include(dirname(__FILE__).'\queryfunction.php');
include(dirname(__FILE__).'\header.php');

$errors = [];
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve form
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $db = db_connect();
        
        // Retrieve pw that matches username
        $query = "SELECT encryptedPassword FROM member WHERE username = ?";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($pass_hash);

        if ($stmt->fetch() && password_verify($password, $pass_hash)) {
            $_SESSION['username'] = $username;
             // successful login
            echo 'success'; 
            exit();
        } else {
            // send invalid response AJAX call
            echo 'invalid';
            exit();
        }
    }
}
?>

<html>
    <h1>Login</h1>

    <form id="loginForm" class="form-container" method="POST">
        <div class="form-element-cont">
            <label> Username </label>
            <input type="text" name="username">
        </div>
        <div class="form-element-cont">
            <label> Password </label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Login"> 
        <br>
        <span id="loginError"></span>
        <br>
        <a href="register.php"> Not registered yet. Register here. </a>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="loginScript.js"></script>
</html>


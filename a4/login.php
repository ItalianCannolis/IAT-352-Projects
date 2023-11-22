<?php 
include 'header.php';
include 'query_functions.php';

$errors = [];
$username = '';
$password = '';

if(isset($_SESSION['username'])){
    header("Location: showmodels.php");
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Retrieve data from form
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty($email) && !empty($password)){


        $db = new mysqli('localhost','root','','classicmodels');
 
        $query = "SELECT encryptedPassword FROM users WHERE email = ?";
        
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($pass_hash);

        if($stmt->fetch() && password_verify($password,$pass_hash)){
            $authenticated = $email;
            $message = "Congrats on login";
            echo $message;
        } 
        else{
            $message = "Sorry email and password combination is not correct";
            echo $message;
        }

        if ($authenticated){ 
            $_SESSION['email'] = $authenticated;
            //redirect to the callback if one set, otherwise go to homepage
            // $callback_url = ""
        }
    }
}

?>

<html>

    <h1>Login</h1>

    <form method = "POST">
        <label> Email </label>
        <input type="textbox" name="email">
        <label> Password </label>
        <input type="textbox" name="password">
        <input type = "submit" value = "Login"> 
        <br>
        <br>
        <!-- redirect non-members to the register page -->
        <a href="register.php"> Not registered yet. Register here. </a>
    </form>

</html>


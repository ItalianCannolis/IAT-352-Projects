<?php 
// include 'header.php';
dirname(__FILE__);
include(dirname(__FILE__).'\queryfunction.php');
include(dirname(__FILE__).'\db.php');
include(dirname(__FILE__).'\header.php');

$errors = [];
$username = '';
$password = '';

// if(isset($_SESSION['username'])){
//     header("Location: showmodels.php");
// }



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Retrieve data from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){


        $db = new mysqli('localhost','root','','musicbrainz');
        //retrieved encrypted password that mathes username
        $query = "SELECT encryptedPassword FROM member WHERE username = ?";
        
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($pass_hash);

        if($stmt->fetch() && password_verify($password,$pass_hash)){
            $authenticated = $username;
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

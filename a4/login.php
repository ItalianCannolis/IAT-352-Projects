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
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $db = new mysqli('localhost','root','','classicmodels');
        echo $pass_hash;

        $sql = "SELECT COUNT(*) FROM users WHERE email = '$email' AND encryptedPassword ='$pass_hash'";
        // not done am currently adding a new table in mysql to store the user information

        $stmt = $db ->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($count);

        if($stmt -> fetch() && $count > 0){
            $authenticated = $email;
        } 
        else{
            $message = "Sorry email and password combination is not correct";
        }
    }
}

?>

<html>

    <form method = "POST">
        <label> Email </label>
        <input type="textbox" name="email">
        <label> Password </label>
        <input type="textbox" name="password">
        <input type = "submit" value = "Login">
    </form>



</html>


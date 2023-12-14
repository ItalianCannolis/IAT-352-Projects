<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = db_connect();

    $user_id = $_SESSION['user_id']; 
    $album_id = $_POST['album_id'];
    $comment_text = $_POST['comment_text'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (user_id, album_id, comment_text) VALUES ('$user_id', '$album_id', '$comment_text')";
    // Execute the query
    // Example: mysqli_query($connection, $sql);

    // Redirect back to the album page after adding the comment
    header("Location: album.php?id=$album_id");
    exit();
}
?>

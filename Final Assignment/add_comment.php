<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userId = $_SESSION['user_id'];
    $albumId = $_POST['albumId'];
    $commentText = $_POST['commentText'];

    // Insert comment into the database
    $insert_comment_query = "INSERT INTO comments (user_id, album_id, comment_text) VALUES ($userId, $albumId, '$commentText')";
    mysqli_query($connection, $insert_comment_query);

    header("Location: album_details.php?id=$albumId"); // redirect to album details page
    exit();
}
?>

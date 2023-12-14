<?php
session_start(); // Start the session

// Check if the user is logged in or not, and redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or any other appropriate action
    header("Location: login.php"); // Change 'login.php' to your actual login page
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established ($connection)
    $userId = $_SESSION['user_id'];
    $albumId = $_POST['albumId'];
    $commentText = $_POST['commentText'];

    // Insert the comment into the database
    $insert_comment_query = "INSERT INTO comments (user_id, album_id, comment_text) VALUES ($userId, $albumId, '$commentText')";
    mysqli_query($connection, $insert_comment_query);

    // Redirect back to the album details page after adding the comment
    header("Location: album_details.php?id=$albumId"); // Change 'album_details.php' to your actual page
    exit();
}
?>

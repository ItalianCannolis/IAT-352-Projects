<?php

session_start(); // Start the session
include(dirname(__FILE__).'\queryfunction.php');
// Check if the user is logged in or not, and redirect if not logged in
if (!isset($_SESSION['mem_id'])) {
    // Redirect the user to the login page or any other appropriate action
    header("Location: login.php"); // Change 'login.php' to your actual login page



    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assuming you have a database connection established ($connection)
    $userId = $_SESSION['mem_id'];


    $albumId = $_POST['albumId'];
    $commentText = $_POST['commentText'];
    $conn = db_connect();


    // Insert the comment into the database
    $insert_comment_query = "INSERT INTO comments (mem_id, song_group, comment) VALUES ($userId, $albumId, '$commentText')";
    mysqli_query($conn, $insert_comment_query);

    // Redirect back to the album details page after adding the comment
    $album = find_album_by_id($albumId);
    $albumname = $album[0][0];
    header("Location: albumdetails.php?search_term=$albumname"); // Change 'album_details.php' to your actual page


    exit();
}
?>

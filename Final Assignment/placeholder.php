<?php
// necessary files and start session
include 'header.php';
include 'queryfunction.php';
session_start();

// a function to get song details
$song_id = $_GET['song_id']; // Get the song ID from the URL or any other source
$song_details = get_song_details($song_id);

//  comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id']) && isset($_POST['comment_text'])) {
        $user_id = $_SESSION['user_id'];
        $comment_text = $_POST['comment_text'];

        // adding the comment into the database
        $db = db_connect();
        $sql = 'INSERT INTO comments (song_id, user_id, comment_text) VALUES (?, ?, ?)';
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, 'iis', $song_id, $user_id, $comment_text);
        mysqli_stmt_execute($stmt);

        //  can redirect to the same page to prevent form resubmission
        header("Location: song_details.php?song_id=$song_id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Song Details</title>
    <link href="./css/styles.css" rel="stylesheet">
</head>

<body>
    <!--  song details -->
    <h1>Song Details</h1>
    <p>Title: <?php echo $song_details['title']; ?></p>
    <!-- other song details -->

    <!--  existing comments -->
    <h2>Comments</h2>
    <?php
    $comments = get_comments_for_song($song_id);
    foreach ($comments as $comment) {
        echo '<p>' . htmlspecialchars($comment['comment_text']) . ' - ' . $comment['username'] . '</p>';
    }
    ?>

    <!--  submission form -->
    <?php if (isset($_SESSION['user_id'])) : ?>
        <h3>Add a Comment</h3>
        <form action="song_details.php?song_id=<?php echo $song_id; ?>" method="post">
            <textarea name="comment_text" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit Comment">
        </form>
    <?php else : ?>
        <p>Login to leave a comment</p>
    <?php endif; ?>
</body>

</html>

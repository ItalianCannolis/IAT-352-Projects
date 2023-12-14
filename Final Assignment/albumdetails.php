<?php 
    include 'header.php';
    include 'queryfunction.php';
 

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$name = $_GET['product'] ?? '1'; // PHP > 7.0

$album = find_album_by_name($name); 

?>

<div >
  <div class="album show"> 
    <!-- display Model details of selected model -->

    <h1>Album Name: <?php echo htmlspecialchars($album[0]); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Artist</dt>
        <dd><?php echo htmlspecialchars($album[1]); ?></dd>
      </dl>
      <dl>
        <dt>Track Name</dt>
        <dd><?php echo htmlspecialchars($album[2]); ?></dd>
      </dl>
      <dl>
        <dt>Track Count</dt>
        <dd><?php echo htmlspecialchars($album[3]); ?></dd>
      </dl>
      <dl>
        <dt>Track Duration</dt>
        <dd><?php echo htmlspecialchars($album[4]); ?></dd>
      </dl>
     
      <!-- add a button to add to watch list -->
      <a class="redirect-button" href="addtowatchlist.php"> Add to Collage </a> 
      <!-- addtowatchlist is currently empty -->
    </div>

  </div>

</div>

<!-- Display album details -->
<h2>Album Details</h2>
<!-- Display album details here -->

<!-- Display comments -->
<h3>Comments</h3>

<?php
// Assuming $albumId contains the ID of the album
// Retrieve comments for the specific album from the database
$comments_query = "SELECT * FROM comments WHERE album_id = $albumId";
$comments_result = mysqli_query($connection, $comments_query);

// Display comments
while ($comment = mysqli_fetch_assoc($comments_result)) {
    echo "<p>{$comment['comment_text']}</p>";

}
?>

<!-- Add comment form -->
<h3>Add a Comment</h3>
<form method="post" action="add_comment.php"> 
    <tex

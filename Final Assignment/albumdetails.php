<?php 
    session_start();
    include 'header.php';
    include 'queryfunction.php';
 

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$name = $_GET['product'] ?? '1'; // PHP > 7.0

$album = find_album_by_name($_GET['search_term']); 

?>

<div >
  <div class="album show"> 
    <!-- display Model details of selected model -->

    <h1>Album Name: <?php echo htmlspecialchars($album[0][0]); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Artist</dt>
        <dd><?php echo htmlspecialchars($album[0][1]); ?></dd>
      </dl>
      <dl>
        <dt>Track Count</dt>
        <dd><?php echo htmlspecialchars($album[0][3]); ?></dd>
      </dl>
      <dl>
        <dt>Track Name</dt>
        <dd><?php echo htmlspecialchars($album[0][2]); ?></dd>
      </dl>

      <dl>
        <dt>Track Duration</dt>
        <dd><?php echo htmlspecialchars($album[0][4]); ?></dd>
      </dl>
     
      <!-- add a button to add to watch list -->
      <a class="redirect-button" href="addtowatchlist.php"> Add to Collage </a> 
      <!-- addtowatchlist is currently empty -->
    </div>

  </div>

</div>

<!-- Display comments -->
<h3>Comments</h3>

<?php
// $albumId contains the ID of the album
// comments for the specific album from the database
$conn = db_connect();
$albumId = $album[0][5];
$comments_query = "SELECT * FROM comments WHERE song_group = $albumId";
$comments_result = mysqli_query($conn, $comments_query);

// comments
while ($comment = mysqli_fetch_assoc($comments_result)) {
    echo "<p>{$comment['comment']}{$comment['comment']}"." "."{$comment['rating']}</p>";

}
?>

<!-- comment form -->
<h3>Add a Comment</h3>
<form method="post" action="add_comment.php"> 
    <textarea name="commentText" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit Comment">
    <!-- field to send the album ID -->
    <input type="hidden" name="albumId" value="<?php echo $albumId; ?>">
</form> 

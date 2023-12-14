<?php 
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

<!-- added co m ments here cause it  makes the  most sense-->
<h3>Comments:</h3>
<div class="comments-section">
    <!-- Display comments here -->
</div>

<!-- Comment Form -->
<?php
if (isset($_SESSION['user_id'])) { // check if the user is logged in
    // a comment form if the user is logged in
    ?>
    <h3>Add a Comment:</h3>
    <form method="POST" action="add_comment.php"> 
        <input type="hidden" name="album_id" value="<?php echo $album_id; ?>">
        <textarea name="comment_text" placeholder="Write your comment here"></textarea>
        <input type="submit" value="Post Comment">
    </form>
<?php
} else {
    //  display a message asking users to log in to comment
    echo '<p>Please <a href="login.php">log in</a> to comment on this album.</p>';
}
?>

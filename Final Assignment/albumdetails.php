<?php 
    session_start();
    include 'header.php';
    include 'queryfunction.php';
    include 'cover_art_functions.php';

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
        <dt>Track Name</dt>
        <dd><?php echo htmlspecialchars($album[0][3]); ?></dd>
      </dl>
      <dl>
        <dt>Track Count</dt>
        <dd><?php echo htmlspecialchars($album[0][2]); ?></dd>
      </dl>
      <dl>
        <dt>Track Duration</dt>
        <dd><?php echo htmlspecialchars($album[0][4]); ?></dd>
      </dl>

      <!-- add a button to add to watch list -->
      <?php
      if(isset($_SESSION['mem_id'])){
        $collageNames = find_collage_owner_by_mem_id($_SESSION['mem_id']);
        $urlcheck = parse_url($url, PHP_URL_PATH);
        $urlquery = parse_url($url, PHP_URL_QUERY);

        $urlcheck = str_split($urlcheck);
        $urlcheck = implode($urlcheck);

        $urlfull = $urlcheck."?".$urlquery;
        generate_dropdown_addition($collageNames, $urlfull);


        //$coverID = find_collage_id_by_name($_POST['collagename'])
        if(isset($_POST['collagename'])){
          add_to_collage_by_mem_id($_SESSION['mem_id'],$_POST['collagename'],$album[0][5]);
        }
      
      }
      ?>
     


      <!-- addtowatchlist is currently empty -->
    </div>

  </div>

</div>


<!-- Display comments -->
<h3>Comments</h3>

<?php
// Assuming $albumId contains the ID of the album
// Retrieve comments for the specific album from the database
$conn = db_connect();
$albumId = $album[0][5];
$comments_query = "SELECT * FROM comments WHERE song_group = $albumId";
$comments_result = mysqli_query($conn, $comments_query);

// Display comments
while ($comment = mysqli_fetch_assoc($comments_result)) {
  $username = find_member_data_by_mem_id($comment['mem_id']);
  echo "<p>{$username[0]}".":"."{$comment['comment']}"." "."{$comment['rating']}</p>";


}
?>

<!-- Add comment form -->
<h3>Add a Comment</h3>
<form method="post" action="add_comment.php"> 
    <textarea name="commentText" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit Comment">
    <!-- field to send the album ID -->
    <input type="hidden" name="albumId" value="<?php echo $albumId; ?>">
</form>

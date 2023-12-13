<?php 
    include 'header.php';
    include 'queryfunction.php';
 

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$name = $_GET['product'] ?? '1'; // PHP > 7.0

$album = find_album_by_name($name); 

?>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<div >
  <div class="model show"> 
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
      <a class="redirect-button" href="addtowatchlist.php"> Add to Watchlist </a> 
      <!-- addtowatchlist is currently empty -->
    </div>

  </div>

</div>
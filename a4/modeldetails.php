<?php 
    include 'header.php';
    include 'query_functions.php';
 

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$name = $_GET['product'] ?? '1'; // PHP > 7.0

$model = find_model_by_name($name); 

?>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<div >
  <div class="model show"> 
    <!-- display Model details of selected model -->

    <h1>Model: <?php echo htmlspecialchars($model['productName']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Product Code</dt>
        <dd><?php echo htmlspecialchars($model['productCode']); ?></dd>
      </dl>
      <dl>
        <dt>Product Line</dt>
        <dd><?php echo htmlspecialchars($model['productLine']); ?></dd>
      </dl>
      <dl>
        <dt>Vendor</dt>
        <dd><?php echo htmlspecialchars($model['productVendor']); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo htmlspecialchars($model['productDescription']); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo htmlspecialchars($model['buyPrice']); ?></dd>
      </dl>
     
      <!-- add a button to add to watch list -->
      <a class="redirect-button" href="addtowatchlist.php"> Add to Watchlist </a> 
      <!-- addtowatchlist is currently empty -->
    </div>

  </div>

</div>
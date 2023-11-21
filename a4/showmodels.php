
<?php 
    include 'header.php';
    include 'query_functions.php';

    $model_set = find_all_models();
    // <!-- code reference from hands on lab 8 -->
 ?>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
    <div>
    <div class="model listing">
        <h1>Models</h1>
        <!-- Present all Models within Database -->

        <!-- <div class="actions">
        <a class="action" href="?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
        </div> -->

        <table class="list">
            <tr>
                <th>Product Name</th>
                <th>&nbsp;</th>
            </tr>
            //
            <?php while($model = mysqli_fetch_assoc($model_set)) { ?>
                <tr>
                <td><?php echo htmlspecialchars($model['productName']); ?></td>
                <td><a href="modeldetails.php?product=<?php echo urlencode($model['productName']); ?>">View Details</a>
                </td>
                </tr>
            <?php } ?>
        </table>

        <?php
        mysqli_free_result($model_set);
        ?>
    </div>

    </div>


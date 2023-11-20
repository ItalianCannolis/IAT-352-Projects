<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

// TODO: This page should not show if a session is present.
// Redirect to staff index if a session is detected.


// END TODO
if(is_post_request()) {
  // TODO: Verify the password matches the record
  // if it does not, throw an error message
  // otherwise set the session and redirect to dashboard


  // END TODO
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" />
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

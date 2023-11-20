<?php
require_once('../../private/initialize.php');


// TODO: Remove the username session
unset($_SESSION['username']);
// End of TODO

redirect_to(url_for('/staff/login.php'));

?>

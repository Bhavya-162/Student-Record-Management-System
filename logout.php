<?php
// logout.php
session_start();

// Destroy all sessions
session_unset();
session_destroy();

// Redirect with a success message
header("Location: admin_login.php?message=logout");
exit();
?>

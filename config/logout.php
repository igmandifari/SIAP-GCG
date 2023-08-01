<!-- logout.php -->
<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();
session_unset();
// Redirect the user to the login page (you can adjust the URL as needed)
header("Location: ../index.php");
exit;
?>
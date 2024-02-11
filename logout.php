<?php
session_start(); // Start the session to manage user sessions

session_unset(); // Unset all session variables
session_destroy(); // Destroy the session data

header("Location: index.html"); // Redirect to the index page after logout
exit; // Stop further execution
?>
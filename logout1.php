<?php
error_reporting(E_ALL ^ E_NOTICE);
// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
session_destroy();

// Jump to login page
header('Location: index.php');
?>
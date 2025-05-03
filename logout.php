<?php
session_start();

// Check if the user is logged in and destroy the session
if (isset($_SESSION["user_id"])) {
    // Destroy session data and the session itself
    session_unset();
    session_destroy();
    
    // Optionally, you can display an alert here confirming logout
    echo "<script>alert('You have successfully logged out.');</script>";
}

// Redirect to the login page after logging out
header("Location: aland.php");
exit();
?>

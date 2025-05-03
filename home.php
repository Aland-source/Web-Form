<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // If not logged in, redirect to the login page
    header("Location: aland.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to My Page!</h1>
    <p>You're logged in as <?php echo $_SESSION["user_email"]; ?>.</p>
    <a href="logout.php">Logout</a>  <!-- Link to logout -->
</body>
</html>


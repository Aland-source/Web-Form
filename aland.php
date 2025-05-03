<?php
session_start();
include("db.php");

if (isset($_POST["login1"])) {
    // Sanitize and escape inputs
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["ppassword"];

    // Check if email exists
    $query = "SELECT * FROM datatb1 WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Check if the password matches
        if ($password === $user["Password"]) {
            // Successful login, set session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["Email"];
            // Redirect to the home page
            header("Location: home.php");
            exit(); // Make sure to stop further execution
        } else {
            echo "<script>alert('❌ Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Login Page</title>
</head>
<body>

    <div class="box1">
        <h1 class="H11">Login Here!</h1>
        <img src="Images/pic1.png" alt="" class="img1">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="Form1">
            <input type="text" name="email" placeholder="Email" class="T7"> <br> <br>
            <input type="password" name="ppassword" placeholder="Password" class="T8"> <br> <br>
            <input type="submit" name="login1" value="Login" class="B2">
            <p class="Signup">Don't have an account? <a class="signup1" href="Rigster.php" target="_blank">Sign Up</a></p>
        </form>
    
    </div>

</body>
</html>


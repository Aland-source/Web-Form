<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box1">
        <h1 class="H11">Register Here!</h1>
        <img src="Images/pic1.png" alt="" class="img1">

        <form action="" class="Form1" method="POST">
            <input type="text" name="name" placeholder="Name" class="T3" required>
            <input type="text" name="username" placeholder="Username" class="T1" required><br><br>
            <input type="email" name="email" placeholder="Email" class="T4" required>
            <input type="password" name="password" placeholder="Password" class="T2" required>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="T6" required>
            <input type="submit" name="submit1" value="Register" class="B1">
            <p class="Signup">Do you have an account? <a class="signup1" href="aland.php" target="_blank">Log in</a></p>
        </form>
    </div>
</body>
</html>

<?php
include("db.php");

if (isset($_POST["submit1"])) {
    // Sanitize and escape inputs
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Check if passwords match
    if ($password !== $confirmpassword) {
        echo "<script>alert('❌ Passwords do not match.');</script>";
        exit();
    }

    // Check if email already exists
    $check_query = "SELECT Email FROM datatb1 WHERE Email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('❌ This email is already used. Try another one.');</script>";
    } else {
        // Insert user into database without password hashing
        $insert_query = "INSERT INTO datatb1 (Namee, Username, Email, Password)
                         VALUES ('$name', '$username', '$email', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            // Redirect to login page after successful registration
            header("Location: aland.php");
            exit(); // Make sure to stop further execution
        } else {
            echo "<script>alert('❌ Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

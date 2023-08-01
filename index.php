<?php
session_start();

// Handle the form submission and verify the username and password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform user authentication (replace this with your own authentication logic)
    $authenticated = performAuthentication($username, $password);

    if ($authenticated) {
        // Set the user role in the session
        $_SESSION["role"] = getUserRole($username); // Replace with your function to get the user's role from the database

        // Redirect to the appropriate dashboard based on the user's role
        if ($_SESSION["role"] == "admin") {
            header("Location: view/admin_dashboard.php");
            exit;
        } else {
            header("Location: view/user_dashboard.php");
            exit;
        }
    } else {
        // Handle failed login (e.g., show an error message)
    }
}
?>
<!-- Your login form goes here -->


<!-- login.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="config/login_proses.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <p>Buat Akun? <a href="view/register.php">Daftar Disini</a>.</p>
    </div>
</body>

</html>
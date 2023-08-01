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
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
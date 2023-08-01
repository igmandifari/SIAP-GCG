<!-- user_dashboard.php -->
<?php
session_start();

// Check if the user is logged in as a user
if (isset($_SESSION["role"]) && $_SESSION["role"] == "user") {
    $username = $_SESSION["username"];
    $nama_user = $_SESSION["nama_user"];
    $departemen = $_SESSION["departemen"];
    $foto = $_SESSION["foto"];
    $ket = $_SESSION["ket"];
    $role = $_SESSION["role"];
} else {
    // If the user is not logged in as a user, redirect to the login page
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo $username; ?> as User</h2>
    <p>Nama: <?php echo $nama_user; ?></p>
    <p>Ket: <?php echo $ket; ?></p>
    <img src="<?php echo $_SESSION["foto"]; ?>" width="150">
    <br>
    <p>Department: <?php echo $departemen; ?></p>
    <a href="../config/logout.php">Logout</a>
</body>

</html>
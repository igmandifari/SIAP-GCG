<?php
session_start();

// Check if the user is logged in as an admin
if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
    $username = $_SESSION["username"];
    $nama_user = $_SESSION["nama_user"];
    $departemen = $_SESSION["departemen"];
    $foto = $_SESSION["foto"];
    $ket = $_SESSION["ket"];
    $role = $_SESSION["role"];
} else {
    // If the user is not logged in as an admin, redirect to the login page
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo $username; ?> as Admin</h2>
    <p>Nama: <?php echo $nama_user; ?></p>
    <p>Ket: <?php echo $ket; ?></p>
    <p> <?php echo $foto; ?></p>
    <p>Department: <?php echo $departemen; ?></p>
    <a href="../config/logout.php">Logout</a>
</body>

</html>
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak.php</title>
</head>

<body>
    <p>Hubungi Kami</p>
    <img src="<?php echo $foto; ?>" alt="foto">
</body>

</html>
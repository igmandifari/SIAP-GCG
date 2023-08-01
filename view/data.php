<?php
session_start();

// Check if the user is logged in as an admin
if (isset($_SESSION["role"]) && $_SESSION["role"] == "user") {
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
$userRole = $_SESSION["role"];
function getDashboardURL($userRole)
{
    if ($userRole === "user") {
        return "user_dashboard.php";
    } else if ($userRole === "admin") {
        return "admin_dashboard.php";
    } else {
        // Default to a generic dashboard if the role is neither "admin" nor "user"
        return "../index.php";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
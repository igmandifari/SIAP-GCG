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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'nav.php'; ?>

    <!-- MAIN -->
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Data</a></li>
            <li class="divider">/</li>
        </ul>
        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Status FUK & MP</h3>
                    <div>
                        <li>
                            <p>Keterangan: </p>
                        </li>
                        <div class="status-box">
                            <div class="status-box-item" style="background-color: green;">
                            </div>
                            <div class="status-text">Siap</div>
                            <div class="status-box-item" style="background-color: yellow;">
                            </div>
                            <div class="status-text">Diproses</div>
                            <div class="status-box-item" style="background-color: blue;">
                            </div>
                            <div class="status-text">Diterima</div>
                            <div class="status-box-item" style="background-color: red;">
                            </div>
                            <div class="status-text">Ditolak</div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- NAVBAR -->
    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>
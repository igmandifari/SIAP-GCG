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
$userRole = $_SESSION["role"];
function getDashboardURL($userRole)
{
    if ($userRole === "admin") {
        return "admin_dashboard.php";
    } else if ($userRole === "user") {
        return "user_dashboard.php";
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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- ======= Styles ====== -->
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'nav.php'; ?>

    <!-- MAIN -->
    <main>
        <h1 class="title">Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Dashboard</a></li>
        </ul>
        <div class="info-data">
            <div class="card">
                <div class="head">
                    <div>
                        <img src="<?php echo $foto; ?>" alt="foto">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="head">
                    <div>
                        <h2>Selamat Datang, </h2>
                        <p><?php echo $departemen; ?></p>
                        <h3><?php echo $nama_user; ?></h3>
                        <p><?php echo $ket; ?></p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="head">
                    <div>
                        <h2>465</h2>
                        <p>Notifikasi</p>
                    </div>
                    <i class='bx bx-bell icon'></i>
                </div>
                <span class="progress" data-value="30%"></span>
                <span class="label">30%</span>
            </div>
        </div>
        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Status FUK & MP</h3>
                    <div class="menu">
                        <i class='bx bx-dots-horizontal-rounded icon'></i>
                        <ul class="menu-link">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>

                    </div>
                </div>
                <div class="chart">
                    <div id="chart"></div>
                </div>
            </div>
            <div class="content-data">
                <div class="head">
                    <h3>Histori Data</h3>
                    <div class="menu">
                        <i class='bx bx-dots-horizontal-rounded icon'></i>
                        <ul class="menu-link">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chat-box">
                    <p class="day"><span>Today</span></p>
                    <div class="msg">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                        <div class="chat">
                            <div class="profile">
                                <span class="username">Admin</span>
                                <span class="datetime">02/08/2023 18:30</span>
                            </div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis tempora nisi perferendis, suscipit numquam temporibus beatae non, repudiandae ullam placeat porro excepturi animi, quia dicta. Ullam quaerat fugiat reprehenderit unde.</p>

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
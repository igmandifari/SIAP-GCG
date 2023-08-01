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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
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

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <div class="iconBx">
                    <img src="<?php echo $foto; ?>" alt="foto">
                </div>
            </div>

            <div class="card">
                <div>
                    <p>Selamat Datang, </p>
                    <p><b>Department <?php echo $departemen; ?>, </b></p>

                    <p><?php echo $nama_user; ?></p>
                    <p><?php echo $ket; ?></p>
                </div>
            </div>

            <div class="card">
                <div>
                    <p>Anda Memiliki,</p>
                    <div class="numbers">80</div>
                    <div class="cardName">Notifikasi</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="notifications"></ion-icon>
                </div>
            </div>
            <a href="../config/logout.php" class="btn btn-success">Logout</a>
        </div>
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <p><b>Tahun Pelaksanaan Asesmen</b></p>
            </div>
        </div>
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <p><b>Status FUK TKP & MP</b></p>
            </div>
            <div class="card">
                <p><b>Histori Data</b></p>
            </div>
        </div>
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
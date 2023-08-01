<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Welcome, Admin <?php echo $_SESSION["name"]; ?></h2>
    <img src="<?php echo $_SESSION["profile_picture"]; ?>" alt="Profile Picture">
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>
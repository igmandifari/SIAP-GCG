<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>

<body>
    <h2>Welcome, User <?php echo $_SESSION["name"]; ?></h2>
    <img src="<?php echo $_SESSION["foto"]; ?>" alt="Profile Picture">
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>
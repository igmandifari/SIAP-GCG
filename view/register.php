<!-- register.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="../config/register_proses.php" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="name">Name:</label>
            <input type="text" name="nama_user" required>
            <label for="foto">Profile Picture:</label>
            <input type="file" name="foto" accept="image/*" required>
            <label for="departemen">Departemen:</label>
            <input type="text" name="departemen" required>
            <label for="ket">Ket:</label>
            <input type="text" name="ket" required>
            <label for="role">Role:</label>
            <select name="role">
                <option value="user">User</option>
            </select>
            <input type="submit" value="Register">
        </form>
        <p>Sudah punya Akun? <a href="../index.php">Login Disini</a>.</p>
    </div>
</body>

</html>
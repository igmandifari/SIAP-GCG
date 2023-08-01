<!-- register.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="config/register_proses.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="foto">Profile Picture:</label>
        <input type="text" name="foto" value="default_profile.jpg">
        <br>
        <label for="departemen">Departemen:</label>
        <input type="text" name="departemen" required>
        <br>
        <label for="ket">Ket:</label>
        <input type="text" name="ket" required>
        <br>
        <label for="role">Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <br>
        <input type="submit" value="Register">
    </form>
</body>

</html>
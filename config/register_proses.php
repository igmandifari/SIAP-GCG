<!-- register_process.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $departemen = $_POST["departemen"];
    $role = $_POST["role"];
    $ket = $_POST["ket"];
    $foto = $_POST["foto"];

    // Connect to the database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "siap-gcg");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate the new user ID based on the role and last user ID for the role
    $stmt = $conn->prepare("SELECT MAX(id) AS last_user_id FROM users WHERE role = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $last_user_id = $result->fetch_assoc()["last_user_id"];
    $new_user_id = $role . str_pad(($last_user_id + 1), 3, '0', STR_PAD_LEFT);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO tbl_asesor (username, password, nama_user, departemen, ket,  foto, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $hashed_password, $nama_user, $departemen, $ket, $foto, $role);

    if ($stmt->execute()) {
        echo "Registration successful. You can now login.";
    } else {
        echo "Error during registration. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
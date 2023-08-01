// login_process.php
<?php
session_start();

include_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "siap-gcg");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM tbl_asesor WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User exists, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // Password is correct, set session variables and redirect to the appropriate dashboard page
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["nama_user"] = $user["nama_user"];
            $_SESSION["departemen"] = $user["departemen"];
            $_SESSION["foto"] = $user["foto"];
            $_SESSION["ket"] = $user["ket"];
            $_SESSION["role"] = $user["role"];

            // Determine user role and redirect accordingly
            if ($user["role"] == "admin") {
                header("Location: ../view/admin_dashboard.php");
            } else {
                header("Location: ../view/user_dashboard.php");
            }
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // User does not exist
        header("Location: ../index.php?error=user_not_found");
    }

    $stmt->close();
    $conn->close();
}
?>
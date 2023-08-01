<!-- register_process.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    // Check if the username already exists in the database
    $stmt_check_username = $conn->prepare("SELECT id FROM tbl_asesor WHERE username = ?");
    $stmt_check_username->bind_param("s", $username);

    if (!$stmt_check_username->execute()) {
        die("Error executing SELECT query: " . $stmt_check_username->error);
    }

    // Validate and handle the profile picture upload
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        // Define the target directory to store uploaded profile pictures
        $targetDir = "../assets/img/"; // Replace with the actual path to the upload folder

        // Generate a unique filename for the uploaded profile picture
        $uniqueFilename = uniqid() . "_" . basename($_FILES["foto"]["name"]);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetDir . $uniqueFilename)) {
            // Set the filename to be saved in the database
            $foto = $targetDir . $uniqueFilename;
        } else {
            die("Error uploading profile picture.");
        }
    }

    $result = $stmt_check_username->get_result();
    if ($result->num_rows > 0) {
        // Username already exists. Show an error message and redirect back to the registration page.
        echo "Error: Username already exists. Please choose a different username.";
        $stmt_check_username->close();
        $conn->close();
        header("refresh:3;url=../index.php");
        exit;
    }

    // Close the statement after checking the username
    $stmt_check_username->close();


    // Generate the new user ID based on the role and last user ID for the role
    $stmt_select = $conn->prepare("SELECT MAX(id) AS last_user_id FROM tbl_asesor WHERE role = ?");
    $stmt_select->bind_param("s", $role);

    if (!$stmt_select->execute()) {
        die("Error executing SELECT query: " . $stmt_select->error);
    }

    $result = $stmt_select->get_result();
    $last_user_id = $result->fetch_assoc()["last_user_id"];
    $new_user_id = $role . str_pad(($last_user_id + 1), 3, '0', STR_PAD_LEFT);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt_insert = $conn->prepare("INSERT INTO tbl_asesor (id, nama_user, username, password, departemen, role, ket, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt_insert) {
        die("Error in INSERT query: " . $conn->error);
    }

    $stmt_insert->bind_param("ssssssss", $new_user_id, $nama_user, $username, $hashed_password, $departemen, $role, $ket, $foto);

    if ($stmt_insert->execute()) {
        echo "Registration successful. You can now login.";
        header("refresh:3;url=../index.php");
        exit;
    } else {
        echo "Error during registration. Please try again. " . $stmt_insert->error;
    }

    $stmt_select->close();
    $stmt_insert->close();
    $conn->close();
}
?>
<!-- register_process.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_evidence = $_POST["nama_evidence"];
    $username = $_POST["username"];

    // Connect to the database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "siap-gcg");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and handle the profile picture upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        // Define the target directory to store uploaded profile pictures
        $targetDir = "../assets/files/tim/"; // Replace with the actual path to the upload folder

        // Generate a unique filename for the uploaded profile picture
        $uniqueFilename = uniqid() . "_" . basename($_FILES["file"]["name"]);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $uniqueFilename)) {
            // Set the filename to be saved in the database
            $file = $targetDir . $uniqueFilename;
        } else {
            die("Error uploading profile picture.");
        }
    }

    // Generate the new user ID based on the role and last user ID for the role
    $stmt_select = $conn->prepare("SELECT MAX(id) AS last_user_id FROM tbl_evidence WHERE role = ?");
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
    $stmt_insert = $conn->prepare("INSERT INTO tbl_evidence (id, nama_evidence, username) VALUES (?, ?, ?)");

    if (!$stmt_insert) {
        die("Error in INSERT query: " . $conn->error);
    }

    $stmt_insert->bind_param("ssssssss", $new_user_id, $nama_evidence, $username);

    if ($stmt_insert->execute()) {
        echo "Upload successful.";
        header("refresh:3;url=../view/index.php");
        exit;
    } else {
        echo "Error during Upload. Please try again. " . $stmt_insert->error;
    }

    $stmt_select->close();
    $stmt_insert->close();
    $conn->close();
}
?>
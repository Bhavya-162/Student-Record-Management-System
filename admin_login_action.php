<?php
// admin_login_action.php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch admin details
    $sql = "SELECT * FROM admins WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // If passwords are hashed
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row['username'];
            header("Location: admin_dashboard.php");
            exit();
        } 
        // If passwords are plain text (not secure)
        elseif ($password === $row['password']) {
            $_SESSION['admin'] = $row['username'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No admin found with this Username!";
    }
}
$conn->close();
?>

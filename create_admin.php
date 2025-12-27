<?php
include("db.php");

// Admin credentials
$username = "admin";        // choose your admin username
$password = "srms2025";     // choose your admin password

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into admins table
$sql = "INSERT INTO admins (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin account created successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

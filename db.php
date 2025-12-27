<?php
$servername = "localhost";
$username   = "root";       // XAMPP default
$password   = "";           // XAMPP default is empty
$dbname     = "student_record";  // ✅ your DB name
$port       = 3307;         // ✅ custom MySQL port

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

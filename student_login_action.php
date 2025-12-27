<?php
// student_login_action.php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST['roll_no'];
    $password = $_POST['password'];

    // Fetch student details
    $sql = "SELECT * FROM students WHERE roll_no = '$roll_no' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // If passwords are hashed
        if (password_verify($password, $row['password'])) {
            $_SESSION['student'] = $row['roll_no'];
            header("Location: student_dashboard.php");
            exit();
        } 
        // If passwords are stored in plain text (not secure)
        elseif ($password === $row['password']) {
            $_SESSION['student'] = $row['roll_no'];
            header("Location: student_dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No student found with this Roll Number!";
    }
}
$conn->close();
?>

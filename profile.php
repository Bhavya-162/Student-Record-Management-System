<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: student_login.php");
    exit();
}
include("db.php");

$roll_no = $_SESSION['student'];

// Fetch student details
$sql = "SELECT * FROM students WHERE roll_no='$roll_no' LIMIT 1";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 500px;
      text-align: center;
    }
    h2 {
      color: #333;
      margin-bottom: 20px;
    }
    .profile-detail {
      text-align: left;
      margin: 12px 0;
      padding: 10px;
      background: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(206, 38, 248, 0.3);
    }
    .profile-detail strong {
      color: #e326fc;
    }
    .back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      color: #fff;
      padding: 10px 15px;
      border-radius: 8px;
      font-weight: bold;
    }
    .back-link:hover {
      background: linear-gradient(135deg, #1fadffff, #e326fcff);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>👤 My Profile</h2>
    <?php if ($student) { ?>
      <div class="profile-detail"><strong>Roll No:</strong> <?php echo $student['roll_no']; ?></div>
      <div class="profile-detail"><strong>Name:</strong> <?php echo $student['name']; ?></div>
      <div class="profile-detail"><strong>Email:</strong> <?php echo $student['email']; ?></div>
      <div class="profile-detail"><strong>Phone:</strong> <?php echo $student['phone']; ?></div>
      <div class="profile-detail"><strong>Course:</strong> <?php echo $student['course']; ?></div>
      <div class="profile-detail"><strong>Password:</strong> <?php echo $student['password']; ?></div>
    <?php } else { ?>
      <p style="color:red;">❌ Student not found.</p>
    <?php } ?>
    <a class="back-link" href="student_dashboard.php">⬅ Back to Dashboard</a>
  </div>
</body>
</html>

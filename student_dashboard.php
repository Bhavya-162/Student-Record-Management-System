<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: student_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .dashboard-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      background: #fff;
      padding: 50px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 700px;
      text-align: center;
    }
    .welcome {
      grid-column: span 2;
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #333;
    }
    .card {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 12px;
      width: 250px;
      box-shadow: 0 4px 8px rgba(206, 38, 248, 1);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card a {
      display: block;
      text-decoration: none;
      color: #fff;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      margin-top: 10px;
      transition: 0.3s;
    }
    .card a:hover {
      background: linear-gradient(135deg, #1fadffff, #e326fcff);
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <div class="welcome">Welcome <?php echo $_SESSION['student']; ?> 🎓</div>

    <div class="card">
      <h3>📋 My Profile</h3>
      <a href="profile.php">Go</a>
    </div>

    <div class="card">
      <h3>📢 View Announcements</h3>
      <a href="view_announcements.php">Go</a>
    </div>

    <div class="card" style="grid-column: span 2; margin: auto;">
      <h3>🚪 Logout</h3>
      <a href="student_logout.php">Go</a>
    </div>
  </div>
</body>
</html>

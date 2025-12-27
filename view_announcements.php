<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: student_login.php");
    exit();
}
include("db.php");

// Fetch announcements
$sql = "SELECT * FROM announcements ORDER BY id DESC"; 
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Announcements</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px;
      margin: 0;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 700px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .announcement {
      background: #f9f9f9;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 3px 6px rgba(206, 38, 248, 0.3);
    }
    .announcement h3 {
      margin: 0 0 10px;
      color: #e326fc;
    }
    .announcement p {
      margin: 0;
      font-size: 15px;
      color: #333;
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
    <h2>📢 Announcements</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='announcement'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p style='text-align:center; color:red;'>❌ No announcements available.</p>";
    }
    ?>
    <a class="back-link" href="student_dashboard.php">⬅ Back to Dashboard</a>
  </div>
</body>
</html>

<?php
// manage_announcements.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include("db.php");

// Message feedback
$message = "";

// Add announcement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_announcement'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO announcements (title, message) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color:green;'>✅ Announcement added successfully!</p>";
    } else {
        $message = "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
}

// Delete announcement
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM announcements WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color:green;'>🗑️ Announcement deleted!</p>";
    } else {
        $message = "<p style='color:red;'>❌ Error deleting: " . $conn->error . "</p>";
    }
}

// Fetch all announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Announcements</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 900px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    form {
      margin-bottom: 30px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }
    button:hover {
      background: linear-gradient(135deg, #1fadffff, #e326fcff);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background: #f2f2f2;
    }
    .delete-btn {
      background: red;
      color: #fff;
      padding: 6px 12px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
    }
    .delete-btn:hover {
      background: darkred;
    }
    .back-link {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📢 Manage Announcements</h2>
    <?php echo $message; ?>
    <form method="POST" action="">
      <input type="text" name="title" placeholder="Announcement Title" required>
      <textarea name="content" placeholder="Enter announcement content..." rows="4" required></textarea>
      <button type="submit" name="add_announcement">Add Announcement</button>
    </form>

    <h3>📋 All Announcements</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['message']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a class="delete-btn" href="manage_announcements.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this?');">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>

    <a class="back-link" href="admin_dashboard.php">⬅ Back to Dashboard</a>
  </div>
</body>
</html>

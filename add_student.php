<?php
// add_student.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $password = $_POST['password']; // plain text

    $stmt = $conn->prepare("INSERT INTO students (roll_no, name, email, phone, course, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $roll_no, $name, $email, $phone, $course, $password);

    if ($stmt->execute()) {
        $message = "<p style='color:green;'>✅ Student added successfully!</p>";
    } else {
        $message = "<p style='color:red;'>❌ Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link rel="stylesheet" href="css/style.css">
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
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #333;
    }
    input, select {
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
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 10px;
      width: 100%;
    }
    button:hover {
      background: linear-gradient(135deg, #1fadffff, #e326fcff);
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
  <div class="form-container">
    <h2>➕ Add Student</h2>
    <?php echo $message; ?>
    <form method="POST" action="">
      <input type="text" name="roll_no" placeholder="Roll Number" required>
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <select name="course" required>
        <option value="">-- Select Course --</option>
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="BCOM">BCOM</option>
      </select>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Add Student</button>
    </form>
    <a class="back-link" href="admin_dashboard.php">⬅ Back to Dashboard</a>
  </div>
</body>
</html>

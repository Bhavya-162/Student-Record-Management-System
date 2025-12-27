<?php
// admin_login.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      text-align: center;
      width: 350px;
    }
    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .btn {
      display: block;
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      background: linear-gradient(135deg, #e326fcff, #1fadffff);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn:hover {
       background: linear-gradient(135deg, #1fadffff , #e326fcff);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Admin Login</h1>
    <form method="POST" action="admin_login_action.php">
      <input type="text" name="username" placeholder="Enter Username" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit" class="btn">Login</button>
    </form>
    <a href="index.php" class="btn" style="margin-top:20px;">Back</a>
  </div>
cc
</body>
</html>



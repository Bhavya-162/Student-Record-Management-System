<?php 
// admin_dashboard.php 
session_start(); 
if (!isset($_SESSION['admin'])) { 
    header("Location: admin_login.php"); 
    exit(); 
} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Admin Dashboard</title> 
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
    .dashboard-container {
         display: grid; 
         grid-template-columns: repeat(2, 1fr); 
         gap: 20px; 
         background: #fff; 
         padding: 60px; 
         border-radius: 15px; 
         box-shadow: 0 0 15px rgba(0,0,0,0.2); 
         width: 850px; 
         text-align: center; 
    } 
    .card {
         background: #f9f9f9; 
         padding: 25px; 
         border-radius: 12px; 
         width: 300px; 
         box-shadow: 0 4px 8px rgba(206, 38, 248, 1); 
         transition: transform 0.2s; 
         margin: auto;
    } 
    .card:hover { 
        transform: scale(1.05); 
    } 
    .card a {
         display: block; 
         text-decoration: none; 
         color: #fff; 
         background: linear-gradient(135deg, #e326fcff, #1fadffff); 
         padding: 12px; 
         border-radius: 8px; 
         font-weight: bold; 
         margin-top: 10px; 
         transition: 0.3s; 
    } 
    .card a:hover { 
        background: linear-gradient(135deg, #1fadffff, #e326fcff); 
    } 
    .welcome { 
        grid-column: span 2; 
        font-size: 20px; 
        margin-bottom: 15px; 
        color: #333; 
        font-weight: bold; 
    } 
    /* Special styling for logout card */
    .logout-card {
        grid-column: span 2; /* span across both columns */
        justify-self: center; /* center horizontally */
    }
    </style> 
</head> 
<body> 
    <div class="dashboard-container"> 
        <div class="welcome">Welcome <?php echo $_SESSION['admin']; ?> 👋</div> 

        <div class="card"> 
            <h3>➕ Add Student</h3> 
            <a href="add_student.php">Go</a> 
        </div> 

        <div class="card"> 
            <h3>📋 View Students</h3> 
            <a href="view_students.php">Go</a> 
        </div> 

        <div class="card"> 
            <h3>⚙️ Manage Students</h3> 
            <a href="manage_students.php">Go</a> 
        </div> 

        <div class="card"> 
            <h3>📢 Manage Announcements</h3> 
            <a href="manage_announcements.php">Go</a> 
        </div> 

        <div class="card logout-card"> 
            <h3>🚪 Logout</h3> 
            <a href="logout.php">Go</a> 
        </div>
    </div> 
</body> 
</html>

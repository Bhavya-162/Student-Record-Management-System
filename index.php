<?php 
// index.php 
?> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Student Record Management System</title> 
        <link rel="stylesheet" href="css/style.css"> 
        <style>
            body 
            { 
                font-family: Arial, sans-serif; 
                margin: 0; 
                padding: 0; 
                background: linear-gradient(135deg, #e326fcff, #1fadffff); 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                height: 100vh; 
            }
            .container 
            {
                 background: white; 
                 padding: 60px; 
                 border-radius: 15px; 
                 box-shadow: 0 0 15px rgba(0,0,0,0.2); 
                 text-align: center; 
                 width: 300px; 
            }
            h1 
            { 
                font-size: 27px; 
                margin-bottom: 20px; 
                color: #333; 
            }
            .btn 
            { 
                display: block; 
                margin: 13px 0; 
                padding: 15px; 
                background: linear-gradient(135deg, #e326fcff, #1fadffff); 
                color: white; 
                text-decoration: none; 
                border-radius: 8px;
                font-weight: bold; 
                transition: 0.3s; 
            }
            .btn:hover 
            { 
                background: linear-gradient(135deg, #1fadffff , #e326fcff); 
            }
        </style> 
    </head> 
<body> 
    <div class="container"> 
    <h1>Welcome !!!</h1> 
    <a href="admin_login.php" class="btn">Admin Login</a> 
    <a href="student_login.php" class="btn">Student Login</a> 
    </div> 
</body> 
</html>
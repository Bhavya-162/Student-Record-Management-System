<?php
session_start();
include("db.php");

// ✅ Only admin can access
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e326fcff, #1fadffff);
            color: white;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            color: black;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background: #e326fcff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #e326fcff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>All Student Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['roll_no']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['course']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No students found</td></tr>";
        }
        ?>
    </table>

    <a href="admin_dashboard.php">⬅ Back to Dashboard</a>
</body>
</html>

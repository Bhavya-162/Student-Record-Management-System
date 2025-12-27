<?php
include("db.php");

// Handle Delete request
if (isset($_GET['delete'])) {
    $roll_no = $_GET['delete'];
    $sql = "DELETE FROM students WHERE roll_no='$roll_no'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to same page to refresh list
        header("Location: manage_students.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        h2 { text-align: center; margin-top: 20px; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #1fadff; color: white; }
        a.btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; }
        .edit { background: #ffc107; color: black; }
        .delete { background: #dc3545; color: white; }
        .add { background: #28a745; color: white; margin: 20px auto; display: block; width: 200px; text-align: center; }
    </style>
</head>
<body>

<h2>Manage Students</h2>
<a href="add_student.php" class="btn add">+ Add New Student</a>

<table>
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Course</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['roll_no']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['password']."</td>
                    <td>
                        <a href='edit_student.php?roll_no=".$row['roll_no']."' class='btn edit'>Edit</a>
                        <a href='manage_students.php?delete=".$row['roll_no']."' class='btn delete'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No students found</td></tr>";
    }
    ?>
</table>

</body>
</html>

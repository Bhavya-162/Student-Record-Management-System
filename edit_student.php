<?php
include("db.php");

if (isset($_GET['roll_no'])) {
    $roll_no = $_GET['roll_no'];

    // Fetch existing data using roll_no
    $sql = "SELECT * FROM students WHERE roll_no='$roll_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found!";
        exit;
    }
}

// Update student profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no_new = $_POST['roll_no'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students 
            SET roll_no='$roll_no_new', name='$name', course='$course', email='$email', phone='$phone' 
            WHERE roll_no='$roll_no'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to manage_students.php after update
        header("Location: manage_students.php?msg=success");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e326fcff, #1fadffff);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
            color: #444;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }
        input:focus {
            border-color: #1fadff;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #e326fcff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #c91adb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Student Profile</h2>
        <form method="POST">
            <label>Roll No:</label>
            <input type="text" name="roll_no" value="<?php echo $student['roll_no']; ?>" required>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $student['name']; ?>" required>

            <label>Course:</label>
            <input type="text" name="course" value="<?php echo $student['course']; ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $student['email']; ?>" required>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required>

            <button type="submit">Update Student</button>
        </form>
    </div>
</body>
</html>

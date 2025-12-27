<?php
// insert_students.php

include("db.php"); // make sure this connects to your DB

$sql = "INSERT INTO students (roll_no, name, email, phone, course, password) VALUES
('23082100500111048','Alex Robin','yyyy@gmail.com','9876543210','BCA','bca3b1048'),
('23082100500111049', 'Antony Alwin', 'rahul@example.com', '9876543210', 'BCA', 'bca3b1049'),
('23082100500111050', 'Antony Jeya Edwin', 'neha@example.com', '9876501234', 'BCA', 'bca3b1050'),
('23082100500111051', 'Antro Nithisdon Gowtham', 'amit@example.com', '9876512345', 'BCA', 'bca3b1051'),
('23082100500111052', 'Aravinth', 'priya@example.com', '9876523456', 'BCA', 'bca3b1052'),
('23082100500112054', 'Bhavya', 'bhavyapattusuresh68@gmail.com', '6380265175', 'BCA', 'bca3b2054'),
('23082100500111055', 'Dhana Sundar', 'rahul@example.com', '9876543210', 'BCA', 'bca3b1055'),
('23082100500111056', 'Esakki Muthu', 'neha@example.com', '9876501234', 'BCA', 'bca3b1056'),
('23082100500111057','Esakki Raja2005','yyyy@gmail.com','9876543210','BCA','bca3b1057'),
('23082100500111058', 'Esakki Raja2006', 'priya@example.com', '9876523456', 'BCA', 'bca3b1058'),
('23082100500111059', 'Gopi Krishnan', 'arjun@example.com', '9876534567', 'BCA', 'bca3b1059'),
('23082100500112061','Jai Santhiya','jeisandhiyabharath@gmail.com','8925391302','BCA','bca3b2061'),
('23082100500112062','Janani','yyyy@gmail.com','9876543210','BCA','bca3b2062'),
('23082100500112063','Jero Stephena','yyyy@gmail.com','9876543210','BCA','bca3b2063'),
('23082100500111064','Jerrone Felix','yyyy@gmail.com','9087492006','BCA','bca3b1064'),
('23082100500112066','Mahalakshmi','mahalakshmi200621@gmail.com','9042164186','BCA','bca3b2066'),
('23082100500112067','Mary Majalla','yyyy@gmail.com','7708838132','BCA','bca3b2067'),
('23082100500111068','Mathan Nithies','yyyy@gmail.com','9876543210','BCA','bca3b1068'),
('23082100500112069','Meroselin','yyyy@gmail.com','9876543210','BCA','bca3b2069'),
('23082100500111070','Muthu Raj','yyyy@gmail.com','9876543210','BCA','bca3b1070'),
('23082100500111071','Naga Rajan','yyyy@gmail.com','9876543210','BCA','bca3b1071'),
('23082100500111072','Nickolash','yyyy@gmail.com','9876543210','BCA','bca3b1072'),
('23082100500111073','Noor Mohamed Mshaman','yyyy@gmail.com','9876543210','BCA','bca3b1073'),
('23082100500112074','Parameshwari Ramya','jhoperamya@gmail.com','9003479858','BCA','bca3b2074'),
('23082100500111076','Raja Selvam','yyyy@gmail.com','9876543210','BCA','bca3b1076'),
('23082100500111077','Rajesh','yyyy@gmail.com','9876543210','BCA','bca3b1077'),
('23082100500111078','Ram Sundar','yyyy@gmail.com','9876543210','BCA','bca3b1078'),
('23082100500112079','Ramya','rajedranramya@gmail.com','8610681835','BCA','bca3b2079'),
('23082100500111080','Rehan Gandhi','yyyy@gmail.com','9876543210','BCA','bca3b1080'),
('23082100500111081','Roshan','yyyy@gmail.com','9876543210','BCA','bca3b1081'),
('23082100500111082','Sakthi Parthiban','sakthiparthibans@gmail.com','9894357890','BCA','bca3b1082'),
('23082100500112083','Sandhiya Devi','yyyy@gmail.com','9876543210','BCA','bca3b2083'),
('23082100500111084','Sathia Prakash','yyyy@gmail.com','9876543210','BCA','bca3b1084'),
('23082100500112085','Shree Muthulakshmi','shreejeyananthan31@gmail.com','9344430495','BCA','bca3b2085'),
('23082100500111086','Siva Subramanian','yyyy@gmail.com','9876543210','BCA','bca3b1086'),
('23082100500111087','Solai Raja','yyyy@gmail.com','9876543210','BCA','bca3b1087'),
('23082100500111088','Sudalai Muthu','yyyy@gmail.com','9876543210','BCA','bca3b1088'),
('23082100500111090','Suriya Narayanan','yyyy@gmail.com','9876543210','BCA','bca3b1090'),
('23082100500112091','Thanga Daffrin Vincy','yyyy@gmail.com','9876543210','BCA','bca3b2091'),
('23082100500111093','Vel Manikanda Subash','yyyy@gmail.com','9876543210','BCA','bca3b1093'),
('23082100500111094','Venkatesh','yyyy@gmail.com','9876543210','BCA','bca3b1094')";

if ($conn->query($sql) === TRUE) {
    echo "Students inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

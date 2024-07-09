<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "student_db"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$major = $_POST['major'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students (name, email, dob, major) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $dob, $major);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


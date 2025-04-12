<?php
$host = "localhost";
$user = "root";  // Default MySQL username
$password = "";  // Default MySQL password (empty by default in XAMPP)
$db = "sports_event";  // Your database name

// Create a connection
$conn = new mysqli($host, $user, $password, $db);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // This will print error if the connection fails
}

// Retrieve form data
$name = $_POST['name'];
$rollNo = $_POST['rollNo'];
$department = $_POST['department'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$events = implode(", ", $_POST['events']);  // Join selected events into a string

// Insert data into the participants table
$sql = "INSERT INTO participants (name, rollNo, department, email, contact, events) 
        VALUES ('$name', '$rollNo', '$department', '$email', '$contact', '$events')";

// Check if the data was inserted successfully
if ($conn->query($sql) === TRUE) {
    // Redirect back to the registration page with a success message
    header("Location: register.html?status=success");
    exit();
} else {
    // Redirect back to the registration page with an error message
    header("Location: register.html?status=error");
    exit();
}

// Close the connection
$conn->close();
?>

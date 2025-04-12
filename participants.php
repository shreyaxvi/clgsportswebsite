<?php
$host = "localhost";
$user = "root";  // Default MySQL username
$password = "";  // Default MySQL password (empty by default in XAMPP)
$db = "sports_event";  // The database you created in MySQL Workbench

// Create a connection
$conn = new mysqli($host, $user, $password, $db);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data from the participants table
$result = $conn->query("SELECT * FROM participants");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Participants</title>
</head>
<body>
    <h2>Registered Participants</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Roll No</th>
            <th>Department</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Events</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['rollNo'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['contact'] ?></td>
            <td><?= $row['events'] ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>

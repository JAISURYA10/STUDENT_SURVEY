<?php
// Database connection
$servername = "localhost"; // Change this if your DB server is different
$username = "your_username"; // Change to your database username
$password = "your_password"; // Change to your database password
$dbname = "user_data"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,4307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from 2yr_res table
$sql = "SELECT feedback_column, feedback_count FROM 2yr_res";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();


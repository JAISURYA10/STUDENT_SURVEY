<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Adjust if different
$password = ""; // Adjust if different
$dbname = "user_data"; // Your database name
$port = 4307; // Adjust to match your MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total students
$totalStudentsSql = "SELECT COUNT(*) AS total_students FROM student";
$totalStudentsResult = $conn->query($totalStudentsSql);
$totalStudents = $totalStudentsResult->fetch_assoc()['total_students'];

// Fetch total responses (sum of rows from 1yr_res, 2yr_res, 3yr_res, 4yr_res)
$totalResponsesSql = "
    SELECT (
        (SELECT COUNT(*) FROM 1yr_res) + 
        (SELECT COUNT(*) FROM 2yr_res) + 
        (SELECT COUNT(*) FROM 3yr_res) + 
        (SELECT COUNT(*) FROM 4yr_res)
    ) AS total_responses";
$totalResponsesResult = $conn->query($totalResponsesSql);
$totalResponses = $totalResponsesResult->fetch_assoc()['total_responses'];

// Return data as JSON
echo json_encode([
    'total_students' => $totalStudents,
    'total_responses' => $totalResponses
]);

// Close connection
$conn->close();

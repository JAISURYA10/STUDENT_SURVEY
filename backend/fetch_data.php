<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user_data';
$port = 4307;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch summed feedback responses
$sql = "
    SELECT 'Feedback 1' AS feedback_column, SUM(feedback1) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 2' AS feedback_column, SUM(feedback2) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 3' AS feedback_column, SUM(feedback3) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 4' AS feedback_column, SUM(feedback4) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 5' AS feedback_column, SUM(feedback5) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 6' AS feedback_column, SUM(feedback6) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 7' AS feedback_column, SUM(feedback7) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 8' AS feedback_column, SUM(feedback8) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 9' AS feedback_column, SUM(feedback9) AS feedback_count FROM 3yr_res
    UNION ALL
    SELECT 'Feedback 10' AS feedback_column, SUM(feedback10) AS feedback_count FROM 3yr_res
";

$result = $conn->query($sql);

$feedback_data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $feedback_data[] = $row;
    }
}

$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($feedback_data);
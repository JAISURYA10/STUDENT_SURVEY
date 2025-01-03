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

// SQL query to fetch data from 3yr_res table
$sql = "SELECT * FROM 3yr_res"; 
$result = $conn->query($sql);

// Check if data exists
if ($result->num_rows > 0) {
    // Output data in table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['feedback1'] . "</td>";
        echo "<td>" . $row['feedback2'] . "</td>";
        echo "<td>" . $row['feedback3'] . "</td>";
        echo "<td>" . $row['feedback4'] . "</td>";
        echo "<td>" . $row['feedback5'] . "</td>";
        echo "<td>" . $row['feedback6'] . "</td>";
        echo "<td>" . $row['feedback7'] . "</td>";
        echo "<td>" . $row['feedback8'] . "</td>";
        echo "<td>" . $row['feedback9'] . "</td>";
        echo "<td>" . $row['feedback10'] . "</td>";
        echo "</tr>";
    }
} else {
    // Output an empty row when no records are found
    echo "<tr><td colspan='11'>No records found</td></tr>";
}

// Close connection
$conn->close();
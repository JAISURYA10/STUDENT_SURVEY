<?php
// Database connection details
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password is empty
$dbname = "user_data";

// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'user_data', 4307); // Added port 4307

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the number from the form input
    $user_number = $_POST["number"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO numbers (user_number) VALUES (?)");
    $stmt->bind_param("i", $user_number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Number saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

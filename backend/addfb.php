<?php
// Database connection details
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password is empty
$dbname = "user_data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname,4307);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get feedback inputs
    $feedback1 = $_POST["feedback1"];
    $feedback2 = $_POST["feedback2"];
    $feedback3 = $_POST["feedback3"];
    $feedback4 = $_POST["feedback4"];
    $feedback5 = $_POST["feedback5"];
    $feedback6 = $_POST["feedback6"];
    $feedback7 = $_POST["feedback7"];
    $feedback8 = $_POST["feedback8"];
    $feedback9 = $_POST["feedback9"];
    $feedback10 = $_POST["feedback10"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO 3yr_res (feedback1, feedback2, feedback3, feedback4, feedback5, feedback6, feedback7, feedback8, feedback9, feedback10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiiiiiii", $feedback1, $feedback2, $feedback3, $feedback4, $feedback5, $feedback6, $feedback7, $feedback8, $feedback9, $feedback10);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Email recipient
$to = "jaisurya.cb22@bitsathy.ac.in";
$subject = "Reminder Email";
$message = "This is a reminder email sent from the Faculty Dashboard.";
$headers = "From: jaisurya6392@gmail.com"; // Updated sender email

// Attempt to send the email
if(mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success", "message" => "Email sent successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send email."]);
}
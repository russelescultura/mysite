<?php
session_start(); // Start the session
$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact (full_name, email_address, phone_number, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $full_name, $email, $phone, $message);

// Execute the statement
if ($stmt->execute()) {
    // Set a session variable indicating the form was successfully submitted
    $_SESSION['form_submitted'] = true;
    // Redirect to contact page or any other page you want
    header('Location: /pages/contact.php');
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
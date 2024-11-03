<?php

$servername = "localhost";
$username = "u734514591_kenruss";
$password = "RUSSken0617";
$dbname = "u734514591_kenruss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM seminars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
} else {
    header("Location: dash_seminars.php");
    exit();
}

$conn->close();
?>
<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM film WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>
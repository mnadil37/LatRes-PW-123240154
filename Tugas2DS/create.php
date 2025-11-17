<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $sutradara = $_POST['sutradara'];
    $tahun = $_POST['tahun'];

    $stmt = $conn->prepare("INSERT INTO film (judul, genre, sutradara, tahun) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $judul, $genre, $sutradara, $tahun);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
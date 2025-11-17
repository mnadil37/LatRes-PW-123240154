<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $sutradara = $_POST['sutradara'];
    $tahun = $_POST['tahun'];

    $stmt = $conn->prepare("UPDATE film SET judul = ?, genre = ?, sutradara = ?, tahun = ? WHERE id = ?");
    $stmt->bind_param("sssii", $judul, $genre, $sutradara, $tahun, $id);

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
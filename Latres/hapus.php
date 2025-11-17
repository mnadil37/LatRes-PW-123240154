<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php?status=belum_login");
    exit;
}
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $connection->prepare("DELETE FROM film WHERE id_film = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: view/index.php");
exit;
?>
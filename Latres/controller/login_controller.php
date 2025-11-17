<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../view/login.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['error'] = "Username dan password wajib diisi";
    header("Location: ../view/login.php");
    exit;
}

$stmt = $connection->prepare("SELECT id_user, nama_lengkap, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($id_user, $nama_lengkap, $hashed_password);
$stmt->store_result();

if ($stmt->fetch()) {

    if (password_verify($password, $hashed_password) || $password === $hashed_password) {
        $_SESSION['user_id'] = $id_user;
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $stmt->close();
        header("Location: ../view/index.php");
        exit;
    }
}
$stmt->close();

$_SESSION['error'] = "Username atau password salah";
header("Location: ../view/login.php");
exit;
?>
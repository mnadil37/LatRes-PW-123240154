<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../view/register.php");
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($nama) || empty($username) || empty($password) || empty($confirm_password)) {
    $_SESSION['error'] = "Semua field wajib diisi";
    header("Location: ../view/register.php");
    exit;
}

if ($password !== $confirm_password) {
    $_SESSION['error'] = "Password dan konfirmasi password tidak sama";
    header("Location: ../view/register.php");
    exit;
}

// Cek username sudah terpakai
$stmt = $connection->prepare("SELECT id_user FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "Username sudah terdaftar, silakan gunakan username lain";
    $stmt->close();
    header("Location: ../view/register.php");
    exit;
}
$stmt->close();

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $connection->prepare("INSERT INTO users (nama_lengkap, username, password, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $nama, $username, $password_hash);

if ($stmt->execute()) {
    $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
    $stmt->close();
    header("Location: ../view/login.php");
    exit;
} else {
    $_SESSION['error'] = "Registrasi gagal, coba lagi.";
    $stmt->close();
    header("Location: ../view/register.php");
    exit;
}
?>
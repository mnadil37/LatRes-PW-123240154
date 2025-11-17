<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?status=belum_login");
    exit;
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $sutradara = trim($_POST['sutradara'] ?? '');
    $harga = (int)($_POST['harga_tiket'] ?? 0);

    $stmt = $connection->prepare("INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $judul, $sutradara, $harga);
    $stmt->execute();
    $stmt->close();

    header("Location: view/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Film Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-dark text-white">
      <h5 class="mb-1">Tambah Film Baru</h5>
      <small>Isi form untuk menambahkan film</small>
    </div>
    <div class="card-body">
      <form method="post" novalidate>
        <div class="mb-3">
          <label class="form-label">Judul Film</label>
          <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Sutradara</label>
          <input type="text" name="sutradara" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga Tiket (Rp)</label>
          <input type="number" name="harga_tiket" min="0" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="view/index.php" class="btn btn-secondary ms-2">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: view/login.php?status=belum_login");
    exit;
}
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: view/index.php");
    exit;
}

$stmt = $connection->prepare("SELECT id_film, judul_film, sutradara, harga_tiket FROM film WHERE id_film = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$film = $result->fetch_assoc();
$stmt->close();

if (!$film) {
    header("Location: view/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $sutradara = trim($_POST['sutradara'] ?? '');
    $harga = (int)($_POST['harga_tiket'] ?? 0);

    $stmt = $connection->prepare("UPDATE film SET judul_film = ?, sutradara = ?, harga_tiket = ? WHERE id_film = ?");
    $stmt->bind_param('ssii', $judul, $sutradara, $harga, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: view/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-dark text-white">
      <h5 class="mb-1">Edit Film</h5>
      <small>Perbarui informasi film</small>
    </div>
    <div class="card-body">
      <form method="post" novalidate>
        <div class="mb-3">
          <label class="form-label">ID Film</label>
          <input type="text" class="form-control" value="<?= htmlspecialchars($film['id_film']) ?>" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Judul Film</label>
          <input type="text" name="judul" class="form-control" required value="<?= htmlspecialchars($film['judul_film']) ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Sutradara</label>
          <input type="text" name="sutradara" class="form-control" required value="<?= htmlspecialchars($film['sutradara']) ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Harga Tiket (Rp)</label>
          <input type="number" name="harga_tiket" min="0" class="form-control" required value="<?= htmlspecialchars($film['harga_tiket']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="view/index.php" class="btn btn-secondary ms-2">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
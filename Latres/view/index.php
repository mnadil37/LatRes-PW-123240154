<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?status=belum_login");
    exit;
}
include '../koneksi.php';

$sql = "SELECT id_film, judul_film, sutradara, harga_tiket FROM film ORDER BY id_film ASC";
$result = $connection->query($sql);

$total_harga = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Film Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-1">Manajemen Film Bioskop</h4>
        <small>Selamat datang, <b><?= htmlspecialchars($_SESSION['nama_lengkap']) ?></b> | 
            <a href="../logout.php" class="text-white text-decoration-underline">Logout</a></small>
      </div>
      <div class="card-body">
        <a href="../tambah.php" class="btn btn-success mb-3">Tambah Film</a>
        <table class="table table-bordered table-striped">
          <thead class="table-primary">
            <tr>
              <th>ID Film</th>
              <th>Judul Film</th>
              <th>Sutradara</th>
              <th>Harga Tiket</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()):
              $total_harga += $row['harga_tiket'];
            ?>
            <tr>
              <td><?= $row['id_film'] ?></td>
              <td><?= htmlspecialchars($row['judul_film']) ?></td>
              <td><?= htmlspecialchars($row['sutradara']) ?></td>
              <td>Rp <?= number_format($row['harga_tiket'], 0, ',', '.') ?></td>
              <td>
                <a href="../edit.php?id=<?= $row['id_film'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="../hapus.php?id=<?= $row['id_film'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus film ini?')">Hapus</a>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="5" class="text-center">Data film belum tersedia</td></tr>
          <?php endif; ?>
          </tbody>
          <tfoot class="table-light fw-bold">
            <tr>
              <td colspan="3">Total Harga Tiket</td>
              <td colspan="2">Rp <?= number_format($total_harga, 0, ',', '.') ?></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
</div>
</body>
</html>
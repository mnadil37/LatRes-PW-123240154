<?php
include 'connection.php';

$query = "SELECT * FROM film ORDER BY tahun DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-green {
            background-color: #198754 !important;
        }
        .navbar-green .navbar-brand,
        .navbar-green .nav-link {
            color: #fff !important;
        }
        .navbar-green .nav-link.active {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        .film-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .no-data-row {
            text-align: center;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-green">
        <div class="container">
            <a class="navbar-brand" href="#">Manajemen Film</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="index.php">Home</a>
                <a class="nav-link" href="tambah.php">Tambah Film</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Alert untuk feedback -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 'film_deleted'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Film berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                $error_messages = [
                    'delete_failed' => 'Gagal menghapus film!',
                    'prepare_failed' => 'Error dalam sistem!',
                    'invalid_id' => 'ID tidak valid!',
                    'no_id' => 'Tidak ada ID yang diberikan!'
                ];
                echo $error_messages[$_GET['error']] ?? 'Terjadi kesalahan!';
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Kolom Kiri untuk Tabel -->
            <div class="col-md-8">
                <div class="film-container">
                    <h2>Selamat Datang di Manajemen Film</h2>
                    <p>Ini adalah daftar film Anda.</p>

                    <table class="table table-striped table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Judul Film</th>
                                <th>Genre</th>
                                <th>Tahun Rilis</th>
                                <th>Sutradara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php $no = 1; ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row['judul']); ?></td>
                                    <td><?= ucfirst($row['genre']); ?></td>
                                    <td><?= $row['tahun']; ?></td>
                                    <td><?= htmlspecialchars($row['sutradara']); ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete.php?id=<?= $row['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Apakah kamu yakin?')">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="no-data-row">
                                        Tidak ada data film.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Kanan untuk Gambar -->
            <div class="col-md-4">
                <div class="film-container text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWOCuey3jVvRQ6H6CSIbI84oKzqYosIZCpJw&s" 
                         alt="Film Collection" 
                         class="img-fluid rounded"
                         style="max-height: 400px; object-fit: cover;">
                    <div class="mt-3">
                        <h5>Koleksi Film Anda</h5>
                        <p class="text-muted">Kelola koleksi film dengan mudah dan efisien</p>
                        <?php if ($result->num_rows == 0): ?>
                            <div class="alert alert-warning">
                                <small>Mulai tambahkan film pertama Anda!</small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
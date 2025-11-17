<?php
include 'koneksi.php';

$query = "SELECT * FROM film";
$result = $conn->query($query);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manajemen Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Manajemen Film</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tambah.php">Tambah Film</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
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
                                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Tidak ada data film.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="col">
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1517602302552-471fe67acf66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZmFjdGlvbiUyMGZpbG18ZW58MHx8MHx8fDA%3D&w=1000&q=80" alt="Film Image" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>

<?php

$conn->close();

?>
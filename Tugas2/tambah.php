<?php
include 'koneksi.php';

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manajemen Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <style>
    body {
        background-color: #b2faaaff;
    }
    </style>
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
                            <a class="nav-link"  href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="tambah.php">Tambah Film</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4 bg-light p-4 rounded" style="max-width: 800px;">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center">Tambah Film</h2>
                    
                    <form action="create.php" method="POST">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Film</label>
                            <input type="text" class="form-control" id="judul" name="judul" required 
                                placeholder="Judul Film" maxlength="30">
                        </div>
                        
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <select class="form-select" id="genre" name="genre" required>
                                <option value="" selected disabled>Pilih Genre</option>
                                <option value="romance">Romance</option>
                                <option value="action">Action</option>
                                <option value="horror">Horror</option>
                                <option value="comedy">Comedy</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="sutradara" class="form-label">Sutradara</label>
                            <input type="text" class="form-control" id="sutradara" name="sutradara" required 
                                placeholder="Sutradara" maxlength="20">
                        </div>
                        
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" required 
                                placeholder="Tahun" min="1888" max="2025">
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" style="color: black;font-weight: bold;">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>
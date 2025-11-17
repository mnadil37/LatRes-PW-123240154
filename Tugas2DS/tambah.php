<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Manajemen Film</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link active" href="tambah.php">Tambah Film</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                               placeholder="Tahun" min="1888" max="2025" value="2025">
                        <div class="form-text">Tahun harus antara 1888 dan 2025</div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
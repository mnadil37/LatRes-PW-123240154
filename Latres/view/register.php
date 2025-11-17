<?php
session_start();
$error_msg = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .register-image {
            width: 100%;
            max-width: 700px; 
            height: auto;
            display: block;
            margin: 0 auto; 
            box-sizing: border-box;
        }

    </style>
</head>
<body>
<div class="container mt-5" style="max-width: 900px;">
    <div class="row shadow rounded" style="min-height: 460px;">
        <div class="col-md-6 d-none d-md-flex left-col">
            <img src="film.jpg" alt="Film strip" class="register-image">
        </div>
        <div class="col-md-6 right-col">
            <h3>Register</h3>
            <p>Isi semua data dengan benar</p>
            <?php if ($error_msg): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_msg) ?></div>
            <?php endif; ?>
            <form action="../controller/register_controller.php" method="POST" novalidate>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" required value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="login.php" class="btn btn-secondary ms-2">Kembali</a>
            </form>
            <small class="d-block mt-3 pd-15">Sudah punya akun? <a href="login.php">Login di sini</a></small>
        </div>
    </div>
</div>
</body>
</html>

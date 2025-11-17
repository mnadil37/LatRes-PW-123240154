<?php
session_start();
$error_msg = $_SESSION['error'] ?? '';
$success_msg = $_SESSION['success'] ?? '';
unset($_SESSION['error'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-image {
            width: 100%;
            max-width: 700px; 
            height: auto;
            display: block;
            margin: 0 auto; 
            box-sizing: border-box;
            padding: 15px;
        }
        .left-col {
            background-color: #f8f9fa; /* mirip bg-light */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            height: 100%;
            min-height: 460px;
        }
        .right-col {
            padding: 30px 20px;
        }
        /* Membuat container dan row memenuhi tinggi minimal */
        .container, .row {
            max-width: 900px;
            margin-top: 3rem;
        }
        .row.shadow {
            min-height: 460px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row shadow rounded">
        <div class="col-md-6 d-none d-md-flex left-col">
            <img src="film.jpg" alt="Film strip" class="login-image">
        </div>
        <div class="col-md-6 right-col">
            <h3>Login</h3>
            <?php if($error_msg): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_msg) ?></div>
            <?php endif; ?>
            <?php if($success_msg): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_msg) ?></div>
            <?php endif; ?>

            <form action="../controller/login_controller.php" method="POST" novalidate>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" required class="form-control" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="register.php" class="btn btn-secondary ms-2">Register</a>
                <small class="d-block mt-3 pd-15">Belum punya akun? <a href="register.php" class="btn" data-bs-toggle="button">Daftar di sini</a><br>
                        default admin/admin       
                </small>
            </form>
        </div>
    </div>
</div>
</body>
</html>
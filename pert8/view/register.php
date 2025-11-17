<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="mt-5 px-5" action="../controller/register_controller.php" method="POST">
        <h3>Register</h3>
        <div class="mb-2">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-2">
            <label for="telp" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
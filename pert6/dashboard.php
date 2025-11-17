<?php
$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="card-container text-center">
      <h1>Hasil Parsing Data</h1>
      <div class="container text-center">
        <div class="row align-items-start">
            <div class="col text-center">
                Nama
            </div>
            <div class="col">
                :
            </div>
            <div class="col">
                <? echo $username
            </div>
        </div>
       </div>
       <div class="container text-center">
        <div class="row align-items-start">
            <div class="col text-center">
                Email
            </div>
            <div class="col">
                :
            </div>
            <div class="col">
                <? echo $email
            </div>
        </div>
       </div>
       <div class="container text-center">
        <div class="row align-items-start">
            <div class="col text-center">
                Password
            </div>
            <div class="col">
                :
            </div>
            <div class="col">
                <? echo $password
            </div>
        </div>
       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
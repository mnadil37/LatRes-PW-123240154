<?php

$mahasiswa = [
    [
        "mata_kuliah" => "Logika Informatika",
        "sks" => 3,
        "nilai_angka" => 85,
        "predikat" => "A",
        "status" => "Lulus"
    ],
    [
        "mata_kuliah" => "Algoritma dan Pemrograman",
        "sks" => 4,
        "nilai_angka" => 90,
        "predikat" => "A",
        "status" => "Lulus"
    ],
    [
        "mata_kuliah" => "Basis Data",
        "sks" => 3,
        "nilai_angka" => 78,
        "predikat" => "B",
        "status" => "Lulus"
    ],
    [
        "mata_kuliah" => "Sistem Operasi",
        "sks" => 3,
        "nilai_angka" => 65,
        "predikat" => "C",
        "status" => "Lulus"
    ]
];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIMA | Sistem Informasi Akademis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Daftar Nilai Mahasiswa</span>
        </div>
    </nav>

    <div class="container mt-4 me-4 ms-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Mata Kuliah</th>
                        <th class="text-center">SKS</th>
                        <th class="text-center">Nilai Angka</th>
                        <th class="text-center">Predikat</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            foreach($mahasiswa as $mhs){
                                $nilai_angka = $mhs['nilai_angka'];
                                $predikat = '';
                                $status = '';
                                if($nilai_angka >= 85){
                                    $mhs['predikat'] = 'A';
                                    $mhs['status'] = 'Lulus';
                                } elseif($nilai_angka >= 70){
                                    $mhs['predikat'] = 'B';
                                    $mhs['status'] = 'Lulus';
                                } elseif($nilai_angka >= 60){
                                    $mhs['predikat'] = 'C';
                                    $mhs['status'] = 'Lulus';
                                } elseif($nilai_angka >= 50){
                                    $mhs['predikat'] = 'D';
                                    $mhs['status'] = 'Lulus';
                                } else {
                                    $mhs['predikat'] = 'E';
                                    $mhs['status'] = 'Tidak Lulus';
                                }
                            }
                            for($i = 0; $i < count($mahasiswa); $i++){
                                echo "<tr>";
                                echo "<td class='text-center'>" . ($i + 1) . "</td>";
                                echo "<td>" . $mahasiswa[$i]['mata_kuliah'] . "</td>";
                                echo "<td class='text-center'>" . $mahasiswa[$i]['sks'] . "</td>";
                                echo "<td class='text-center'>" . $mahasiswa[$i]['nilai_angka'] . "</td>";
                                echo "<td class='text-center'>" . $mahasiswa[$i]['predikat'] . "</td>";
                                echo "<td class='text-center'>" . $mahasiswa[$i]['status'] . "</td>";
                                echo "</tr>";
                            }

                            if($mhs['status'] == "Lulus"){
                                $status_class = "text-success";
                                $warna = 'green';
                            } else {
                                $status_class = "text-danger";
                                $warna = 'red';
                            }
                         ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<?php
require_once (__DIR__ . '/connection.php');

if(!$connection){
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<br>";

    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    $sql = "INSERT INTO prakpw (username, email, password) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if($stmt->execute()){
        echo "Data berhasil disimpan.";
    } else {
        echo "Data gagal ditambahkan";

    $stmt->close();
    $connection->close();
    }

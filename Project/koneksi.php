<?php
$host = "localhost";
$user = "root";
$port = "3306";
$password = "";
$dbname = "vete_run";

$conn = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
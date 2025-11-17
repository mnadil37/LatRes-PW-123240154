<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "";
$database = "prakpw";

$connection = NULL;

try {
    $connection = new mysqli($host, $username, $password, $database, $port);
    echo "Koneksi berhasil!";
} catch (mysqli_sql_exception $e) {
    echo "Koneksi gagal.";
}
?>
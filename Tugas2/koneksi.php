<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "";
$database = "db_film";

try {
    $conn = new mysqli($host, $username, $password, $database, $port);
    
    if ($conn->connect_error) {
        throw new Exception("Koneksi gagal: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

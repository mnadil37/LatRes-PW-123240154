<?php 
    $hostname = "localhost";
    $port = "3306";
    $username = "root";
    $password = "";
    $database = "bioskop";

    $connection = null;

    try{
        $connection = new mysqli($hostname, $username, $password, $database, $port);
    } catch (mysqli_sql_exception $e){
        echo "Koneksi Gagal : ". $e->getMessage();
    }
?>
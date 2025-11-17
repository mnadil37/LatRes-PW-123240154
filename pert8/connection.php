<?php

    $hostname = "localhost";
    $port = "3306";
    $username ="root";
    $password = "";
    $database = "db_auth";

    $connection = NULL;

    try {
        $connection = new mysqli(
            $hostname,
            $username,
            $password,
            $database,
            $port
        );
        echo "Koneksi Sukses";
    }catch(mysqli_sql_exception $e) {
        echo "Koneksi Gagal : ". e->getMessage();
    }

?>
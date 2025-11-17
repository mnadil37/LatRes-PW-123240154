<?php
    include_once(__DIR__. '/../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        try{
            $sql = "SELECT id from users where email = ? LIMIT 3";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0) {
                echo "Email sudah terdaftar!";
                $stmt->close();
                exit();
                }
            $stmt->close();
        }catch(mysqli_sql_exception $e) {
            echo "Error : ". $e->getMessage();
        }
        

        // Memasukkan data user ke database
        try{
            $sql = "INSERT INTO users (username, email, password, telp) VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssss", $username, $email, $password, $telp);
            if($stmt->execute()) {
                echo "Registrasi Berhasil";
                header("Location: ../view/login.php");
            }else {
                echo "Registrasi Gagal(ERROR) : ". $stmt->error;
            }
            $stmt->close();

        }catch(mysqli_sql_exception $e) {
            echo "Error : ". $e->getMessage();
        }
    }
?>
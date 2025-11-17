<?php
session_start();
include __DIR__ . '/../config/database.php';

// Validasi admin
if(!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin'){
    header("Location: ../pages/login.php");
    exit();
}

// Validasi input
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pendaftaran = intval($_POST['id_pendaftaran']);
    $status_daftar = $_POST['status_daftar'];
    $no_bib = $conn->real_escape_string($_POST['no_bib']);
    
    // Update dengan prepared statement
    $sql = "UPDATE pendaftaran 
            SET status_daftar=?, no_bib=? 
            WHERE id_pendaftaran=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status_daftar, $no_bib, $id_pendaftaran);
    
    if($stmt->execute()){
        echo "<script>alert('Data berhasil diperbarui!'); window.location='../pages/admin.php';</script>";
    } else {
        error_log('Query error: ' . $conn->error);
        echo "<script>alert('Terjadi kesalahan!'); window.location='../pages/admin.php';</script>";
    }
    
    $stmt->close();
}
?>
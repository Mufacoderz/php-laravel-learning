<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM kategori_berita WHERE id_kategori = '$id'";

    //Jika berhasil hapus
    if (mysqli_query($conn, $query)) {
        header("Location: kategori.php");
        exit();
    }
    //Jika gagal hapus
    else {
        header("Location: kategori.php");
        exit();
    }
} else {
    // Jika id kategori tidak ditemukan
    header("Location: kategori.php");
    exit();
}

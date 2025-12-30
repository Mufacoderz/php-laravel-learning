<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../assets/css/adminStyles.css">
</head>

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">User</a></li>
            <li><a href="berita.php">Berita</a></li>
            <li><a href="#">Galeri</a></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">

    <section class="cards">
        <form action="" method="post">
            <label for="">Nama Kategori</label>
            <br>
            <input type="text" name="nama_kategori">
            <br>
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </section>

    </div>

    <?php
    include '../../config/koneksi.php';
    if(isset($_POST['simpan'])){
            $nama_kategori = $_POST['nama_kategori'];
            $created_at = date("Y-m-d H:i:s");

            $query = "
                INSERT INTO kategori_berita
                (nama_kategori, created_at) VALUES
                ('$nama_kategori','$created_at')
            ";

        if(mysqli_query($conn, $query)){
            header('Location: kategori.php');
            exit();
        }else{
            echo"Gagal Menambahkan Data:". mysqli_error($conn);
        }
    }


    ?>

    </body>

</html>
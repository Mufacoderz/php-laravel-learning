<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


include '../../config/koneksi.php';
$ambilberita = "SELECT Berita.*, kategori_berita.nama_kategori FROM berita
                LEFT JOIN kategori_berita ON berita.id_kategori = kategori_berita.id_kategori
                ORDER BY berita.id_berita DESC
                ";
$berita = mysqli_query($conn, $ambilberita);

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
        <header>
            <a href="kategori.php">List Kategori</a>
            <a href="tambahberita.php">+ Tambah Berita</a>
        </header>

        <section class="cards">
            <div class="card">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $no = 1;
                        if(mysqli_num_rows($berita)>0){
                            while($row = mysqli_fetch_assoc($berita)){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul_berita'] ?></td>
                        <td><?= $row['nama_kategori'] ?></td>
                        <td>
                            <img src="../../uploads/<?=  $row['foto_berita'];?>" alt="" width="80">
                        </td>
                        <td>EDIT | HAPUS</td>
                    </tr>
                    <?php }
                    }
                    ?>
                        
                    
                </table>
            </div>
        </section>

    </div>

    </body>

</html>
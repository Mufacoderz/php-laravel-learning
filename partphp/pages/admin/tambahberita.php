<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

$kategori = mysqli_query($conn, "SELECT * FROM kategori_berita");
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
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">User</a></li>
        <li><a href="berita.php">Berita</a></li>
        <li><a href="#">Galeri</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
    </div>

    <div class="main-content">
    <header>
    
    </header>

    <section class="cards">
        <div class="card">
            <form action="tambahberita.php" method="POST" enctype="multipart/form-data">
                <label for="">Judul Berita</label><br>
                <input type="text" name="judul_berita" placeholder="Silakan isi Judul berita" required>
                <br><br>

                <label for="">Kategori</label><br>
                <select name="id_kategori" id="" required>
                    <?php while($row = mysqli_fetch_assoc($kategori)) {  ?>
                        <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori'] ?></option>
                    <?php } ?>
                </select> <br> <br>

                <label for="">Tanggal Berita</label> <br>
                <input type="date" name="tanggal_berita" required>

                <label for="">Isi Berita</label> <br>
                <textarea name="isi_berita" cols="50" rows="10" id=""></textarea> <br>

                <label for="">Foto Berita</label> <br>
                <input type="file" name="foto_berita" required>

                <br><br>
                <button type="submit" name="simpan">Simpan</button>

            </form>
        </div>

    </section>
</div>
<?php 
if(isset($_POST['simpan'])){
    // data dari form html
    $id_kategori = $_POST['id_kategori'];
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $tanggal_berita = $_POST['tanggal_berita'];

    // upload foto
    $foto = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];
    $folder = "../../uploads/";

    $foto_baru = uniqid() . "_" . $foto; //agar nama unik dan tidak redundan

    if($_FILES['foto_berita']['error'] !== UPLOAD_ERR_OK){
        echo "Error Upload File: ".$_FILES['foto_berita']['error'];
    }

    move_uploaded_file($tmp, $folder . $foto_baru);

    // Query simpan ke database
    $query = "INSERT INTO berita (id_kategori, judul_berita, isi_berita, foto_berita, tanggal_berita)
    VALUES ('$id_kategori', '$judul_berita', '$isi_berita', '$foto_baru', '$tanggal_berita')";

    if(mysqli_query($conn, $query)){
        echo "<script>
                alert('Berita berhasil disimpan!');
                window.location.href='berita.php'
            </script>";
    }
    else{
        "<script>
                alert('Gagal!');
                window.location.href='berita.php'
        </script>";
    }
}
?>

</body>
</html>
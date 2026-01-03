<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>
<?php 
include 'config/koneksi.php';
if(!isset($_GET['id'])){
    echo "<script>alert('Berita tidak ada!'); window.location.href='berita.php'</script>";
    exit();
}

$id = $_GET['id'];
$query = "SELECT berita.*, kategori_berita.nama_kategori FROM berita
                LEFT JOIN kategori_berita ON berita.id_kategori = kategori_berita.id_kategori
                WHERE berita.id_berita = '$id' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<section class="detail-berita">
        <h1><?= $row['judul_berita'] ?></h1>
        <p><?= substr($row['isi_berita'], 0 ,120) ?>..</p>
        <small><i><?= date('d M Y', strtotime($row['tanggal_berita'])) ?> - <?= $row['nama_kategori'] ?></i></small>
        <img src="uploads/<?= $row['foto_berita'] ?>" class="gambar-detail" alt="">
        <br><br>
        <p><?php echo $row['isi_berita'] ?></p>
</section>

<?php include 'includes/footer.php'; ?>
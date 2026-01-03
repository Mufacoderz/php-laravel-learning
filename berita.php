<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>
<?php 
include 'config/koneksi.php';
$ambilberita = "SELECT berita.*, kategori_berita.nama_kategori FROM berita
                LEFT JOIN kategori_berita ON berita.id_kategori = kategori_berita.id_kategori
                ORDER BY berita.id_berita DESC";
$berita = mysqli_query($conn, $ambilberita);
?>

<section>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($berita)){
    ?>
    <div class="card">
        <img src="uploads/<?= $row['foto_berita'] ?>" alt="">
        <div class="konten-berita">
            <h3><?= $row['judul_berita'] ?></h3>
            <p><?= substr($row['isi_berita'], 0 ,120) ?>..</p>
            <small><i><?= date('d M Y', strtotime($row['tanggal_berita'])) ?> - <?= $row['nama_kategori'] ?></i></small>
            <br><br>
            <a href="detailberita.php?id=<?= $row['id_berita'] ?>">Selengkapnya..</a>
        </div>
    </div>

    <?php } ?>
</section>

<?php include 'includes/footer.php'; ?>
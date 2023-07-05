<?php
include "sidebaranggota.php";
include "koneksi.php";
?>

<link rel="stylesheet" type="text/css" href="detail.css">
<div class="home">
    <div class="header">
        <h1>Detail Buku</h1>
    </div>
    <?php
    $ambil = $_GET['id_buku'];
    $hasil = mysqli_query($koneksi, "SELECT *
    FROM buku
    INNER JOIN klasifikasi
    ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
    WHERE id_buku = '$ambil'");
    while($row = mysqli_fetch_array($hasil)):
    ?>
    <div class="isi">
        <span class="image-box">
            <?php echo "<img src='cover/$row[cover_buku]' width='250' height='350' />"; ?>
        </span>
        <span class="detail">
            <div class="subject"><?= $row['subject'];?></div>
            <div class="txt keterangan">
                <div class="judul">
                    <div class="judul_utama"><?= $row['judul_utama'];?></div>
                    <div class="anak_judul"><?= $row['anak_judul'];?></div>
                </div>
                <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                <div class="lokasi">
                    Lokasi Buku
                    <div class="rak"></div>
                </div>
            </div>
            <div class="button">
                <a class="tombol" href="detail.php?id_buku=<?=$row['id_buku'];?>"><span>Detail</span><i></i></a>
                <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
            </div>
        </span>
    </div>
    <?php endwhile ?>
</div>
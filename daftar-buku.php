<?php
include "sidebaranggota.php";
include "koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="swiper-bundle.min.css"/>
<link rel="stylesheet" type="text/css" href="daftar-buku.css">
<div class="home">
    <div class="header-text">
        <h1>Koleksi Bacaan</h1>
    </div>
    <div class="title">
        <h1>Untuk Khotbah</h1>
    </div>
    <div class="result">
    <?php
        $hasil = mysqli_query($koneksi, "SELECT *
            FROM buku
            INNER JOIN klasifikasi
            ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
            WHERE subject like '%khotbah%'");
        while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="item">
                    <div class="cover">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="?id_buku=<?=$row['id_buku'];?>#popup"><span>Detail</span><i></i></a>
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
        <?php
            endwhile;
        ?>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>

<script src="swiper-bundle.min.js"></script>
<script src="coba.js"></script>

    
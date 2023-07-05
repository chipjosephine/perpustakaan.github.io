<?php
include "koneksi.php";
include "sidebaranggota.php";
?>
<link rel="stylesheet" type="text/css" href="swiper-bundle.min.css"/>
<link rel="stylesheet" type="text/css" href="koleksi-bacaan.css">
<head>
    <title>Koleksi Bacaan</title>
</head>
<div class="home">
    <div class="header-text">
        <h1>Koleksi Bacaan</h1>
    </div>
    <div class="title">
        <h1>Tersedia</h1>
    </div>

    <div class="container swiper">
        <div class="slide-container1">
            <div class="card-wrapper swiper-wrapper">
                <?php
                $hasil = mysqli_query($koneksi, "SELECT *
                FROM buku
                INNER JOIN klasifikasi
                ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi");
                while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?><h1><?= $row['stok'];?> buku tersedia</h1></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="id_buku"><?= $row['id_buku'];?></div>
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                        <div class="lokasi">
                            <h1>Lokasi</h1>
                            <table>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td><?= $row['lantai'];?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td>:</td>
                                    <td><?= $row['rak'];?></td>
                                </tr>
                                <tr>
                                    <td>Sisi</td>
                                    <td>:</td>
                                    <td><?= $row['sisi'];?></td>
                                </tr>
                                <tr>
                                    <td>Susunan ke-</td>
                                    <td>:</td>
                                    <td><?= $row['susun'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>

    <div class="title">
        <h1>Paling Sering Dipinjam</h1>
    </div>

    <div class="container swiper">
        <div class="slide-container2">
            <div class="card-wrapper swiper-wrapper">
                <?php
                $query = mysqli_query($koneksi, "select judul_utama, count(judul_utama) as jumlah from peminjaman group by judul_utama order by jumlah desc");
                while($hasil = mysqli_fetch_array($query)) :
                ?>
                <?php
                $hasil = mysqli_query($koneksi, "SELECT *
                FROM buku
                INNER JOIN klasifikasi
                ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
                WHERE judul_utama = '$hasil[judul_utama]'");
                while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?><h1><?= $row['stok'];?> buku tersedia</h1></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="id_buku"><?= $row['id_buku'];?></div>
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                        <div class="lokasi">
                            <h1>Lokasi</h1>
                            <table>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td><?= $row['lantai'];?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td>:</td>
                                    <td><?= $row['rak'];?></td>
                                </tr>
                                <tr>
                                    <td>Susunan ke-</td>
                                    <td>:</td>
                                    <td><?= $row['susun'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
                <?php
                endwhile;
                endwhile;
                ?>
            </div>
        </div>
    </div>

    <div class="title">
        <h1>Untuk Khotbah</h1>
    </div>

    <div class="container swiper">
        <div class="slide-container3">
            <div class="card-wrapper swiper-wrapper">
                <?php
                $hasil = mysqli_query($koneksi, "SELECT *
                FROM buku
                INNER JOIN klasifikasi
                ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
                WHERE subject like '%khotbah%'");
                while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?><h1><?= $row['stok'];?> buku tersedia</h1></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="id_buku"><?= $row['id_buku'];?></div>
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                        <div class="lokasi">
                            <h1>Lokasi</h1>
                            <table>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td><?= $row['lantai'];?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td>:</td>
                                    <td><?= $row['rak'];?></td>
                                </tr>
                                <tr>
                                    <td>Susunan ke-</td>
                                    <td>:</td>
                                    <td><?= $row['susun'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>

    <div class="title">
        <h1>Bacaan Rohani Kristen</h1>
    </div>

    <div class="container swiper">
        <div class="slide-container4">
            <div class="card-wrapper swiper-wrapper">
                <?php
                $hasil = mysqli_query($koneksi, "SELECT *
                FROM buku
                INNER JOIN klasifikasi
                ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
                WHERE subject like '%bacaan%'");
                while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="card swiper-slide">
                    <div class="image-box">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?><h1><?= $row['stok'];?> buku tersedia</h1></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="id_buku"><?= $row['id_buku'];?></div>
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                        <div class="lokasi">
                            <h1>Lokasi</h1>
                            <table>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td><?= $row['lantai'];?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td>:</td>
                                    <td><?= $row['rak'];?></td>
                                </tr>
                                <tr>
                                    <td>Susunan ke-</td>
                                    <td>:</td>
                                    <td><?= $row['susun'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>

    <script src="swiper-bundle.min.js"></script>
    <script src="koleksi-bacaan.js"></script>
</div>
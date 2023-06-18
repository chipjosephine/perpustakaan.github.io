<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Laporan Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="lapperpus.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c02c255c04.js" crossorigin="anonymous"></script>
</head>

<section class="home">
    <div class="text">
        <h4>Laporan Perpustakaan</h4>
        <h6>Laporan Harian</h6>
        <ul class="header">
            <li class="image-text satu">
                <a href="pinjamstaf.php">
                    <div class="ket keterangan">
                        <span class="jumlah" align="right"><h5>
                            <?php
                                $today=date('Y-m-d');
                                $jumlah_anggota = mysqli_query($koneksi, "select * from buku_tamu_ang where waktu_berkunjung like '%$today%'");
                                $tampil_anggota = mysqli_num_rows($jumlah_anggota);
                                $jumlah_pengunjung = mysqli_query($koneksi, "select * from buku_tamu_peng where waktu like '%$today%'");
                                $tampil_pengunjung = mysqli_num_rows($jumlah_pengunjung);
                                $total = $tampil_anggota + $tampil_pengunjung;
                                echo $total;
                            ?>
                        </h5></span>
                        <span class="judul" align="right">Pengunjung <br> Hari Ini</span>
                    </div>
                    <span class="logo" align="right">
                        <i class="fa-solid fa-users icon1"></i>
                    </span>
                </a>
            </li>
            <li class="image-text dua">
                <a href="peminjamanstaf2.php">
                    <div class="ket keterangan" align="right">
                        <span class="jumlah"><h5>
                            <?php
                                $today = date('Y-m-d');
                                $jumlah = mysqli_query($koneksi, "select * from peminjaman where status like '%A%' and tgl_pinjam = $today;");
                                $tampil = mysqli_num_rows($jumlah);
                                echo $tampil;
                            ?>
                        </h5></span>
                        <span class="judul" align="right">Buku Dipinjam Hari Ini</span>
                    </div>
                    <span class="logo" align="right">
                        <i class='bx bx-arrow-to-top icon2'></i>
                    </span>
                </a>
            </li>
            <li class="image-text tiga">
                <a href="pengembalianstaf2.php">
                    <div class="ket keterangan" align="right">
                        <span class="jumlah"><h5>
                            <?php
                                $jumlah = mysqli_query($koneksi, "select * from pengembalian where status like '%K%' and tgl_kembali = $today;");
                                $tampil = mysqli_num_rows($jumlah);
                                echo $tampil;
                            ?>
                        </h5></span>
                        <span class="judul"align="right"> Buku Dikembalikan Hari Ini</span>
                    </div>
                    <span class="logo" align="right">
                        <i class='bx bx-arrow-to-bottom icon3'></i>
                    </span>
                </a>
            </li>
            <li class="image-text empat">
                <a href="pengembalianstaf.php">
                    <div class="ket keterangan">
                        <span class="jumlah" align="right"><h5>
                            <?php
                                $jumlah = mysqli_query($koneksi, "select * from anggota where gabung like '%$today%'");
                                $tampil = mysqli_num_rows($jumlah);
                                echo $tampil;
                            ?>
                        </h5></span>
                        <span class="judul" align="right">Denda yang Masuk Hari Ini</span>
                    </div>
                    <span class="logo" align="right">
                        <i class="fa-solid fa-dollar-sign icon4"></i>
                    </span>
                </a>
            </li>
        </ul>
        <h6>Statistik Kunjungan</h6>
        <div class="grafik">
            <div class="box kunjungan1">
                <canvas id="anggota"></canvas>
            </div>
            <div class="box kunjungan2">
                <canvas id="pengunjung"></canvas>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var anggota = document.getElementById('anggota').getContext('2d');
    var pengunjung = document.getElementById('pengunjung').getContext('2d');

    //Anggota//
    var anggota = new Chart(anggota, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Anggota',
                data: [
                    <?php
                    $anggota = mysqli_query($koneksi, "select hari from buku_tamu_ang where hari='Monday'");
                    $jumlah = mysqli_num_rows($anggota);
                    echo $jumlah;
                    ?>,
                    <?php
                    $anggota = mysqli_query($koneksi, "select hari from buku_tamu_ang where hari='Tuesday'");
                    $jumlah = mysqli_num_rows($anggota);
                    echo $jumlah;
                    ?>,
                    <?php
                    $anggota = mysqli_query($koneksi, "select hari from buku_tamu_ang where hari='Wednesday'");
                    $jumlah = mysqli_num_rows($anggota);
                    echo $jumlah;
                    ?>,
                    <?php
                    $anggota = mysqli_query($koneksi, "select hari from buku_tamu_ang where hari='Thursday'");
                    $jumlah = mysqli_num_rows($anggota);
                    echo $jumlah;
                    ?>,
                    <?php
                    $anggota = mysqli_query($koneksi, "select hari from buku_tamu_ang where hari='Friday'");
                    $jumlah = mysqli_num_rows($anggota);
                    echo $jumlah;
                    ?>
                ],
                backgroundColor: [
                'rgba(255, 222, 89, 1)',
                'rgba(231, 111, 81, 1)',
                'rgba(42, 157, 143, 1)',
                'rgba(0, 150, 199, 1)',
                'rgba(123, 44, 191, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });

    //Pengunjung//
    var pengunjung = new Chart(pengunjung, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Pengunjung',
                data: [
                    <?php
                    $ambil_data = mysqli_query($koneksi, "select hari from buku_tamu_peng where hari='Monday'");
                    $ambil = mysqli_num_rows($ambil_data);
                    echo $ambil;
                    ?>,
                    <?php
                    $ambil_data = mysqli_query($koneksi, "select hari from buku_tamu_peng where hari='Tuesday'");
                    $ambil = mysqli_num_rows($ambil_data);
                    echo $ambil;
                    ?>,
                    <?php
                    $ambil_data = mysqli_query($koneksi, "select hari from buku_tamu_peng where hari='Wednesday'");
                    $ambil = mysqli_num_rows($ambil_data);
                    echo $ambil;
                    ?>,
                    <?php
                    $ambil_data = mysqli_query($koneksi, "select hari from buku_tamu_peng where hari='Thursday'");
                    $ambil = mysqli_num_rows($ambil_data);
                    echo $ambil;
                    ?>,
                    <?php
                    $ambil_data = mysqli_query($koneksi, "select hari from buku_tamu_peng where hari='Friday'");
                    $ambil = mysqli_num_rows($ambil_data);
                    echo $ambil;
                    ?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });

    </script>


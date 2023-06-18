<?php
    include "sidebarstaf.php";
?>

<link rel="stylesheet" type="text/css" href="dbstaf.css">

<head>
    <title>Dashboard</title>
</head>

<section class="home">
    <div class="text">
        <?php
            if(@$_SESSION['username']){
                $user_terlogin = @$_SESSION['username'];
            }
            $sql_user = mysqli_query($koneksi, "select * from staf where username = '$user_terlogin'");
            $data_user = mysqli_fetch_array($sql_user);
        ?>
        <h4>Hello, <?= $data_user['nama_staf']; ?>!</h4>
        <h6><?= date('l, d M Y');?></h6>
    </div>

    <ul class="header">
        <li class="image-text">
            <a href="pinjamstaf.php">
                <span class="img">
                    <img src="gambar/pinjam.png" alt="" width="100px">
                </span>

                <div class="ket keterangan">
                    <span class="jumlah"><h5>
                        <?php
                            $jumlah = mysqli_query($koneksi, "select * from peminjaman where status like '%P%'");
                            $tampil = mysqli_num_rows($jumlah);
                            echo $tampil;
                        ?>
                    </h5></span>
                    <span class="judul"> Request Peminjaman</span>
                </div>
            </a>
        </li>
        <li class="image-text">
            <a href="pengembalianstaf.php">
                <span class="img">
                    <img src="gambar/kembalikan.png" alt="" width="100px">
                </span>

                <div class="ket keterangan">
                    <span class="jumlah"><h5>
                        <?php
                            $jumlah = mysqli_query($koneksi, "select * from pengembalian where status like '%P%'");
                            $tampil = mysqli_num_rows($jumlah);
                            echo $tampil;
                        ?>
                    </h5></span>
                    <span class="judul"> Request Pengembalian</span>
                </div>
            </a>
        </li>
        <li class="image-text">
            <a href="peminjamanstaf2.php">
                <span class="img">
                    <img src="gambar/pinjam.png" alt="" width="100px">
                </span>

                <div class="ket keterangan">
                    <span class="jumlah"><h5>
                        <?php
                            $today = date('Y-m-d');
                            $jumlah = mysqli_query($koneksi, "select * from peminjaman where status like '%A%' and tgl_pinjam = $today;");
                            $tampil = mysqli_num_rows($jumlah);
                            echo $tampil;
                        ?>
                    </h5></span>
                    <span class="judul">Buku yang Dipinjam Hari Ini</span>
                </div>
            </a>
        </li>
        <li class="image-text">
            <a href="pengembalianstaf2.php">
                <span class="img">
                    <img src="gambar/kembalikan.png" alt="" width="100px">
                </span>

                <div class="ket keterangan">
                    <span class="jumlah"><h5>
                        <?php
                            $jumlah = mysqli_query($koneksi, "select * from pengembalian where status like '%K%' and tgl_kembali = $today;");
                            $tampil = mysqli_num_rows($jumlah);
                            echo $tampil;
                        ?>
                    </h5></span>
                    <span class="judul"> Buku Dikembalikan Hari Ini</span>
                </div>
            </a>
        </li>
    </ul>
    <div class="katalog">
            <div class="data-buku">
                <h3>Buku Yang Sering Dipinjam</h3>
            </div>
            <div class="container">
                <main class="grid">
                    <?php
                        $query = mysqli_query($koneksi, "select judul_utama, count(judul_utama) as jumlah from peminjaman group by judul_utama order by jumlah desc limit 4");
                        while($hasil = mysqli_fetch_array($query)) :
                    ?>
                    <article>
                        <?php
                        $cover = mysqli_query($koneksi, "select * from buku where judul_utama = '$hasil[judul_utama]'");
                        $tampil = mysqli_fetch_array($cover);
                        echo "<img src='cover/$tampil[cover_buku]' width='220' height='320' border-radius='10px'/>";
                        ?>
                        <div class="detail">
                            <span align="left"><h1><?=$tampil['judul_utama'];?></h1><p><?=$tampil['anak_judul'];?></p></span>
                        </div>
                    </article>
                    <?php endwhile ?>
                </main>
            </div>

</section>
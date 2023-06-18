<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Peminjaman</title>
</head>
<link rel="stylesheet" type="text/css" href="peminjamanstaf2.css">

    <section class="home">
        <div class="header-text">
            <h4>Peminjaman</h4>
        </div>
        <ul class="nav">
            <li><a href="pinjamstaf.php">Permintaan Peminjaman</a></li>
            <li><a href="peminjamanstaf2.php" class="active">Sedang Dipinjam</a></li>
            <li><a href="riwayatpinjamstaf.php">Riwayat Peminjaman</a></li>
        </ul>
        <?php
        $dipinjam = mysqli_query($koneksi, "select * from peminjaman where status like '%A%'");
        while($data_dipinjam=mysqli_fetch_array($dipinjam)):
        
        ?>
        <div class="ket">
            <div class="isi">
                <span class="cover">
                    <?php
                    $cover = mysqli_query($koneksi, "select * from buku where id_buku = '$data_dipinjam[id_buku]'");
                    $tampil = mysqli_fetch_array($cover);
                    echo "<img src='cover/$tampil[cover_buku]' width='100'/>";
                    ?>
                </span>      
                <div class="txt keterangan">
                <table>
                    <tr>
                        <td>ID Peminjaman</td>
                        <td>:</td>
                        <td><?=$data_dipinjam['id_peminjaman'];?></td>
                    </tr>
                    <tr>
                        <td width="150" >ID Peminjam</td>
                        <td>:</td>
                        <td><?=$data_dipinjam['id_anggota'];?></td>
                    </tr>
                    <tr>
                        <td width="120px" >Nama Peminjam</td>
                        <td width="10px">:</td>
                        <td><?=$data_dipinjam['nama_anggota'];?></td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td><?=$data_dipinjam['judul_utama'];?></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td></td>
                            <td><?=$data_dipinjam['anak_judul'];?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td>:</td>
                        <td><?php
                            $date = $data_dipinjam['tgl_pinjam']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td>:</td>
                        <td><?php
                            $date = $data_dipinjam['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </section>
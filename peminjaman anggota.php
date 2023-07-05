<?php
    include "sidebaranggota.php";
    include "session-anggota.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Persetujuan</title>
    <link rel="stylesheet" type="text/css" href="peminjaman anggota.css">
</head>
<body>
<section class="home">
        <div class="header-text">
            <h4>Peminjaman</h4>
        </div>
        <ul class="nav">
            <li class="aktif"><a href="#" class="active" >Menunggu Persetujuan</a></li>
            <li class="non"><a href="sedang dipinjam.php">Sedang Dipinjam</a></li>
            <li class="non"><a href="riwayat peminjaman.php">Riwayat Peminjaman</a></li>
        </ul>

        <?php
        $pinjam = mysqli_query($koneksi, "select * from peminjaman");
        $data_pinjam= mysqli_fetch_array($pinjam);

        if(@$_SESSION['username']){
            $user_terlogin = @$_SESSION['username'];
        }

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
    
        $dipinjam = mysqli_query($koneksi, "select * from peminjaman where id_anggota = '$data_user[id_anggota]' and status like '%P%'");
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
                    <span class="judul"><?=$data_dipinjam['judul_utama'];?></span>
                    <p class="anak_judul"><?=$data_dipinjam['anak_judul'];?></p>                
                    <table>
                        <tr>
                            <td>ID Peminjaman</td>
                            <td>:</td>
                            <td><?=$data_dipinjam['id_peminjaman'];?></td>
                        </tr>
                        <tr>
                            <td width="120">ID Buku</td>
                            <td width="10">:</td>
                            <td><?=$data_dipinjam['id_buku'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td> : </td>
                            <td><?php
                            $date = $data_dipinjam['tgl_pinjam']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td> : </td>
                            <td><?php
                            $date = $data_dipinjam['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td width="150">Lama Peminjaman</td>
                            <td>:</td>
                            <td>7 Hari</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Menunggu Persetujuan</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
            endwhile;
        ?>
    </section>
</body>
</html>
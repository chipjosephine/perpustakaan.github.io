<?php
   include "sidebaranggota.php"; 
?>

<link rel="stylesheet" type="text/css" href="riwayat.css">
    <section class="home">
        <div class="header-text">
            <h4>Riwayat Kunjungan</h4>
        </div>
        <?php
        $absen = mysqli_query($koneksi, "select * from buku_tamu_ang");
        $data_absen = mysqli_fetch_array($absen);

        if(@$_SESSION['username']){
            $user_terlogin = @$_SESSION['username'];
        }

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
    
        $pengunjung = mysqli_query($koneksi, "select * from buku_tamu_ang where id_anggota = '$data_user[id_anggota]'");
        while($tampil=mysqli_fetch_array($pengunjung)):
        ?>
        <div class="history">
            <div class="tanggal"><?=$tampil['waktu_berkunjung']?></div>
            <div class="isi">
                <span class="keperluan">Keperluan : <?=$tampil['keperluan']?></span>
            </div>
        </div>
        <?php endwhile ?>
    </section>


<?php
    include "sidebaranggota.php";
?>
<link rel="stylesheet" type="text/css" href="pengembalian anggota.css">
    <section class="home">
        <div class="header-text">
            <h4>Pengembalian</h4>
        </div>
        <ul class="nav">
            <li><a href="pengembalian anggota.php" class="active" >Menunggu Persetujuan</a></li>
            <li><a href="riwayat pengembalian.php">Riwayat Pengembalian</a></li>
        </ul>
        <?php
            $kembali = mysqli_query($koneksi, "select * from pengembalian");
            $data_kembali= mysqli_fetch_array($kembali);

            if(@$_SESSION['username']){
                $user_terlogin = @$_SESSION['username'];
            }

            $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
            $data_user = mysqli_fetch_array($sql_user);
        
            $kembalikan = mysqli_query($koneksi, "select * from pengembalian where id_anggota = '$data_user[id_anggota]' and status like '%P%'");
            while($data_pengembalian=mysqli_fetch_array($kembalikan)):
        ?>
        <div class="ket">
            <div class="isi">
                <span class="cover">
                    <?php
                    $cover = mysqli_query($koneksi, "select * from buku where id_buku = '$data_pengembalian[id_buku]'");
                    $tampil = mysqli_fetch_array($cover);
                    echo "<img src='cover/$tampil[cover_buku]' width='100'/>";
                    ?>
                </span>
    
                <div class="txt keterangan">
                    <span class="judul"><?=$data_pengembalian['judul_utama'];?></span>
                    <p class="anak_judul"><?=$data_pengembalian['anak_judul'];?></p>  
                    <table>
                        <tr>
                            <td>ID Pengembalian</td>
                            <td>:</td>
                            <td><?=$data_pengembalian['id_pengembalian'];?></td>
                        </tr>
                        <tr>
                            <td width="120">ID Buku</td>
                            <td width="10">:</td>
                            <td><?=$data_pengembalian['id_buku'];?></td>
                        </tr>
                        <tr>
                            <td width="180">Tanggal Pengembalian</td>
                            <td width="10">:</td>
                            <td><?php
                            $date = $data_pengembalian['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td>:</td>
                            <td><?= "Rp". number_format($data_pengembalian['denda'],0,',','.');?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Menunggu Persetujuan</td>
                        </tr>
                    </table>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </section>
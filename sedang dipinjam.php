<?php
    include "sidebaranggota.php";
?>
<link rel="stylesheet" type="text/css" href="sedang dipinjam.css">
    <section class="home">
        <div class="header-text">
            <h4>Peminjaman</h4>
        </div>
        <ul class="nav">
            <li><a href="peminjaman anggota.php" >Menunggu Persetujuan</a></li>
            <li><a href="sedang dipinjam.php" class="active">Sedang Dipinjam</a></li>
            <li><a href="riwayat peminjaman.php">Riwayat Peminjaman</a></li>
        </ul>
        <?php
        $pinjam = mysqli_query($koneksi, "select * from peminjaman");
        $data_pinjam= mysqli_fetch_array($pinjam);

        if(@$_SESSION['username']){
            $user_terlogin = @$_SESSION['username'];
        }

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
    
        $dipinjam = mysqli_query($koneksi, "select * from peminjaman where id_anggota = '$data_user[id_anggota]' and status like '%A%'");
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
                            <td>Kembalikan Sebelum</td>
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
                    </table>
                </div>
            </div>
            <div class="button">
                    <a href="konfirm-pengembalian.php?id_buku=<?=$data_dipinjam['id_buku'];?>"><button>Kembalikan</button></a>
            </div>
        </div>
        <?php endwhile ?>
    </section>

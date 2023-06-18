<?php
    include "sidebaranggota.php";
?>
<link rel="stylesheet" type="text/css" href="riwayat pengembalian.css">
    <section class="home">
        <div class="header-text">
            <h4>Pengembalian</h4>
        </div>
        <ul class="nav">
            <li><a href="pengembalian anggota.php">Menunggu Persetujuan</a></li>
            <li><a href="riwayat pengembalian.php" class="active">Riwayat Pengembalian</a></li>
        </ul>
        <?php
        if(@$_SESSION['username']){
            $user_terlogin = @$_SESSION['username'];
        }

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
        
        $dikembalikan = mysqli_query($koneksi, "select * from pengembalian where id_anggota = '$data_user[id_anggota]'");
        while($data_kembali=mysqli_fetch_array($dikembalikan)):
        ?>
        <div class="ket">
            <div class="isi">
                <span class="cover">
                <?php
                    $cover = mysqli_query($koneksi, "select * from buku where id_buku = '$data_kembali[id_buku]'");
                    $tampil = mysqli_fetch_array($cover);
                    echo "<img src='cover/$tampil[cover_buku]' width='100'/>";
                ?>
                </span>
                <div class="txt keterangan">
                <span class="judul"><?=$data_kembali['judul_utama'];?></span>
                <p class="anak_judul"><?=$data_kembali['anak_judul'];?></p>
                <table>
                    <tr>
                        <td>ID Pengembalian</td>
                        <td>:</td>
                        <td><?=$data_kembali['id_pengembalian'];?></td>
                    </tr>
                    <tr>
                        <td width="120">ID Buku</td>
                        <td width="10">:</td>
                        <td><?=$data_kembali['id_buku'];?></td>
                    </tr>
                    <tr>
                        <td width = "170">Tanggal Pinjam</td>
                        <td width="10">:</td>
                        <td>
                                <?php
                                    $data = mysqli_query($koneksi, "select * from peminjaman where id_buku = '$data_kembali[id_buku]'");
                                    $tampil = mysqli_fetch_array($data);
                                    $date = $tampil['tgl_pinjam']; 
                                    $datetime = DateTime::createFromFormat('Y-m-d', $date);
                                    echo $datetime->format('d/m/Y');
                                ?>
                        </td>
                    </tr>
                    <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td><?php
                            $data = mysqli_query($koneksi, "select * from peminjaman where id_buku = '$data_kembali[id_buku]'");
                            $tampil = mysqli_fetch_array($data);
                            $date = $tampil['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                    </tr>
                        <tr>
                            <td>Tanggal Dikembalikan</td>
                            <td>:</td>
                            <td><?php
                            $date = $data_kembali['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                    </tr>
                    <tr>
                        <td>Denda</td>
                        <td>:</td>
                        <td><?=$data_kembali['denda'];?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <?php
                                if($data_kembali['status'] =='P'){
                                    echo "Menunggu Persetujuan";
                                }
                                elseif($data_kembali['status'] =='K'){
                                    echo "Telah Dikembalikan";
                                }
                                elseif($data_kembali['status'] =='R'){
                                    echo " Pengembalian Ditolak";
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="button">
        <a href="scanner.php>"><button>Pinjam Lagi</button></a>
    </div>
</div>
<?php endwhile ?>
</section>
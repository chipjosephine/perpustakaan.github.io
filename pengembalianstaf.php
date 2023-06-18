<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Pengembalian</title>
</head>

<link rel="stylesheet" type="text/css" href="pengembalianstaf.css">
    
    <section class="home">
        <div class="header-text">
            <h4>Pengembalian</h4>
        </div>
        <ul class="nav">
            <li><a href="pengembalianstaf.php" class="active" >Permintaan Pengembalian</a></li>
            <li><a href="pengembalianstaf2.php">Riwayat Pengembalian</a></li>
        </ul>

        <?php
        $kembali = mysqli_query($koneksi, "select * from pengembalian where status like '%P'");
        while($data_kembali = mysqli_fetch_array($kembali)) :
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
                    <span class="notif"><?=$data_kembali['nama_anggota'];?> Ingin Mengembalikan Buku</span>
                    <table>
                        <tr>
                            <td>ID Pengembalian</td>
                            <td>:</td>
                            <td><?=$data_kembali['id_pengembalian'];?></td>
                        </tr>
                        <tr>
                            <td width="150" >ID Peminjam</td>
                            <td>:</td>
                            <td><?=$data_kembali['id_anggota'];?></td>
                        </tr>
                        <tr>
                            <td width="120">ID Buku</td>
                            <td width="10">:</td>
                            <td><?=$data_kembali['id_buku'];?></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><?=$data_kembali['judul_utama'];?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?=$data_kembali['anak_judul'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td> : </td>
                            <td><?php
                            $date = $data_kembali['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td> : </td>
                            <td><?="Rp" .number_format($data_kembali['denda'],0,',','.');?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="button">
                <?php
                if($data_kembali['status'] == 'P'){
                ?>
                <a href="proses-kembali.php?id_pengembalian=<?=$data_kembali['id_pengembalian']?>&&status=K" class="btn btn-acc">
                <i class='bx bx-check icon'></i><span>Terima</span>
                </a>
                <a href="proses-kembali.php?id_pengembalian=<?=$data_kembali['id_pengembalian']?>&&status=R" class="btn btn-reject">
                <i class='bx bx-x icon'></i><span>Tolak</span>
                </a>
                <?php } ?>
            </div>
        </div>
        <?php endwhile ?>
    </section>
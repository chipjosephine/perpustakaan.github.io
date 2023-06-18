<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Peminjaman</title>
</head>

<link rel="stylesheet" type="text/css" href="pinjamstaf.css">

    <section class="home">
        <div class="header-text">
            <h4>Peminjaman</h4>
        </div>
        <ul class="nav">
            <li><a href="#" class="active" >Permintaan Peminjaman</a></li>
            <li><a href="peminjamanstaf2.php">Sedang Dipinjam</a></li>
            <li><a href="riwayatpinjamstaf.php">Riwayat Peminjaman</a></li>
        </ul>
        <?php
        $pinjam = mysqli_query($koneksi, "select * from peminjaman where status like '%P%'");
        while($data_pinjam = mysqli_fetch_array($pinjam)) :
        ?>
        <div class="ket">
            <div class="isi">
                <span class="cover">
                    <?php
                    $buku = mysqli_query($koneksi, "select * from buku where id_buku = '$data_pinjam[id_buku]'");
                    $tampil = mysqli_fetch_array($buku);
                    echo "<img src='cover/$tampil[cover_buku]' width='100'/>";
                    ?>
                </span>  
                <div class="txt keterangan">
                    <span class="notif"><?=$data_pinjam['nama_anggota'];?> Ingin Meminjam Buku</span>
                    <table>
                        <tr>
                            <td>ID Peminjaman</td>
                            <td>:</td>
                            <td><?=$data_pinjam['id_peminjaman'];?></td>
                        </tr>
                        <tr>
                            <td width="150" >ID Peminjam</td>
                            <td>:</td>
                            <td><?=$data_pinjam['id_anggota'];?></td>
                        </tr>
                        <tr>
                            <td width="120">ID Buku</td>
                            <td width="10">:</td>
                            <td><?=$data_pinjam['id_buku'];?></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><?=$data_pinjam['judul_utama'];?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?=$data_pinjam['anak_judul'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td> : </td>
                            <td><?php
                            $date = $data_pinjam['tgl_pinjam']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td> : </td>
                            <td><?php
                            $date = $data_pinjam['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="button">
                <?php
                if($data_pinjam['status'] == 'P'){
                ?>
                <a href="proses-pinjam.php?id_peminjaman=<?=$data_pinjam['id_peminjaman']?>&&status=A" class="btn btn-acc">
                <i class='bx bx-check icon'></i><span>Terima</span>
                </a>
                <a href="proses-pinjam.php?id_peminjaman=<?=$data_pinjam['id_peminjaman']?>&&status=R" class="btn btn-reject">
                <i class='bx bx-x icon'></i><span>Tolak</span>
                </a>
                <?php } ?>
            </div>
        </div>
        <?php endwhile ?>
    </section>
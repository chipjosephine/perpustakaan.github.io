<?php
    include "sidebarstaf.php";
?>

<link rel="stylesheet" type="text/css" href="databuku.css">
<section class="home">
        <div class="header-text">
            <h4>Data Buku</h4>
        </div>
        <div class="data">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>QR Code</th>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Sampul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kata Kunci</th>
                    <th>Letak</th>
                    <th>Jumlah Buku</th>
                    <th>Stok</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <tbody>
                    <?php
                        $no=0;
                        $ambildata=mysqli_query($koneksi,"select * from buku");
                        while ($tampil = mysqli_fetch_array($ambildata)){
                        $no++;
                        ?>
                        <tr>
                            <td> <?php echo $no; ?></td>
                            <td>
                                <?php
                                $kode = "perpustakaan/".$tampil['id_buku']."/".$tampil['judul_buku']."";
                                require_once('assets/phpqrcode/qrlib.php');
                                QRcode::png("$kode","kode".$no.".png","M", 2,2);
                                ?>
                                <img src="kode<?php $no ?>.png" alt="">
                            </td>
                            <?php echo "
                            <td>$tampil[id_buku]</td>
                            <td>$tampil[judul_buku]</td>
                            <td><img src='cover/$tampil[cover_buku]' width='100'/></td>
                            <td>$tampil[penulis_buku]</td>
                            <td>$tampil[penerbit]</td>
                            <td>$tampil[tahun_terbit]</td>
                            <td>$tampil[kata_kunci]</td>
                            <td>$tampil[letak]</td>
                            <td>$tampil[jumlah_buku]</td>
                            <td>$tampil[stok]</td>
                            <td><a href='?id_buku=$tampil[id_buku]'>Hapus<a/></td>
                            <td>Ubah</td>
                            " ?>
                        </tr>
                        <?php }
                    ?>
                </tbody>

            </table>
    </div>
    <div class="tombol">
            <div class="input"><a href="form-buku.php" target="_blank"><button>Tambah Data Baru</button></a></div>
        </div>
</section>
<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Data Buku</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="databuku.css">
    <link rel="stylesheet" type="text/css" href="show-entries.css">
    <script src="show-entries.js"></script>
    <script src="show-entries2.js"></script>
</head>


<section class="home">
        <div class="header-text">
            <h4>Data Buku</h4>
        </div>
        <div class="wrapper">
            <div class="data">
                <div class="tombol">
                    <div class="input"><a href="form-buku.php" target="_blank"><button>Tambah Data Baru</button></a></div>
                </div>
                <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>Anak Judul</th>
                                <th>QRCode</th>
                                <th>Sampul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Nama Sumber</th>
                                <th>Harga</th>
                                <th>Jumlah Buku</th>
                                <th>Stok</th>
                                <th>Hapus</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $ambildata=mysqli_query($koneksi,"select * from buku");
                            while ($tampil = mysqli_fetch_array($ambildata)){
                            $no++;
                            ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$tampil['id_buku']?></td>
                                    <td><?=$tampil['judul_utama']?></td>
                                    <td><?=$tampil['anak_judul']?></td>
                                    <td>
                                        <?php
                                            $kode = $tampil['id_buku']."";
                                            require_once('assets/phpqrcode/qrlib.php');
                                            QRcode::png("$kode","kode".$no.".png", "M", 2,2);
                                        ?>
                                        <img src="kode<?= $no ?>.png" alt="">
                                    </td>
                                    <td><?php echo "<img src='cover/$tampil[cover_buku]' width='100'/>"; ?></td>
                                    <td><?=$tampil['penulis_buku']?></td>
                                    <td><?=$tampil['penerbit']?></td>
                                    <td><?=$tampil['tahun_terbit']?></td>
                                    <td><?=$tampil['tgl_pengadaan']?></td>
                                    <td><?=$tampil['nama_sumber']?></td>
                                    <td><?=$tampil['harga']?></td>
                                    <td><?=$tampil['jml_buku']?></td>
                                    <td><?=$tampil['stok']?></td>
                                    <td><a href='?id_buku=$tampil[id_buku]'><i class='bx bx-message-square-x'></i></a></td>
                                    <td><a href='edit-buku.php?id_buku=$tampil[id_buku]'><i class='bx bx-edit-alt'></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                });
            </script>

            <?php
                if(isset($_GET['id_buku'])){
                    mysqli_query($koneksi, "delete from buku where id_buku='$_GET[id_buku]'"); 
                    echo "Data telah terhapus";
                    echo "<meta http-equiv=refresh content=2;URL='databuku.php'>";
                }
            ?>
        </div>
    </section>



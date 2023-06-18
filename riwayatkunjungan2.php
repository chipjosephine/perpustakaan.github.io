<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Riwayat Kunjungan Pengunjung</title>
    <link rel="stylesheet" type="text/css" href="riwayatkunjungan2.css">
    <link rel="stylesheet" type="text/css" href="show-entries.css">
    <script src="show-entries.js"></script>
    <script src="show-entries2.js"></script>
</head>

<section class="home">
    <div class="wrapper">
        <div class="header-text">
            <h4>Riwayat Kunjungan</h4>
        </div>
        <div class="data">
        <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pengunjung</th>
                        <th>Nama Pengunjung</th>
                        <th>Asal</th>
                        <th>Keperluan</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Waktu Berkunjung</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no=0;
                    $ambildata=mysqli_query($koneksi,"select * from buku_tamu_peng");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_pengunjung'] ?></td>
                            <td><?= $tampil['nama_pengunjung'] ?></td>
                            <td><?= $tampil['asal'] ?></td>
                            <td><?= $tampil['keperluan'] ?></td>
                            <td><?= $tampil['no_telp'] ?></td>
                            <td><?= $tampil['email'] ?></td>
                            <td><?= $tampil['waktu']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                });
            </script>
        </div>
    </div>
</section>
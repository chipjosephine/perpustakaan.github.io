<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Riwayat Kunjungan Anggota</title>
    <link rel="stylesheet" type="text/css" href="riwayatkunjungan.css">
    <link rel="stylesheet" type="text/css" href="show-entries.css">
    <script src="show-entries.js"></script>
    <script src="show-entries2.js"></script>
</head>

<section class="home">
    <div class="header-text">
        <h4>Riwayat Kunjungan Anggota</h4>
    </div>
    <div class="wrapper">
        <div class="data">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Kunjungan</th>
                        <th>ID Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Keperluan</th>
                        <th>Waktu Berkunjung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $ambildata=mysqli_query($koneksi,"select * from buku_tamu_ang");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_kunjungan'] ?></td>
                            <td><?= $tampil['id_anggota'] ?></td>
                            <td><?= $tampil['nama_anggota'] ?></td>
                            <td><?= $tampil['keperluan'] ?></td>
                            <td><?= $tampil['waktu_berkunjung'] ?></td>
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
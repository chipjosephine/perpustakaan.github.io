<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" type="text/css" href="dataanggota.css">
    <link rel="stylesheet" type="text/css" href="show-entries.css">
    <script src="show-entries.js"></script>
    <script src="show-entries2.js"></script>
</head>

<body>
<section class="home">
    <div class="header-text">
        <h4>Data Anggota</h4>
    </div>
    <div class="wrapper">
        <div class="data">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Anggota</th>
                        <th>Nama Anggota</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Bergabung Sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $ambildata=mysqli_query($koneksi,"select * from anggota");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_anggota'] ?></td>
                            <td><?= $tampil['nama_anggota'] ?></td>
                            <td><?= $tampil['no_telp'] ?></td>
                            <td><?= $tampil['email'] ?></td>
                            <td><?= $tampil['gabung']?></td>
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
</body>





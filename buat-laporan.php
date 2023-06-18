<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Buat Laporan</title>
    <link rel="stylesheet" type="text/css" href="buat-laporan.css">
    <link rel="stylesheet" type="text/css" href="show-entries.css">
    <script src="show-entries.js"></script>
    <script src="show-entries2.js"></script>
</head>

<body>
<section class="home">
    <div class="header-text">
        <h4>Laporan</h4>
    </div>
    <div class="wrapper">
        <form action="" method="GET">
            <div class="pilih">
                <select name="table" id="">
                    <option value="PilihLaporan">Pilih Laporan</option>
                    <option value="Peminjaman">Peminjaman</option>
                    <option value="Pengembalian">Pengembalian</option>
                    <option value="BukuTamuPengunjung">Buku Tamu Pengunjung</option>
                    <option value="BukuTamuAnggota">Buku Tamu Anggota</option>
                    <option value="Buku">Buku</option>
                </select>
            </div>
            <div class="waktu">
                <div class="kalender"><input type="date" name="dari_tgl" id="tgl_awal"></div>
                <div class="kalender"><input type="date" name="sampai_tgl" id="tgl_akhir"></div>
                <input type="submit" value="Tampilkan Data" name="proses">
            </div>
        </form>

        <?php
        if(isset($_GET['proses'])){
            $tgl1 = $_GET['dari_tgl'];
            $tgl2 = $_GET['sampai_tgl'];
            $table = $_GET['table'];
        }
        else{
            $table = '';
        }
        ?>

        <?php
        if($table == "PilihLaporan"){
        ?>
        <div class="notif">
            Pilih Laporan Yang Ingin Dicetak
        </div>
        <?php } ?>
    
        <?php
        if($table == "Peminjaman"){
        ?>
        <div class="data">
            <div class="title">Laporan Peminjaman</div>
            <div class="date">Dari tanggal <?=$tgl1;?> sampai <?=$tgl2;?></div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>ID Anggota</th>
                        <th>Nama Anggota</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $ambildata = mysqli_query($koneksi, "SELECT * from peminjaman where tgl_pinjam between '$tgl1' and '$tgl2'");
                        while ($tampil = mysqli_fetch_array($ambildata)){
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_peminjaman'] ?></td>
                            <td><?= $tampil['id_anggota'] ?></td>
                            <td><?= $tampil['nama_anggota'] ?></td>
                            <td><?= $tampil['id_buku'] ?></td>
                            <td><?= $tampil['judul_buku'] ?></td>
                            <td><?= $tampil['tgl_pinjam']?></td>
                            <td><?= $tampil['tgl_kembali']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                });
            </script>
            <div class="print">
                <?php
                $today = date('d m Y');
                ?>
                Dicetak Tanggal : <?=$today;?>
            </div>
        </div>
        <?php } ?>

        <?php
        if($table == "Pengembalian"){
        ?>
        <div class="data">
            <div class="title">Laporan Pengembalian</div>
            <div class="date">Tanggal <?=$tgl1;?> Sampai <?=$tgl2;?></div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pengembalian</th>
                        <th>ID Anggota</th>
                        <th>Nama Anggota</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $ambildata = mysqli_query($koneksi, "SELECT * from pengembalian where tgl_kembali between '$tgl1' and '$tgl2'");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_pengembalian'] ?></td>
                            <td><?= $tampil['id_anggota'] ?></td>
                            <td><?= $tampil['nama_anggota'] ?></td>
                            <td><?= $tampil['id_buku'] ?></td>
                            <td><?= $tampil['judul_buku'] ?></td>
                            <td><?= $tampil['tgl_kembali']?></td>
                            <td><?= $tampil['denda']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                });
            </script>
            <div class="print">
                <?php
                $today = date('l, d M Y');
                ?>
                Dicetak Tanggal <?=$today;?>
            </div>
        </div>
        <?php } ?>

        <?php
        if($table == "BukuTamuPengunjung"){
        ?>
        <div class="data">
            <div class="title">Laporan Jumlah Pengunjung</div>
            <div class="date">Tanggal <?=$tgl1;?> Sampai <?=$tgl2;?></div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pengunjung</th>
                        <th>Asal</th>
                        <th>Keperluan</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Waktu Berkunjung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $ambildata = mysqli_query($koneksi, "SELECT * from buku_tamu_peng where waktu between '$tgl1' and '$tgl2'");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_pengunjung'] ?></td>
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
            <div class="print">
                <?php
                $today = date('l, d M Y');
                ?>
                Dicetak Tanggal <?=$today;?>
            </div>
        </div>
        <?php } ?>

        <?php
        if($table == "BukuTamuAnggota"){
        ?>
        <div class="data">
            <div class="title">Laporan Jumlah Kunjungan Anggota</div>
            <div class="date">Tanggal <?=$tgl1;?> Sampai <?=$tgl2;?></div>
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
                    $ambildata = mysqli_query($koneksi, "SELECT * from buku_tamu_ang where waktu_berkunjung between '$tgl1' and '$tgl2'");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampil['id_kunjungan'] ?></td>
                            <td><?= $tampil['id_anggota'] ?></td>
                            <td><?= $tampil['nama_anggota'] ?></td>
                            <td><?= $tampil['keperluan'] ?></td>
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
            <div class="print">
                <?php
                $today = date('l, d M Y');
                ?>
                Dicetak Tanggal <?=$today;?>
            </div>
        </div>
        <?php } ?>

        <?php
        if($table == "Buku"){
        ?>
        <div class="data">
            <div class="title">Laporan Buku</div>
            <div class="date">Tanggal <?=$tgl1;?> Sampai <?=$tgl2;?></div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>No. DDC</th>
                        <th>No. Induk</th>
                        <th>Topic Subject</th>
                        <th>Tanggal Pengadaan</th>
                        <th>Nama Sumber</th>
                        <th>Harga</th>
                        <th>Jumlah Buku</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $ambildata = mysqli_query($koneksi, "SELECT * from buku where tgl_pengadaan between '$tgl1' and '$tgl2'");
                    while ($tampil = mysqli_fetch_array($ambildata)){
                    $no++;
                    ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$tampil['id_buku']?></td>
                            <td><?=$tampil['judul_buku']?></td>
                            <td><?=$tampil['penulis_buku']?></td>
                            <td><?=$tampil['penerbit']?></td>
                            <td><?=$tampil['tahun_terbit']?></td>
                            <td><?=$tampil['no_ddc']?></td>
                            <td><?=$tampil['no_induk']?></td>
                            <td><?=$tampil['subject']?></td>
                            <td><?=$tampil['tgl_pengadaan']?></td>
                            <td><?=$tampil['nama_sumber']?></td>
                            <td><?=$tampil['harga']?></td>
                            <td><?=$tampil['jml_buku']?></td>
                            <td><?=$tampil['stok']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function () {
                $('#example').DataTable();
                });
            </script>
            <div class="print">
                <?php
                $today = date('l, d M Y');
                ?>
                Dicetak Tanggal <?=$today;?>
            </div>
        </div>
        <?php } ?>


    </div>
</section>
</body>

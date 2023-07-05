<?php
include "sidebarstaf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" type = "text/css" href="form-buku.css">
</head>
<body>
<section class="home">
        <h3> Tambah Data Buku </h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label>ID Buku</label>
                <input type="text" placeholder="Masukkan ID Buku" name="id_buku" required>
            </div>
            <div class="input-box">
                <label>Kode Klasifikasi</label>
                <select name="kode_klasifikasi" id="kode_klasifikasi">
                    <?php
                    $kode_klasifikasi= mysqli_query($koneksi, "select * from klasifikasi");
                    while($ambilklas= mysqli_fetch_array($kode_klasifikasi)) :
                    ?>
                    <option value="<?php echo $ambilklas['kode_klasifikasi']?>"><?php echo $ambilklas['kode_klasifikasi'], "-", $ambilklas['subject']?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="input-box">
                <label>Judul Utama Buku</label>
                <input type="text" placeholder="Masukkan Judul Utama" name="judul_utama" required>
            </div>
            <div class="input-box">
                <label>Anak Judul</label>
                <input type="text" placeholder="Masukkan Anak Judul" name="anak_judul">
            </div>
            <div class="input-box">
                <label>Cover Buku</label>
                <input type="file" name="cover_buku" required>
            </div>
            <div class="input-box">
                <label>Penulis Buku</label>
                <input type="text" placeholder="Masukkan Nama Penulis" name="penulis_buku" required>
            </div>
            <div class="input-box">
                <label>Penerbit</label>
                <input type="text" placeholder="Masukkan Nama Penerbit" name="penerbit" required>
            </div>
            <div class="input-box">
                <label>Tahun Terbit</label>
                <input type="text" placeholder="Masukkan Tahun Terbit" name="tahun_terbit" required>
            </div>
            <div class="input-box">
                <label>Tanggal Pengadaan</label>
                <input type="text" placeholder="Format Tanggal (yyyy-mm-dd)" name="tgl_pengadaan" required>
            </div>
            <div class="input-box">
                <label>Nama Sumber</label>
                <input type="text" placeholder="Masukkan Nama Sumber" name="nama_sumber" required>
            </div>
            <div class="input-box">
                <label>Harga</label>
                <input type="text" placeholder="Masukkan harga (format : 10000)" name="harga" required>
            </div>
            <div class="input-box">
                <label>Jumlah Buku</label>
                <input type="text" placeholder="Masukkan Jumlah Buku" name="jml_buku" required>
            </div>
            <div class="input-box">
                <label>Stok</label>
                <input type="text" placeholder="Masukkan Stok Buku" name="stok" required>
            </div>
            <div class="input-box"><label class="lokasi">Lokasi</label></div>
            <div class="input-box">
                <label>Lantai</label>
                <input type="text" placeholder="Terletak di lantai ..." name="lantai" required>
            </div>
            <div class="input-box">
                <label>Rak</label>
                <input type="text" placeholder="Terletak di rak ..." name="rak" required>
            </div>
            <div class="input-box">
                <label>Sisi</label>
                <input type="text" placeholder="Terletak di sisi ..." name="sisi" required>
            </div>
            <div class="input-box">
                <label>Susun</label>
                <input type="text" placeholder="Terletak pada susunan rak ke ..." name="susun" required>
            </div>
            <input class="submit" type="submit" value="Simpan" name="proses">
        </form>

        <?php
        include "koneksi.php";
        if(isset($_POST['proses'])){
            $direktori = "cover/";
            $file_name = $_FILES['cover_buku']['name'];
            move_uploaded_file($_FILES['cover_buku']['tmp_name'],$direktori.$file_name);

            mysqli_query($koneksi, "insert into buku set
            id_buku = '$_POST[id_buku]',
            kode_klasifikasi = '$_POST[kode_klasifikasi]',
            judul_utama = '$_POST[judul_utama]',
            anak_judul = '$_POST[anak_judul]',
            cover_buku = '$file_name',
            penulis_buku = '$_POST[penulis_buku]',
            penerbit = '$_POST[penerbit]',
            tahun_terbit = '$_POST[tahun_terbit]',
            tgl_pengadaan = '$_POST[tgl_pengadaan]',
            nama_sumber = '$_POST[nama_sumber]',
            harga = '$_POST[harga]',
            jml_buku = '$_POST[jml_buku]',
            stok = '$_POST[stok]',
            lantai = '$_POST[lantai]',
            rak = '$_POST[rak]',
            sisi = '$_POST[sisi]',
            susun = '$_POST[susun]'");
        }
        ?>
    </section>
</body>
</html>
<?php
include "sidebarstaf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" type = "text/css" href="edit-buku.css">
</head>
<body>
    <section class="home">
        <h3> Edit Data Buku </h3>

    <?php
    $sql=mysqli_query($koneksi, "select * from buku where id_buku='$_GET[id_buku]'");
    $data = mysqli_fetch_array($sql);
    ?>

    <form action="" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <label>ID Buku</label>
                    <input type="text" name="id_buku" value="<?=$data['id_buku']; ?>">
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
                    <input type="text" name="judul_utama" value="<?=$data['judul_utama']; ?>">
                </div>
                <div class="input-box">
                    <label>Anak Judul</label>
                    <input type="text" name="anak_judul" value="<?=$data['anak_judul']; ?>">
                </div>
                <div class="input-box">
                    <label>Cover Buku</label>
                    <input type="file" name="cover_buku" value="<?=$data['cover_buku']; ?>">
                </div>
                <div class="input-box">
                    <label>Penulis Buku</label>
                    <input type="text" name="penulis_buku" value="<?=$data['penulis_buku']; ?>">
                </div>
                <div class="input-box">
                    <label>Penerbit</label>
                    <input type="text"name="penerbit" value="<?=$data['penerbit']; ?>">
                </div>
                <div class="input-box">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" value="<?=$data['tahun_terbit']; ?>">
                </div>
                <div class="input-box">
                    <label>Tanggal Pengadaan</label>
                    <input type="text" name="tgl_pengadaan" value="<?=$data['tgl_pengadaan'];?>">
                </div>
                <div class="input-box">
                    <label>Nama Sumber</label>
                    <input type="text" name="nama_sumber" value="<?=$data['nama_sumber']; ?>">
                </div>
                <div class="input-box">
                    <label>Harga</label>
                    <input type="text" name="harga" value="<?=$data['harga']; ?>">
                </div>
                <div class="input-box">
                    <label>Jumlah Buku</label>
                    <input type="text" name="jml_buku" value="<?=$data['jml_buku']; ?>">
                </div>
                <div class="input-box">
                    <label>Stok</label>
                    <input type="text" name="stok" value="<?=$data['stok']; ?>">
                </div>
                <div class="input-box"><label class="lokasi">Lokasi</label></div>
                <div class="input-box">
                    <label>Lantai</label>
                    <input type="text" name="lantai" value="<?=$data['lantai']; ?>">
                </div>
                <div class="input-box">
                    <label>Rak</label>
                    <input type="text" name="rak" value="<?=$data['rak']; ?>">
                </div>
                <div class="input-box">
                    <label>Sisi</label>
                    <input type="text" name="sisi" value="<?=$data['sisi']; ?>">
                </div>
                <div class="input-box">
                    <label>Susun</label>
                    <input type="text" name="susun" value="<?=$data['susun']; ?>">
                </div>
                <input class="submit" type="submit" value="Simpan" name="proses">
            </form>
            <?php
            include "koneksi.php";
            if(isset($_POST['proses'])){
                $direktori = "cover/";
                $file_name = $_FILES['cover_buku']['name'];
                move_uploaded_file($_FILES['cover_buku']['tmp_name'],$direktori.$file_name);

                mysqli_query($koneksi, "update buku set
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
                susun = '$_POST[susun]' where id_buku = '$_GET[id_buku]'");

                echo "<meta http-equiv=refresh content=0;URL='databuku.php'>";
            }
            ?>
    </section>
</body>
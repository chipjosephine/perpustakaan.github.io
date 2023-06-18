<?php
include "sidebarstaf.php";
?>

<link rel="stylesheet" type = "text/css" href="form-buku.css">
<head>
    <title>Form Buku</title>
</head>
<h3> Tambah Data Buku </h3>

<form action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td width="180">ID Buku</td>
                <td><input type="text" name="id_buku"></td>
            </tr>
            <tr>
                <td>No Klasifikasi</td>
                <td>
                    <select name="kode_klasifikasi" id="kode_klasifikasi">
                        <?php
                        $kode_klasifikasi= mysqli_query($koneksi, "select * from klasifikasi");
                        while($ambilklas= mysqli_fetch_array($kode_klasifikasi)) :
                        ?>
                        <option value="<?php echo $ambilklas['kode_klasifikasi']?>"><?php echo $ambilklas['kode_klasifikasi'], "-", $ambilklas['subject']?></option>
                        <?php endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Judul Utama</td>
                <td><input type="text" name="judul_utama"></td>
            </tr>
            <tr>
                <td>Anak Judul</td>
                <td><input type="text" name="anak_judul"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="cover_buku"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis_buku"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit"></td>
            </tr>
            <tr>
                <td>Tanggal Pengadaan</td>
                <td><input type="text" name="tgl_pengadaan"></td>
            </tr>
            <tr>
                <td>Nama Sumber</td>
                <td><input type="text" name="nama_sumber"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Jumlah Buku</td>
                <td><input type="text" name="jml_buku"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td>Lantai</td>
                <td><input type="text" name="lantai"></td>
            </tr>
            <tr>
                <td>Rak</td>
                <td><input type="text" name="rak"></td>
            </tr>
            <tr>
                <td>Susun Ke</td>
                <td><input type="text" name="susun"></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="input" type="submit" value="Simpan" name="proses"></td>
            </tr>
     </table>
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
    cover_buku = '$file_name',
    penulis_buku = '$_POST[penulis_buku]',
    penerbit = '$_POST[penerbit]',
    tahun_terbit = '$_POST[tahun_terbit]',
    tgl_pengadaan = '$_POST[tgl_pengadaan]',
    nama_sumber = '$_POST[nama_sumber]',
    harga = '$_POST[harga]',
    jml_buku = '$_POST[jml_buku]',
    lantai = '$_POST[lantai]',
    rak = '$_POST[rak]',
    susun = '$_POST[susun]'");
}

else{
    echo "Gagal";
}
?>
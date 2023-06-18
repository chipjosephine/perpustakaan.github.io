<link rel="stylesheet" type = "text/css" href="edit-buku.css">

<head>
    <title>Edit Buku</title>
</head>

<h3> Edit Buku </h3>

<?php
include "koneksi.php";
$sql=mysqli_query($koneksi, "select * from buku where id_buku='$_GET[id_buku]'");
$data = mysqli_fetch_array($sql);
?>

<form action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>Judul Buku</td>
                <td><input type="text" name="judul_buku" value = "<?php echo $data['judul_buku']; ?>"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="cover_buku" value = "<?php echo $data['cover_buku']; ?>"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis_buku" value = "<?php echo $data['penulis_buku']; ?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value = "<?php echo $data['penerbit']; ?>"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit" value = "<?php echo $data['tahun_terbit']; ?>"></td>
            </tr>
            <tr>
                <td>Kata Kunci</td>
                <td><input type="text" name="kata_kunci" value = "<?php echo $data['kata_kunci']; ?>"></td>
            </tr>
            <tr>
                <td>Letak</td>
                <td><input type="text" name="letak" value = "<?php echo $data['letak']; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah Buku</td>
                <td><input type="text" name="jumlah_buku" value = "<?php echo $data['jumlah_buku']; ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value = "<?php echo $data['stok']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses"></td>
            </tr>
     </table>
</form>

<?php

if(isset($_POST['proses'])){
    $direktori = "cover/";
    $file_name = $_FILES['cover_buku']['name'];
    move_uploaded_file($_FILES['cover_buku']['tmp_name'],$direktori.$file_name);

    mysqli_query($koneksi, "update buku set
    judul_buku = '$_POST[judul_buku]',
    cover_buku = '$file_name',
    penulis_buku = '$_POST[penulis_buku]',
    penerbit = '$_POST[penerbit]',
    tahun_terbit = '$_POST[tahun_terbit]',
    kata_kunci = '$_POST[kata_kunci]',
    letak = '$_POST[letak]',
    jumlah_buku = '$_POST[jumlah_buku]',
    stok = '$_POST[stok]'
    where id_buku = '$_GET[id_buku]'");

    echo "<meta http-equiv=refresh content=0;URL='databuku.php'>";
}

else{
    echo "Gagal";
}
?>
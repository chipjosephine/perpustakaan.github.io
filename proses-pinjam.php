<?php
include "koneksi.php";
$id = $_GET['id_peminjaman'];
$s = $_GET['status'];

if($_GET['status'] == 'R'){
    $query = mysqli_query($koneksi, "update peminjaman set status = '$s' where id_peminjaman = '$id'");
    if($query){
        $data_pinjam = mysqli_query($koneksi, "select * from peminjaman where id_peminjaman = '$id'");
        $pinjam = mysqli_fetch_array($data_pinjam);
        $buku = mysqli_query($koneksi, "select * from buku where id_buku = '$pinjam[id_buku]'");
        $data_buku = mysqli_fetch_array($buku);
        $stok = $data_buku['stok'] + 1;
        $tambah = mysqli_query($koneksi, "update buku set stok = '$stok' where id_buku = '$data_buku[id_buku]'");
        header('location: pinjamstaf.php');
    }else{
        echo"<script>alert('gagal');window.location='pinjamstaf.php'</script>";
    }
}
elseif($_GET['status'] == 'A'){
    $query = mysqli_query($koneksi, "update peminjaman set status = '$s' where id_peminjaman = '$id'");
    if($query){
        header('location: pinjamstaf.php');
    }else{
        echo"<script>alert('gagal');window.location='pinjamstaf.php'</script>";
    }
}
?>
<?php
include "koneksi.php";
$id = $_GET['id_pengembalian'];
$s = $_GET['status'];

$kembali = mysqli_query($koneksi, "select * from pengembalian where id_pengembalian = '$id'");
$fetchk = mysqli_fetch_array($kembali);

$pinjam = mysqli_query($koneksi, "select * from peminjaman");
$fetch = mysqli_fetch_array($pinjam);

if($_GET['status'] == 'R'){
    $query = mysqli_query($koneksi, "update pengembalian set status = '$s' where id_pengembalian = '$id'");
    if($query){
        $update = mysqli_query($koneksi, "update peminjaman set status = 'A' where id_buku = '$fetchk[id_buku]'");
        $update_cek = mysqli_fetch_array($update);
        header('location: pengembalianstaf.php');
    }else{
        echo"<script>alert('gagal');window.location='pengembalianstaf.php'</script>";
    }
}
elseif($_GET['status'] == 'K'){
    $query = mysqli_query($koneksi, "update pengembalian set status = '$s' where id_pengembalian = '$id'");
    if($query){
        $data_kembali = mysqli_query($koneksi, "select * from pengembalian where id_pengembalian = '$id'");
        $kembali = mysqli_fetch_array($data_kembali);
        $buku = mysqli_query($koneksi, "select * from buku where id_buku = '$kembali[id_buku]'");
        $data_buku = mysqli_fetch_array($buku);
        $stok = $data_buku['stok'] + 1;
        $tambah = mysqli_query($koneksi, "update buku set stok = '$stok' where id_buku = '$data_buku[id_buku]'");
        header('location: pengembalianstaf.php');
    }else{
        echo"<script>alert('gagal');window.location='pengembalianstaf2.php'</script>";
    }
}
?>
<?php
include "koneksi.php";
include "session-anggota.php";

    if(@$_SESSION['username'] AND $_POST['text']){
        $user_terlogin = @$_SESSION['username'];
        $ambil_data=$_POST['text'];

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
        $buku = mysqli_query($koneksi,"select * from buku where id_buku = '$ambil_data'");
        $data_buku = mysqli_fetch_array($buku);

        $stok = $data_buku['stok'] - 1;
        $stok = $data_buku['stok'] - 1;
        $query = mysqli_query($koneksi, "update buku set stok = '$stok' where id_buku = '$ambil_data'");

        $pinjam     = date("Y-m-d");
        $tujuh_hari = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
        $kembali    = date("Y-m-d", $tujuh_hari);

        $sql=mysqli_query($koneksi, "select * from peminjaman");
        $data = mysqli_fetch_array($sql);
        mysqli_query($koneksi, "insert into peminjaman set
        id_anggota = '$data_user[id_anggota]',
        nama_anggota = '$data_user[nama_anggota]',
        id_buku = '$data_buku[id_buku]',
        judul_utama = '$data_buku[judul_utama]',
        anak_judul = '$data_buku[anak_judul]',
        tgl_pinjam = '$pinjam',
        tgl_kembali = '$kembali'");
        
        echo "<meta http-equiv=refresh content=0;URL='peminjaman%20anggota.php'>";
    }

    
?>

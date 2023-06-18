<link rel="stylesheet" type="text/css" href="konfirm-pengembalian.css">

<?php
include "sidebaranggota.php";

    if(@$_SESSION['username'] AND $_GET["id_buku"]){
        $user_terlogin = @$_SESSION['username'];
        $ambil_data=$_GET["id_buku"];}

        $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
        $data_user = mysqli_fetch_array($sql_user);
        $pinjam = mysqli_query($koneksi,"select * from peminjaman where id_anggota='$data_user[id_anggota]' and id_buku='$ambil_data'");
        $data_pinjam = mysqli_fetch_array($pinjam);
?>
<section class="home">
    <div class="wrapper">
    <h4>Konfirmasi Pengembalian</h4>
    <form method="post">
        <div class="txt_field">
            <input type="text" name="id_anggota" value="<?=$data_user['id_anggota']?>">
            <span></span>
            <label> ID Anggota</label>
        </div>
        <div class="txt_field">
            <input type="text" name="nama_anggota" value="<?=$data_user['nama_anggota']?>">
            <span></span>
            <label> Nama Anggota</label>
        </div>
        <div class="txt_field">
            <input type="text" name="id_buku" value="<?=$data_pinjam['id_buku']?>">
            <span></span>
            <label> ID Buku</label>
        </div>
        <div class="txt_field">
            <input type="text" name="judul_utama" value="<?=$data_pinjam['judul_utama']?>">
            <span></span>
            <label> Judul Utama</label>
        </div>
        <div class="txt_field">
            <input type="text" name="anak_judul" value="<?=$data_pinjam['anak_judul']?>">
            <span></span>
            <label>Anak Judul</label>
        </div>
        <div class="txt_field">
            <input type="text" name="tgl_pinjam" value="<?php
                            $date = $data_pinjam['tgl_pinjam']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?>">
            <span></span>
            <label> Tanggal Pinjam</label>
        </div>
        <div class="txt_field">
            <input type="text" name="tgl_kembali" value="<?php
                            $date = $data_pinjam['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?>">
            <span></span>
            <label> Tanggal Kembali</label>
        </div>
                <?php
                $today = date("Y-m-d");
                $day = strtotime(date('Y-m-d'));
                $kembali = strtotime($data_pinjam['tgl_kembali']);
                $terlambat = $day - $kembali;
                $hari = $terlambat / 60 / 60 / 24;
                $denda = $hari * 1000;
                ?>
        <div class="txt_field">
            <input type="text" name="terlambat" value="<?php
            if($hari > 0){
                echo $hari, "hari";
            }elseif($hari < 0){
                echo "Tidak Terlambat";
            }
            ?>">
            <span></span>
            <label>Terlambat</label>
        </div>
        <div class="txt_field">
            <input type="text" name="denda" value="<?php
            if($hari > 0){
                echo number_format($denda,0,',','.');
            }elseif($hari < 0){
                echo number_format(0,0,',','.');
            }
            ?>">
            <span></span>
            <label>Denda</label>
        </div>
        <input type="submit" value="Kembalikan" name="proses">
    </form>
    <?php
    include "koneksi.php";
    $sql=mysqli_query($koneksi, "select * from pengembalian");
    $data = mysqli_fetch_array($sql);
    if(isset($_POST['proses'])){
        if($denda>0){
        mysqli_query($koneksi, "insert into pengembalian set
        id_anggota = '$_POST[id_anggota]',
        nama_anggota = '$_POST[nama_anggota]',
        id_buku = '$_POST[id_buku]',
        judul_utama = '$_POST[judul_utama]',
        anak_judul = '$_POST[anak_judul]',
        tgl_kembali = '$today',
        denda = '$denda'");

        mysqli_query($koneksi, "update peminjaman set
        status='K'
        where id_anggota = '$_POST[id_anggota]' and id_buku = '$_POST[id_buku]'");
        }
        elseif($denda<0){
            mysqli_query($koneksi, "insert into pengembalian set
            id_anggota = '$_POST[id_anggota]',
            nama_anggota = '$_POST[nama_anggota]',
            id_buku = '$_POST[id_buku]',
            judul_utama = '$_POST[judul_utama]',
            anak_judul = '$_POST[anak_judul]',
            tgl_kembali = '$today',
            denda = '0'");

            mysqli_query($koneksi, "update peminjaman set
            status='K'
            where id_anggota = '$_POST[id_anggota]' and id_buku = '$_POST[id_buku]'");
        }

        echo "<meta http-equiv=refresh content=0;URL='pengembalian%20anggota.php'>";
    }
    ?>
    </div>
</section>
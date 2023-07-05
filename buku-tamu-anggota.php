<?php
include "koneksi.php";
include "session-anggota.php";
if(@$_SESSION['username']){
    $user_terlogin = @$_SESSION['username'];
}
$sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
$data_user = mysqli_fetch_array($sql_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Anggota</title>
    <link rel="stylesheet" type="text/css" href="bukutamu.css">
</head>
<body>
    <div class="buku-tamu">
        <div class="wrapper">
            <div class="header"><h2>Buku Tamu</h2></div>
            <div class="tanggal">
            <?php
                $day   = date('l');
                $today = date("Y-m-d");
                ?>
                <form method="post">
                    <input type="text" value = "<?=$day. ", " .$today?>" style="opacity: 0;">
                </form></div>
            <form method="post">
            <div class="txt_field">
                    <input type="text" name="id_anggota" value = "<?php echo $data_user['id_anggota']; ?>" name="id_pengunjung" required>
                    <span></span>
                    <label>ID Anggota</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="nama_anggota" value = "<?php echo $data_user['nama_anggota']; ?>" name="nama_pengunjung" required>
                    <span></span>
                    <label>Nama</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="keperluan" required>
                    <span></span>
                    <label>Keperluan</label>
                </div>
                <input type="submit" value="Submit" name="proses">
            </form>

            <?php
                if(isset($_POST['proses'])){
                    mysqli_query($koneksi, "insert into buku_tamu_ang set
                    id_anggota = '$_POST[id_anggota]',
                    nama_anggota = '$_POST[nama_anggota]',
                    keperluan = '$_POST[keperluan]',
                    hari = '$day'");

                    echo "<meta http-equiv=refresh content=0;URL='riwayat.php'>";
                }
                ?>
        </div>
    </div>
</body>
</html>
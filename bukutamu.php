<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" type="text/css" href="bukutamu.css">
</head>
<body>
    <div class="buku-tamu">
        <div class="wrapper">
            <h2>Buku Tamu</h2>
                <?php
                $day   = date('l');
                $today = date("Y-m-d");
                ?>
                <form method="post">
                    <input type="text" value = "<?=$day. ", " .$today?>" style="opacity: 0;">
                </form>
                <form method="post">
                <div class="txt_field">
                    <input type="text" name="nama_pengunjung" required>
                    <span></span>
                    <label>Nama</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="asal" required>
                    <span></span>
                    <label>Asal Instansi</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="no_telp" required>
                    <span></span>
                    <label>No Telepon</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="keperluan" required>
                    <span></span>
                    <label>Keperluan</label>
                </div>
                <input type="submit" value="Submit" name="proses">
            </form>

            <?php
                include "koneksi.php";
                if(isset($_POST['proses'])){
                    mysqli_query($koneksi, "insert into buku_tamu_peng set
                    nama_pengunjung = '$_POST[nama_pengunjung]',
                    asal = '$_POST[asal]',
                    email = '$_POST[email]',
                    no_telp = '$_POST[no_telp]',
                    keperluan = '$_POST[keperluan]',
                    hari = '$day'");

                    echo "<meta http-equiv=refresh content=0;URL='index.php'>";
                }
                ?>
        </div>
    </div>
</body>
</html>
<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Details</h1>
    <?php
    if($_GET["id_buku"]){
        $tampil=$_GET["id_buku"];
    }
    $sql_buku = mysqli_query($koneksi,"select * from buku where id_buku = '$tampil'");
    $data_buku = mysqli_fetch_array($sql_buku);
    ?>
    <div class="popup">
        <div class="popup__content">
        <table>            
            <tr>
                <td></td>
                <td><?php echo "<img src='cover/$data_buku[cover_buku]' width='200' height='300'/>" ;?></td>
                <td></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>:</td>
                <td><?php echo $data_buku['judul_buku'];?></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>:</td>
                <td><?php echo $data_buku['penulis_buku'];?></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><?php echo $data_buku['penerbit'];?></td>
            </tr>
            <tr>
                <td>No. DDC</td>
                <td>:</td>
                <td><?php echo $data_buku['no_ddc'];?></td>
            </tr>
            <tr>
                <td>Topik</td>
                <td>:</td>
                <td><?php echo $data_buku['subject'];?></td>
            </tr>
     </table>
        </div>
    </div>

</body>
</html>
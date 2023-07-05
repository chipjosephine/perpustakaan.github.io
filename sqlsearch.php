<?php
include "sidebaranggota.php";
include "koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="search.css">
<div class="home">
    <div class="header-text">
        <h1>HASIL PENCARIAN</h1>
    </div>
    <div class="result">
        <?php    
        $hasil = mysqli_query($koneksi, "select * from buku");
        $array = array();
        while ($data=mysqli_fetch_array($hasil)){
            $array[] = $data;
        }
        $cari = $_GET['cari'];
        for($i=0; $i < count($array); $i++){
            if ($array[$i]['judul_utama'] == $cari){
                $judul = $array[$i]['judul_utama'];
                $query=mysqli_query($koneksi, "select * from buku where judul_utama like '%".$judul."%'");
                
            }
        }
        while($row=mysqli_fetch_array($query)):
        ?>
        <div class="item">
                <span class="cover">
                    <?php echo "<img src='cover/$row[cover_buku]' width='100' />"; ?>
                </span>
                <div class="txt keterangan">
                    <table>
                        <tr>
                            <td>Judul utama</td>
                            <td>:</td>
                            <td><span class="judul"><?= $row['judul_utama'];?></span></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><span class="penulis"><?= $row['penulis_buku'];?></span></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td><span class="penerbit"><?= $row['penerbit'];?></span></td>
                        </tr>
                        <tr>
                            <td width="100">Topic Subject</td>
                            <td  width="10">:</td>
                            <td width="200"><span class="subject"><?= $row['subject'];?></span></td>
                        </tr>
                    </table>
                </div>
                <a href="konfirm-buku.php?id_buku=<?=$row['id_buku'];?>"><button>Pinjam</button></a>
        </div>
        <?php
        endwhile;
        ?>
    </div>
</div>
    
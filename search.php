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
        function binarySearch(Array $arr, $key){
            if(count($arr) === 0)
            return false;
            $low = 0;
            $high = count($arr)-1;

            while($low <= $high){
                $mid = floor(($low+$high)/2);

                if($key == $arr[$mid]){
                    return true;
                }

                if($key < $arr[$mid]){
                    $high = $mid-1;
                }else{
                    $low = $mid+1;
                }
            }
            return false;
        }

        $data_buku = mysqli_query($koneksi, "SELECT *
        FROM buku
        INNER JOIN klasifikasi
        ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi");
        $buku = mysqli_fetch_array($data_buku);
        $urutkan = sort($buku);
        $data_arr = array($urutkan);
        $cari = $_GET['cari'];

        if(binarySearch($data_arr, $cari)){
            $hasil = mysqli_query($koneksi, "SELECT *
            FROM buku
            INNER JOIN klasifikasi
            ON buku.kode_klasifikasi = klasifikasi.kode_klasifikasi
            WHERE judul_utama LIKE '%".$cari."%' or subject like '%".$cari."%'");
            while($row = mysqli_fetch_array($hasil)) : ?>
                <div class="item">
                    <div class="cover">
                        <?php echo "<img src='cover/$row[cover_buku]' width='170' height='250' />"; ?>
                    </div>
                    <div class="subject"><?= $row['subject'];?><h1><?= $row['stok'];?> buku tersedia</h1></div>
                    <div class="txt keterangan">
                        <div class="judul">
                            <div class="id_buku"><?= $row['id_buku'];?></div>
                            <div class="judul_utama"><?= $row['judul_utama'];?></div>
                            <div class="anak_judul"><?= $row['anak_judul'];?></div>
                        </div>
                        <div class="penulis">oleh <?= $row['penulis_buku'];?></div>
                        <div class="lokasi">
                            <h1>Lokasi Buku</h1>
                            <table>
                                <tr>
                                    <td>Lantai</td>
                                    <td>:</td>
                                    <td><?= $row['lantai'];?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td>:</td>
                                    <td><?= $row['rak'];?></td>
                                </tr>
                                <tr>
                                    <td>Sisi</td>
                                    <td>:</td>
                                    <td><?= $row['sisi'];?></td>
                                </tr>
                                <tr>
                                    <td>Susunan ke-</td>
                                    <td>:</td>
                                    <td><?= $row['susun'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="button">
                        <a class="tombol" href="scanner.php?id_buku=<?=$row['id_buku'];?>"><span>Pinjam</span><i></i></a>
                    </div>
                </div>
        <?php
            endwhile;
        }else{
            echo "Gagal";
        }
        ?>
    </div>
</div>

    
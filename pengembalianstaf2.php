<?php
    include "sidebarstaf.php";
?>

<head>
    <title>Pengembalian</title>
</head>

<link rel="stylesheet" type="text/css" href="pengembalianstaf2.css">

    <section class="home">
        <div class="header-text">
            <h4>Pengembalian</h4>
        </div>
        <ul class="nav">
            <li><a href="pengembalianstaf.php" >Request Pengembalian</a></li>
            <li><a href="pengembalianstaf2.php" class="active" >Riwayat Pengembalian</a></li>
        </ul>
        <?php
        $dikembalikan = mysqli_query($koneksi, "select * from pengembalian");
        while($data_kembali=mysqli_fetch_array($dikembalikan)):
        
        ?>
        <div class="ket">
            <div class="isi">
                <span class="cover">
                    <?php
                    $cover = mysqli_query($koneksi, "select * from buku where id_buku = '$data_kembali[id_buku]'");
                    $tampil = mysqli_fetch_array($cover);
                    echo "<img src='cover/$tampil[cover_buku]' width='100'/>";
                    ?>
                </span>
    
                <table>
                        <tr>
                            <td>ID Pengembalian</td>
                            <td>:</td>
                            <td><?=$data_kembali['id_pengembalian'];?></td>
                        </tr>
                        <tr>
                            <td width="150" >ID Peminjam</td>
                            <td>:</td>
                            <td><?=$data_kembali['id_anggota'];?></td>
                        </tr>
                        <tr>
                            <td width="120px" >Nama Peminjam</td>
                            <td width="10px">:</td>
                            <td><?=$data_kembali['nama_anggota'];?></td>
                        </tr>
                        <tr>
                            <td width="120">ID Buku</td>
                            <td width="10">:</td>
                            <td><?=$data_kembali['id_buku'];?></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><?=$data_kembali['judul_utama'];?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?=$data_kembali['anak_judul'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td>:</td>
                            <td>
                                <?php
                                    $data = mysqli_query($koneksi, "select * from peminjaman where id_buku = '$data_kembali[id_buku]'");
                                    $tampil = mysqli_fetch_array($data);
                                    $date = $tampil['tgl_kembali']; 
                                    $datetime = DateTime::createFromFormat('Y-m-d', $date);
                                    echo $datetime->format('d/m/Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td><?php
                            $date = $data_kembali['tgl_kembali']; 
                            $datetime = DateTime::createFromFormat('Y-m-d', $date);
                            echo $datetime->format('d/m/Y');
                            ?></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td>:</td>
                            <td><?=$data_kembali['denda'];?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                            <?php
                                if($data_kembali['status']='K'){
                                    echo "Telah Dikembalikan";
                                }
                                elseif($data_kembali['status']='R'){
                                    echo " Pengembalian Ditolak";
                                }
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </section>
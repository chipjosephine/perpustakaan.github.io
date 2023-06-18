<?php
    include "sidebaranggota.php";
    include "session-anggota.php";
?>

<link rel="stylesheet" type="text/css" href="dbanggota.css">
    <section class="home">
        <div class="text">
            <?php
                if(@$_SESSION['username']){
                    $user_terlogin = @$_SESSION['username'];
                }
                $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
                $data_user = mysqli_fetch_array($sql_user);
            ?>
            <h4>Hello, <?= $data_user['nama_anggota']; ?>!</h4>
        </div>
        <div class="header">
            <div class="check-in">
                <span class="gambar">
                    <img src="gambar/check.png" width="100" alt="" href="buku-tamu-anggota.php">
                </span>
                <div class="txt text-check">
                    <span class="satu">Catat Kunjungan <a href="buku-tamu-anggota.php" id="style-2" data-replace="Disini" class="disini"><span>Disini</span></a></span>
                    <span class="dua"><a href="riwayat.php" class="riwayat">Riwayat Kunjungan</a></span>
                </div>
            </div>

                <div class="tombol">
                    <div class="pinjam">
                        <div class="img-pinjam">
                            <span class="logo">
                                <i class='bx bx-arrow-to-top pjm'></i>
                            </span>
                        </div>
                        <span class="txt-pinjam" align="right"> <a href="scanner.php">Pinjam Buku Disini</a></span>
                    </div>

                    <div class="kembali">
                        <div class="img-kembali">
                            <span class="logo">
                                <i class='bx bx-arrow-to-bottom blk'></i>
                            </span>
                        </div>
                        <span class="txt-kembali" align="right"><a href="sedang dipinjam.php"> Kembalikan Buku Disini</a></span>
                    </div>
                </div>
            
        </div>

        <div class="warn">
            <a href="sedang dipinjam.php">
                <div class="image-warn">
                    <span class="icon">
                        <i class='bx bxs-bell icon' ></i>
                    </span>

                    <div class="ket keterangan">
                        <span class="txt-peringatan"><h5>Buku yang harus dikembalikan dalam waktu dekat</h5></span>
                        <?php
                        $pinjam = mysqli_query($koneksi, "select * from peminjaman where status='A' order by tgl_kembali asc");
                        $tampil = mysqli_fetch_array($pinjam);
                        $judul = isset($tampil['judul_utama']) ? $tampil['judul_utama'] : ' Belum Ada Buku';
                        $anak_judul = isset($tampil['anak_judul']) ? $tampil['anak_judul'] : '';
                        $kembalikan_sebelum = isset($tampil['tgl_kembali']) ? $tampil['tgl_kembali'] : '-';
                        ?>
                        <span class="judul"> Judul Buku : <span class="judul2"><?=$judul?> <?=$anak_judul?></span></span>
                        <span class="tanggal">Kembalikan Sebelum : <span class="tanggal2"><?=$kembalikan_sebelum;?></span></span>
                    </div>
                </div>
            </a>
        </div>
        <div class="katalog">
            <div class="data-buku">
                <a href="daftar-buku.php"><h3>Koleksi Bacaan</h3></a>
            </div>
            <div class="container">
                <main class="grid">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM buku order by stok desc limit 4");
                    while($row_query = mysqli_fetch_array($query)) :
                    ?>
                    <article>
                        <?php echo "<img src='cover/$row_query[cover_buku]' width='220' height='320'/>";?>
                        <div class="detail">
                            <span align='left'><h5><?=$row_query['judul_utama']?> <?=$row_query['anak_judul']?></h5></span>                            
                            <span align="left"><p>Oleh <?=$row_query['penulis_buku']?></p></span>
                            <span align="left"><a href="?id_buku=<?=$row_query['id_buku'];?>#popup"><button>Lihat Detail</button></a></span>
                        </div>
                    </article>
                    <?php endwhile ?>
                </main>
            </div>
        </div>  
        <div class="popup" id="popup">
            <div class="popup__content">
                <h1>Detail</h1>
                <a href="dbanggota.php" class="popup__close">&times;</a>
                <div class="konten">
                
                <?php
                if($_GET["id_buku"]){
                    $tampil=$_GET["id_buku"];
                }
                $sql_buku = mysqli_query($koneksi,"select * from buku where id_buku = '$tampil'");
                $data_buku = mysqli_fetch_array($sql_buku);
                ?>
                <div class="cover"><?= "<img src='cover/$data_buku[cover_buku]' width='150' height='220'/>" ;?></div>
                <span class="details"> 
                <table>
                        <tr>
                            <td>ID Buku</td>
                            <td width="10">:</td>
                            <td><?= $data_buku['id_buku'];?></td>
                        </tr>        
                        <tr>
                            <td width="85">Judul Buku</td>
                            <td width="10">:</td>
                            <td><p color="red"><?=$data_buku['judul_utama'];?></p> <?=$data_buku['anak_judul'];?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td width="10">:</td>
                            <td><?= $data_buku['penulis_buku'];?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td width="10">:</td>
                            <td><?= $data_buku['penerbit'];?></td>
                        </tr>             
                </table>
                <a href="scanner.php"><button>Pinjam</button></a>
                </span>   
                </div>
            </div>
        </div>
</section>
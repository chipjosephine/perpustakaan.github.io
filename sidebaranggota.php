<?php
    include "koneksi.php";
    include "session-anggota.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="sidebaranggota.css">
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="gambar/profile1.png" alt="">
                </span>

                <div class="text header-text">
                    <?php
                          if(@$_SESSION['username']){
                            $user_terlogin = @$_SESSION['username'];
                          }

                          $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
                          $data_user = mysqli_fetch_array($sql_user);
                        ?>
                    <span class="nama">
                        <?php echo $data_user['nama_anggota']; ?>
                    </span>
                    <span class="status">Anggota</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <div class="search-box">
                    <form class="form-search" action="search.php" method="get">
                        <i class='bx bx-search-alt ikon'></i>
                        <input type="search" placeholder="Search..." name="cari" id="cari">
                    </form>
                </div>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="dbanggota.php">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="koleksi-bacaan.php">
                            <i class='bx bx-book-reader icon'></i>
                            <span class="text nav-text">Koleksi Bacaan</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="riwayat.php">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">Riwayat Kunjungan</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="peminjaman anggota.php">
                            <i class='bx bx-up-arrow-alt icon'></i>
                            <span class="text nav-text">Peminjaman</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="pengembalian anggota.php">
                            <i class='bx bx-down-arrow-alt icon' ></i>
                            <span class="text nav-text">Pengembalian</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="logout2.php">
                        <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="script.js"></script>

</body>
</html>
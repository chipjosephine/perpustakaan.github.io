<?php
    include "koneksi.php";
    include "session-staf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="sidebarstaf.css">
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

                          $sql_user = mysqli_query($koneksi, "select * from staf where username = '$user_terlogin'");
                          $data_user = mysqli_fetch_array($sql_user);
                    ?>
                    <span class="nama"><?php echo $data_user['nama_staf']; ?></span>
                    <span class="status">Staf</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="dbstaf.php">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="pinjamstaf.php">
                            <i class='bx bx-up-arrow-alt icon'></i>
                            <span class="text nav-text">Peminjaman</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="pengembalianstaf.php">
                            <i class='bx bx-down-arrow-alt icon' ></i>
                            <span class="text nav-text">Pengembalian</span>
                        </a>
                    </li>

                    <li class="nav-sub">
                        <div class="menus">
                            <a>
                            <i class='bx bx-history icon'></i>
                                <span class="text nav-text">Kunjungan</span>
                            </a>
                            <i class='bx bxs-right-arrow arrow'></i>
                        </div>
                        <ul class="sub-menu">
                            <li class="tampil"><a href="riwayatkunjungan.php">Anggota</a></li>
                            <li class="buat"><a href="riwayatkunjungan2.php">Pengunjung</a></li>
                        </ul>
                    </li>

                    <li class="nav-link">
                        <a href="dataanggota.php">
                            <i class='bx bxs-user-badge icon'></i>
                            <span class="text nav-text">Data Anggota</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="databuku.php">
                            <i class='bx bxs-book icon'></i>
                            <span class="text nav-text">Data Buku</span>
                        </a>
                    </li>

                    <li class="nav-sub">
                        <div class="menus">
                        <a>
                            <i class='bx bxs-report icon' ></i>
                            <span class="text nav-text">Laporan</span>
                        </a>
                        <i class='bx bxs-right-arrow arrow'></i>
                        </div>
                        <ul class="sub-menu">
                            <li class="tampil"><a href="lapperpus.php">Tampil Laporan</a></li>
                            <li class="buat"><a href="buat-laporan.php">Buat Laporan</a></li>
                        </ul>
                    </li>

                    <li class="nav-link logout">
                        <a href="logout1.php">
                        <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++){
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement;
            console.log(arrowParent); 
            arrowParent.classList.toggle("showMenu")
        });
    };

    const body = document.querySelector('body'),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle");

    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    });
    </script>
</body>
</html>
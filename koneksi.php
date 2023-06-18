<?php
    $koneksi=mysqli_connect("localhost","root","","perpustakaan2.0");
    if(!$koneksi){
        echo "Koneksi Gagal";
    }

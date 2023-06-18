<?php
include "koneksi.php";
include "session-anggota.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <link rel="stylesheet" type="text/css" href="scanner.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="title">
                <?php
                if(@$_SESSION['username']){
                    $user_terlogin = @$_SESSION['username'];
                }

                    $sql_user = mysqli_query($koneksi, "select * from anggota where username = '$user_terlogin'");
                    $data_user = mysqli_fetch_array($sql_user);
                ?>
                <h1>Hello, <?=$data_user['nama_anggota'];?></h1>
                <h1>Scan Kode Buku</h1>
            </div>
            <div class="scan">
                <video id="preview"></video>
            </div>
            <div class="ket">
                <form action="konfirm-buku.php" method="post">
                    <input type="text" name="text" id="text" readonly="" placeholder="scan disini" class="input">
                </form>
            </div>
        </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else{
                alert('No cameras found');
            }
            
        }).catch(function(e){
            console.error(e);
        });

        scanner.addListener('scan', function(c){
            document.getElementById('text').value=c;
            document.forms[0].submit();
        });
    </script>
</body>
</html>
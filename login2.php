<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai Anggota</title>
    <link rel="stylesheet" type="text/css" href="login2.css">
    <script src="https://kit.fontawesome.com/c02c255c04.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page">
        <div class="layanan">
            <div class="kotak">
                <div class="isi">
                    <h2>Halo Anggota!</h2>
                    <p>Layanan Untuk Anggota</p>
                </div>
                <div class="card card1"></div>
                <div class="card card2"></div>
                <div class="card card3"></div>
                <div class="card card4"></div>
            </div>
        </div>
        <div class="login"> 
            <div class="wrap">
                <h2>Login</h2>
                <form method="post">
                    <div class="alert" id="alert">Username/Password Salah</div>
                    <div class="txt_field">
                        <input type="text" name="username" required>
                        <span></span>
                        <label> Username </label>
                    </div>
                    <div class="password">
                        <div class="txt_field">
                            <input type="password" name="password" id="myInput" required>
                            <span></span>
                            <label> Password </label>
                        </div>
                        <span class="eye" onClick="myFunction()">
                            <i id="hide1" class="fa fa-eye"></i>
                            <i id="hide2"  class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    <input type="submit" value="Login" name="proses">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include "koneksi.php";
if(isset($_POST['proses'])){
    $sql = mysqli_query($koneksi, "select * from anggota where username = '$_POST[username]' and password = '$_POST[password]'");

    $cek = mysqli_num_rows($sql);

    if($cek > 0){
        $_SESSION['username'] = $_POST['username'];
        echo "<meta http-equiv=refresh content=0;URL='dbanggota.php'>";
    }
    else{
        echo "<meta http-equiv=refresh content=1;URL='login2.php?#alert'>";
    }
}
?>

<script>
    function myFunction(){
        var x = document.getElementById("myInput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>
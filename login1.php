<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai Staf</title>
    <link rel="stylesheet" type="text/css" href="login1.css">
    <script src="jquery.js"></script>
    <script src="https://kit.fontawesome.com/c02c255c04.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="layanan">
        <div class="col">
            <div class="isi">
                <h2>Hello Staf!</h2>
                <p>Layanan Untuk Staf</p>
            </div>

            <div class="card card1">
                
            </div>
            <div class="card card2">
            
            </div>
            <div class="card card3">

            </div>
            <div class="card card4">

            </div>
        </div>

        <div class="login"> 
            <h2>Login</h2>
            <form method="post">
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
</body>
</html>

<?php
session_start();
include "koneksi.php";
if(isset($_POST['proses'])){
    $sql = mysqli_query($koneksi, "select * from staf where username = '$_POST[username]' and password = '$_POST[password]'");

    $cek = mysqli_num_rows($sql);

    if($cek > 0){
        $_SESSION['username'] = $_POST['username'];
        echo "<meta http-equiv=refresh content=0;URL='dbstaf.php'>";
    }
    else{
        echo "<p align=center><b> Username/Password Salah</b></p>";
        echo "<meta http-equiv=refresh content=2;URL='login1.php'>";
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
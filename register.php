<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="jquery.js"></script>
    <script src="https://kit.fontawesome.com/c02c255c04.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="layanan">
        <div class="col">
            <div class="isi">
                <h2>Hello!</h2>
                <p>Layanan Untuk Anggota</p>
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
            <h2>Register</h2>
            <div class="alert" id="alert">Username sudah dipakai</div>
            <form method="post">
            <div class="txt_field">
                    <input type="text" name="id_anggota" required>
                    <span></span>
                    <label> NIM</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="nama_anggota" required>
                    <span></span>
                    <label> Nama</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="ttl" required>
                    <span></span>
                    <label> Tempat, Tanggal Lahir</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="jenkel" required>
                    <span></span>
                    <label> Jenis Kelamin</label>
                </div>
                <div class="option_field">
                    <label> Fakultas</label>
                    <div class="option"><select name="fakultas" id="fakultas">
                        <?php
                        $fakultas= mysqli_query($koneksi, "select * from fakultas");
                        while($ambilfakultas= mysqli_fetch_array($fakultas)) :
                        ?>
                        <option value="<?php echo $ambilfakultas['nama_fakultas']?>"><?php echo $ambilfakultas['nama_fakultas']?></option>
                        <?php endwhile ?>
                    </select></div>
                </div>
                <div class="option_field">
                    <label> Prodi</label>
                    <div class="option"><select name="prodi" id="prodi">
                        <?php
                        $prodi= mysqli_query($koneksi, "select * from prodi");
                        while($ambilprodi= mysqli_fetch_array($prodi)) :
                        ?>
                        <option value="<?php echo $ambilprodi['nama_prodi']?>"><?php echo $ambilprodi['nama_prodi']?></option>
                        <?php endwhile ?>
                    </select></div>
                </div>
                <div class="txt_field">
                    <input type="text" name="tahun_masuk" required>
                    <span></span>
                    <label> Tahun Masuk</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="no_telp" required>
                    <span></span>
                    <label> No. Telepon </label>
                </div>
                <div class="txt_field">
                    <input type="text" name="email" required>
                    <span></span>
                    <label> Email </label>
                </div>
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
                <input type="submit" value="Sign Up" name="proses">
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['proses'])){
    $hitung=mysqli_query($koneksi, "select * from anggota where id_anggota = '$_POST[id_anggota]' or username = '$_POST[username]'");
    $cek=mysqli_num_rows($hitung);

    if($cek==0){
        mysqli_query($koneksi, "insert into anggota set
        id_anggota = '$_POST[id_anggota]',
        nama_anggota = '$_POST[nama_anggota]',
        ttl = '$_POST[ttl]',
        jenkel = '$_POST[jenkel]',
        fakultas = '$_POST[fakultas]',
        prodi = '$_POST[prodi]',
        tahun_masuk = '$_POST[tahun_masuk]',
        no_telp = '$_POST[no_telp]',
        email = '$_POST[email]',
        username = '$_POST[username]',
        password = '$_POST[password]'");
        echo "<meta http-equiv=refresh content=0;URL='login2.php'>";
    }
    
    else{
        echo "<meta http-equiv=refresh content=1;URL='register.php?#alert'>";
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
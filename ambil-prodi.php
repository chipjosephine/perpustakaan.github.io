<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from prodi where id_fakultas = '$id'");

while($ambilprodi= mysqli_fetch_array($query)) :
    ?>
    <option value="<?php echo $ambilprodi['id_prodi']?>"><?php echo $ambilprodi['nama_prodi']?></option>
    <?php endwhile ?>


    <script>
    function prodi(){
        var fakultas = $('#fakultas').val();
        $('#prodi').load("ambil-prodi.php?id="+fakultas+"");
    }
</script>
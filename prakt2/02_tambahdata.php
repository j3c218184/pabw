<h2> FORM ISI DATA BARU </h2>

<form>
    Nama: <input type="text" name="nm"/>
    <input type="submit" name="sub" value="Simpan Data Baru">
    <input type="submit" name="sub" value="Kembali ke Tampil Data">

    <?php
        //mengecheck apakah tombol sudah ditekan atau belum
        if(isset($_GET['sub'])){
            if($_GET['sub']=="Kembali ke Tampil Data"){
                header("location:01_tampildata.php");
            }
            else{
                //strlen mengukur panjang string || tujuannya mengecek data kosong atau tidak
                if(strlen($_GET["nm"])){
                    include "koneksi.php";
                    mysqli_query($kon, "INSERT INTO `mahasiswa` (`id`, `nama`) VALUES (NULL, '".$_GET['nm']."')");
                    echo "<br>Data <b>".$_GET['nm']."</b> Telah Disimpan di Database";
                }
                else{
                    echo "<br>Data Nama Tidak Boleh Kosong";
                }
            }
        }
    ?>
</form>
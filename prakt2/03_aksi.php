<!-- debug cannot modify header? -->
<?php
    ob_start();
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,400italic">
    <link rel="stylesheet" href="../style.default.css" id="theme-stylesheet">

    <title>Praktikum 2</title>

    <!-- Styles-->
    <style>
        .lined::after {
            width: 22.25rem;
        }
    </style>

  </head>
  <body>
    <!-- navigation -->
    [<nav class="navbar navbar-expand-lg navbar-primary bg-light fixed-top" style="font-weight: bold;">
        <div class="container">
            <a class="navbar-brand" href="../index.html">R</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-3 active">
                    <a class="nav-link" href="../index.html">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Praktikum
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../prakt1">Praktikum 1 - Perhitungan</a>
                    <a class="dropdown-item" href="#">Praktikum 2 - CRUD Data</a>
                    <a class="dropdown-item" href="../tugas2/">Tugas - CRUD Data Mahasiswa</a>
                    <a class="dropdown-item" href="../prakt4/public/">Praktikum 4 - CodeIgniter 4</a>
                    <a class="dropdown-item" href="../prakt5/public/">Praktikum 5 - CI & Bootstrap</a>
                  </div>
              </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Praktikum Section -->
    <section class="py-5">
        <div class="container py-5">
          <a>
            <h2 class="text-lg lined" style="font-weight: bold;">Praktikum 2 - CRUD Data Mahasiswa</h2>
          </a>
          <p class="mb-4">Pada pertemuan ke-2 ini, kami mengkoneksikan database ke webpages. Sehingga, dapat dilakukannya create, read, update, dan delete data mahasiswa.</p>
          <?php
            if($_GET['aksi']=="Edit"){
                echo "<h2>Form Edit</h2>";
                ?>
                <form>
                    <input type="text" name="nm" value="<?php echo $_GET['nm']?>">
                    <input class="btn btn-success" type="submit" name="sub" value="Simpan Perubahan">
                    <input class="btn btn-primary" type="submit" name="sub" value="Kembali ke Tampil Data">
                    <!-- kenapa ditambahin line 10 langsung nggak error? -->
                    <input type="hidden" name="aksi" value="Edit">
                    <input type="hidden" name="idupdate" value="<?php 
                        if(isset($_GET['idupdate']))
                            echo $_GET['idupdate'];
                        else
                            echo $_GET['id'] ;
                        ?>">
                </form>
                <?php

                if(isset($_GET['sub'])){
                    if($_GET['sub']=="Kembali ke Tampil Data"){
                        header("location:index.php");
                    }
                    else{
                        if(strlen($_GET['nm'])){
                            if(strlen($_GET['nm'])){
                                include "koneksi.php";
                                mysqli_query($kon, "UPDATE `mahasiswa` SET `nama`='".$_GET['nm']."' WHERE `mahasiswa`.`id`=".$_GET['idupdate'] );
                                echo "<br>Nama baru <b>".$_GET['nm']."</b> telah disimpan";
                            }
                        }
                    }
                }
            }
            else{
                echo "<h2>Konfirmasi Penghapusan Data</h2>";
                ?>
                <form>Apakah Anda yakin ingin menghapus data
                    <b>
                        <?php echo $_GET['nm']; ?>
                    </b>?

                    <input class="btn btn-danger" type="submit" name="sub" value="Ya">
                    <input class="btn btn-primary" type="submit" name="sub" value="Tidak">
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                    <input type="hidden" name="aksi" value="<?php echo "Delete";?>">
                    <input type="hidden" name="nm" value="<?php echo $_GET['nm'];?>">
                </form>
                <?php
                    if(isset($_GET['sub'])){
                        if($_GET['sub']=="Tidak"){
                            header("location:index.php");
                        }
                        else{
                            include "koneksi.php";
                            mysqli_query($kon, "DELETE FROM `mahasiswa` WHERE `id`=".$_GET['id']);
                            header("location:index.php");
                        }
                    }
            }
        ?>
        </div>
      </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
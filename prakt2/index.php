<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,400italic">
    <link rel="stylesheet" href="style.default.css" id="theme-stylesheet">

    <title>Praktikum 1</title>

    <!-- Styles -->
    <style>
        @media (min-width: 992px) {
            .text-lg {
                font-size: 3rem !important;
            }
        }
        .lined::after {
            content: '';
            display: block;
            width: 18.25rem;
            height: 2px;
            margin: 1.25rem 0;
            background: #2b90d9;
        }
        body {
            font-family: "Open Sans", sans-serif;
            font-size: 1rem;
            font-weight: 300;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
        }
        .b {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            max-width: 400px;
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
                    <a class="dropdown-item" href="../prakt4/">Praktikum 4 - CodeIgniter 4</a>
                    <a class="dropdown-item" href="../prakt5/">Praktikum 5 - CI & Bootstrap</a>
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
          <h3>Data Mahasiswa</h3>
          <form action="02_tambahdata.php">
              <input class="btn btn-primary" type="submit" value="Tambah Data Baru"/>
          </form>
          <br>

          <?php
              include "koneksi.php";
              $r=mysqli_query($kon, "SELECT * FROM mahasiswa");
              $i=1;
              while($brs=mysqli_fetch_assoc($r)){
                  //echo $i++.".".$brs["nama"]."<br>";
                  //membuat form, tombol edit dan tombol delete
                  echo "<form action=\"03_aksi.php\">";
                  echo $i++.". ".$brs["nama"];
                  echo "&nbsp;&nbsp;&nbsp; <input class=\"btn btn-warning\" type=\"submit\" name=\"aksi\" value=\"Edit\">";
                  echo "&nbsp;&nbsp;&nbsp; <input class=\"btn btn-danger\" type=\"submit\" name=\"aksi\" value=\"Hapus\">";
                  echo "<p>";
                  echo "<input type=\"hidden\" name=\"id\" value=\"".$brs["id"]."\">";
                  echo "<input type=\"hidden\" name=\"nm\" value=\"".$brs["nama"]."\">";
                  echo "</form>";
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
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Formulir Data Mahasiswa Hogwart University</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd"> 
        <div class="container">
            <a class="navbar-brand">
                <img src="img/logo.png" alt="Logo Hogwarts University" height="55">
                <img src="img/hogwarts.png" alt="Hogwarts University" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/../index.html">Rima Nurkholifah (J3C218184)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <h3 style="margin-bottom: 20px;">Formulir Data Mahasiswa</h3>

        <?php
        include('koneksi.php');
        if (isset($_POST['submit'])) {
            $nim                = $_POST['nim'];
            $nama               = $_POST['nama'];
            $jenis_kelamin      = $_POST['jenis_kelamin'];
            $agama              = $_POST['agama'];
            $olahraga           = implode(", ", $_POST['olahraga']);
            $ekstensi_boleh     = array('png', 'jpg');
            $file_nama          = $_FILES['file']['name'];
            $x                  = explode('.', $file_nama);
            $ekstensi           = strtolower(end($x));
            $ukuran             = $_FILES['file']['size'];
            $file_tmp           = $_FILES['file']['tmp_name'];

            $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa2 WHERE nim='$nim'") or die(mysqli_error($koneksi));

            if (mysqli_num_rows($cek) == 0) {
                if (in_array($ekstensi, $ekstensi_boleh) == true) {
                    if ($ukuran < 2000000) {
                        move_uploaded_file($file_tmp, 'file/' . $file_nama);
                        $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa2(nim, nama, jenis_kelamin, agama, olahraga, foto) VALUES('$nim', '$nama', '$jenis_kelamin', '$agama', '$olahraga', '$file_nama')") or die(mysqli_error($koneksi));

                        if ($sql) {
                            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
                        } else {
                            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning">Ukuran file harus dibawah 2MB.</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">Ekstensi file yang diperbolehkan hanya png, jpg, dan jpeg.</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Gagal menambahkan, NIM sudah terdaftar.</div>';
            }
        }
        ?>

        <form action="tambah.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" size="9" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" required>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" required>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<select name="agama" class="form-control" required>
						<option value="">Pilih Agama...</option>
						<option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Konghucu</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Olahraga Favorit</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola">
                        <label class="form-check-label">
                            Sepak Bola
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Basket">
                        <label class="form-check-label">
                            Basket
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Futsal">
                        <label class="form-check-label">
                            Futsal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang">
                        <label class="form-check-label">
                            Renang
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Badminton">
                        <label class="form-check-label">
                            Badminton
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Profil</label>
                <div class="col-sm-10">
                    <input type="file" name="file" required>
                </div>
            </div>

            <div class="form-group row" style="margin-top: 50px;">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <a href="index.php" class="btn btn-warning">Batal</a>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
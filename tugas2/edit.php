<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>CRUD PHP</title>
</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Logo Hogwarts University" height="55">
                <img src="img/hogwarts.png" alt="Hogwarts University" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Rima Nurkholifah (J3C218184)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	<div class="container" style="margin-top:30px">
		<h3 style="margin-bottom: 20px;">Edit Mahasiswa</h3>

		<?php
			include('koneksi.php');
			if (isset($_GET['nim'])) {
				$nim = $_GET['nim'];
				$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa2 WHERE nim='$nim'") or die(mysqli_error($koneksi));

				//jika hasil query = 0 maka muncul pesan error
				if (mysqli_num_rows($select) == 0) {
					echo '<div class="alert alert-warning">NIM tidak ada dalam database.</div>';
					exit();
				} else {
					$data = mysqli_fetch_assoc($select);
				}
			}
			$datahobi = explode(', ', $data['olahraga']);

			if (isset($_POST['submit'])) {
				$nama			= $_POST['nama'];
				$jenis_kelamin	= $_POST['jenis_kelamin'];
				$agama			= $_POST['agama'];
				$olahraga		= implode(", ", $_POST['olahraga']);

				$sql = mysqli_query($koneksi, "UPDATE mahasiswa2 SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', olahraga='$olahraga' WHERE nim='$nim'") or die(mysqli_error($koneksi));
				if ($sql) {
					echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?nim=' . $nim . '";</script>';
				} else {
					echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
				}
			}
		?>

		<form action="edit.php?nim=<?php echo $nim; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" value="<?php echo $data['nim']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki"
							<?php if ($data['jenis_kelamin'] == 'Laki-laki') { echo 'checked'; } ?> required>
						<label class="form-check-label">Laki-laki</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan"
							<?php if ($data['jenis_kelamin'] == 'Perempuan') { echo 'checked'; } ?> required>
						<label class="form-check-label">Perempuan</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<select name="agama" class="form-control" required>
						<option value="Islam" <?php if ($data['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
						<option value="Kristen" <?php if ($data['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
						<option value="Katolik" <?php if ($data['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
						<option value="Hindu" <?php if ($data['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
						<option value="Katolik" <?php if ($data['agama'] == 'Budha') echo 'selected'; ?>>Budha</option>
						<option value="Konghucu" <?php if ($data['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Olahraga</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola"
							<?php if (in_array("Sepak Bola", $datahobi)) echo "checked"; ?>>
						<label class="form-check-label">Sepak Bola</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga[]" value="Basket"
							<?php if (in_array("Basket", $datahobi)) echo "checked"; ?>>
						<label class="form-check-label">Basket</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga[]" value="Futsal"
							<?php if (in_array("Futsal", $datahobi)) echo "checked"; ?>>
						<label class="form-check-label">Futsal</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang"
							<?php if (in_array("Renang", $datahobi)) echo "checked"; ?>>
						<label class="form-check-label">Renang</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga[]" value="Badminton"
							<?php if (in_array("Badminton", $datahobi)) echo "checked"; ?>>
						<label class="form-check-label">Badminton</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Profil</label>
				<div class="col-sm-10">
					<img src="<?php echo "file/" . $data['foto']; ?>" width="100px" disabled>
					<input type="file" name="gambar">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<a href="index.php" class="btn btn-warning">Kembali</a>
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
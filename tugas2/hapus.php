<?php
include('koneksi.php');

if(isset($_GET['nim'])){
	$nim = $_GET['nim'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa2 WHERE nim='$nim'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM mahasiswa2 WHERE nim='$nim'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data mahasiswa."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data mahasiswa."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("NIM tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("NIM tidak ditemukan di database."); document.location="index.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="sweetalert2/css/sweetalert2.css">
</head>
<body>
	<div class="container">
		<h3 class="py-2">Tambah Data Siswa</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="nis" class="col-sm-1 col-form-label">NIS</label>
				<input type="text" name="nis" class="form-control col-sm-2" id="nis" autocomplete="off" autofocus="true">
			</div>
			<div class="form-group row">
				<label for="nama" class="col-sm-1 col-form-label">NAMA</label>
				<input type="text" name="nama" class="form-control col-sm-3" id="nama">
			</div>
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-1 pt-0">Jenis Kelamin</legend>
					<div class="px-0">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="rad1" name="jkel" class="custom-control-input">
							<label class="custom-control-label" for="rad1">Laki-Laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="rad2" name="jkel" class="custom-control-input">
							<label class="custom-control-label" for="rad2">Perempuan</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="form-group row">
				<label for="tel" class="col-sm-1 col-form-label">Telepon</label>
				<input type="text" name="tel" class="form-control col-sm-3" id="tel">
			</div>
			<div class="form-group row">
				<label for="almt" class="col-sm-1 py-5">Alamat</label>
				<textarea name="almt" class="form-control col-sm-3" id="almt"></textarea>
			</div>
			<div class="form-group row">
				<label for="foto" class="col-sm-1 col-form-label">Foto</label>
				<div class="custom-file col-sm-4">
					<input type="file" class="custom-file-input" name="foto" id="foto">
					<label class="custom-file-label" for="foto">Pilih Foto</label>
				</div>
			</div>
			
			<button class="btn btn-outline-primary" name="simpan" type="submit">SIMPAN</button>
			<a href="index.php"><button class="btn btn-outline-danger" type="button">BATAL</button></a>
		</form>
	</div>
	<script type="text/javascript" src="JQuery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<script type="text/javascript" src="sweetalert2/js/sweetalert2.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
		$(document).ready(function () {
			bsCustomFileInput.init()
		})
    </script>
</body>
</html>
<?php
	if (isset($_POST['simpan'])) {
		// Load file koneksi.php
		include "koneksi.php";

		// Ambil Data yang Dikirim dari Form
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jkel'];
		$telp = $_POST['tel'];
		$alamat = $_POST['almt'];
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
			
		// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		$fotobaru = date('dmYHis').$foto;

		// Set path folder tempat menyimpan fotonya
		$path = "images/".$fotobaru;

		// Proses upload
		if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
			// Proses simpan ke Database
			$query = "INSERT INTO tb_user VALUES('".$nis."', '".$nama."', '".$jenis_kelamin."', '".$telp."', '".$alamat."', '".$fotobaru."')";
			$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

			if($sql){ // Cek jika proses simpan ke database sukses atau tidak
				// Jika Sukses, Lakukan :
				// header("location: index.php"); // Redirect ke halaman index.php
				echo "<script>
					Swal.fire({
					    type: 'success',
						title: '<p>Data baru dengan nama</br><span class=text-success>$nama</span></br>Berhasil Ditambahkan</p>',
						text: 'Halaman akan di-direct ke index.php dalam 4 detik!',
						showConfirmButton: false,
						timer: 4000,
					}).then(function() {
						window.location.href = 'index.php';
					})
				</script>";
			}else{
				// Jika Gagal, Lakukan :
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
			}
		}else{
			// Jika gambar gagal diupload, Lakukan :
			echo "Maaf, Gambar gagal untuk diupload.";
		}
	}
?>

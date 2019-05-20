<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Index Siswa</h1></br>
		<a href="from_simpan.php"><button class="btn btn-success" style="margin-bottom: 10px">Tambah Data</button></a>
		<table class="table table-striped">
			<thead class="thead thead-dark">
				<th>Foto</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Alamat</th>
				<th colspan="2"><center>Aksi<center></th>
			</thead>
			<tbody>
				<?php 
					include 'koneksi.php';
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$query = "SELECT * FROM db_siswaaa WHERE nama '%".$cari."%'";
						$sql = mysqli_query($koneksi, $query);
					}
					else {
						$query = "SELECT * FROM tb_user";
						$sql = mysqli_query($koneksi, $query);
					}
					while ($data = mysqli_fetch_array($sql)) {
						?>
						<tr>
							<td><img src='images/<?php echo $data['foto'] ?>' width='35px' height='35px'></td>
							<td><?php echo $data['nis']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['jk']; ?></td>
							<td><?php echo $data['tlp']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><center><a href='form_update.php?<?php echo $data['nis'] ?>'>UBAH</a></center></td>
							<td><center><a href='#hapus_<?php echo $data['nis'] ?>' data-toggle='modal' title='Hapus Data' data-target='#hapus_<?php echo $data['nis']; ?>'>HAPUS</a></center></td>
						</tr>
						<?php include 'pop_hapus.php'; ?>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<script type="text/javascript" src="JQuery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
	<title>peminjaman buku reyja</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>Table peminjaman</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				Edit Peminjaman
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');

				$id = $_GET['id']; //mengambil id barang yang ingin diubah

				//menampilkan barang berdasarkan id
				$data = mysqli_query($koneksi, "select * from peminjaman where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Peminjam</label>
						<!--  menampilkan nama barang -->
						<input type="text" name="nama" required="" class="form-control" value="<?= $row['Nama']; ?>">

						<!-- ini digunakan untuk menampung id yang ingin diubah -->
						<input type="hidden" name="id" required="" value="<?= $row['ID']; ?>">
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<input type="text" name="kelas" class="form-control" value="<?= $row['Kelas']; ?>">
					</div>

					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" class="form-control" name="judul" value="<?= $row['Judulbuku']; ?>"></input>
					</div>
					<div class="form-group">
						<label>Foto buku</label>
						<input type="file" name="foto" required="" accept="image/*" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$kelas = $_POST['kelas'];
					$judul = $_POST['judul'];
					$tmp= $_FILES['foto']['tmp_name'];
					$name= $_FILES['foto']['name'];

					//query mengubah barang
					mysqli_query($koneksi, "update peminjaman set Nama='$nama', Kelas='$kelas', Judulbuku='$judul', Foto='$name' where id =$id") or die(mysqli_error($koneksi));
					move_uploaded_file($tmp,"assets/upload/$name");
					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}



				?>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
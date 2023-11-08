<!DOCTYPE html>
<html>

<head>
	<title>peminjaman buku reyja</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>Tabel peminjaman buku</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Pinjam Buku
			</div>
			<div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Peminjam</label>
						<input type="text" name="nama" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<input type="text" name="kelas" class="form-control">
					</div>
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" class="form-control" name="judul"></input>
					</div>
					<div class="form-group">
						<label>Foto buku</label>
						<input type="file" name="foto" required="" accept="image/*" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$kelas = $_POST['kelas'];
					$judul = $_POST['judul'];
					$tmp= $_FILES['foto']['tmp_name'];
					$name= $_FILES['foto']['name'];
					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into peminjaman (Nama,Kelas,Judulbuku,Foto)values('$nama', '$kelas', '$judul','$name')") or die(mysqli_error($koneksi));
					move_uploaded_file($tmp,"assets/upload/$name");
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
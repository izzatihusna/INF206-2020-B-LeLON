<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];

if($slevel=="Penjual"){

	$data = mysqli_query($koneksi,"select * from pengguna where id='$sid'"); 
	$ambil = mysqli_fetch_array($data);
	?>

	<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css" />
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

		<title>LelangBersamaku</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a class="navbar-brand" href="index.php"><img src="../asset/logo.png" width="145px" ></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				</ul>

				<a href="lelang.php">
					<button class="btn btn-info my-2 my-sm-0">Lelang</button>
				</a>
				<a href="keluar.php">
					<button type="button" class="btn btn-outline-info my-2 ml-3 mr-4"><?php echo $ambil['nama']; ?></button>
				</a>

			</div>
		</nav>

		<br>
		<div class="container">
			<?php 
			if(isset($_GET['status'])){
				if($_GET['status'] == "berhasil"){
					echo "<br><br><div class='alert alert-success' role='alert'>
					<h4 class='alert-heading'>Input Berhasil!</h4>
					</div>";

				}else{

				}
			}
			?>
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col" align="right">
						<div class="form-group">
							<div class="input-group">	
								<img id='img-upload'/ width="180px">					
								<input type="text" class="form-control" readonly>
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										<input type="file" id="imgInp" name="nama_file" size="30" required /> Cari Gambar
									</span>
								</span>
							</div>						
						</div>
					</div>
					<div class="col-4">
						<input type="text" name="berat" placeholder="Tersedia Berat (Kg)" class="form-control placeholder-no-fix" required><br>
						<input type="text" name="harga" placeholder="Harga (Rp/Kg)" class="form-control placeholder-no-fix" required><br>
						<input type="text" name="keterangan" placeholder="Keterangan" class="form-control placeholder-no-fix" required><br>

						<button class="btn btn-info" type="submit">Kirim</button>
					</div>
					<div class="col-4">
					</div>
				</div>
			</form>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="../image.js"></script>
	</body>
	</html>

	<?php
}else{

}
?>
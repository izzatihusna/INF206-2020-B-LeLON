<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];


if($slevel=="Pembeli"){


	$data1  = mysqli_query($koneksi,"select * from pengguna where id='$sid'"); 
	$ambil1 = mysqli_fetch_array($data1);
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
				<a href="keluar.php">
					<button type="button" class="btn btn-outline-info my-2 ml-3 mr-4" disabled=""><?php echo $ambil1['nama']; ?></button>
				</a>

			</div>
		</nav>

		<br>

			<?php 
			$sql = "SELECT * from lelang where id_pembeli='$sid' order by id desc";
			$result = $koneksi->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {

					$data5  = mysqli_query($koneksi,"select * from pengguna where id='$row[id_penjual]'"); 
					$ambil5 = mysqli_fetch_array($data5);
			?>

				<div class="container">
					<div class="row">
						<div class="col-12">
							<center>
								<h1><b>SELAMAT<br>ANDA TELAH TERPILIH</b></h1><br>
								<div class="row">
									<div class="col-4">
										<img src="<?php echo '../asset/profil/'.$ambil5['foto']; ?>" class="img-thumbnail" width="220px" style="margin-right:-150px; ">
									</div>
									<div class="col-6">
										<input type="text" value="<?php echo $ambil5['nama']; ?>" class="form-control placeholder-no-fix" disabled><br>

										<input type="text" value="HUB: <?php echo $ambil5['hp']; ?>" class="form-control placeholder-no-fix" disabled><br>

										<input type="text" value="Lokasi: <?php echo $ambil5['alamat']; ?>" class="form-control placeholder-no-fix" disabled><br>

										<a href="<?php echo 'aksi_selamat.php?xz='.$row['id']; ?>">
											<button type="button" class="btn btn-success btn-lg my-2 ml-3 mr-4">LOGOUT</button>
										</a>
									</div>
								</div>
							</center>
						</div>
					</div><br><br><br><br><br><br><br><br>

				<?php
				}
				}else{
					header("location:index.php");
				}

			}else{

				?>

			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		</body>
		</html>

		<?php
	}
	?>
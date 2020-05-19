<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];

if($slevel=="Penjual"){

	$data = mysqli_query($koneksi,"select * from pengguna where id='$sid'"); 
	$ambil = mysqli_fetch_array($data);


	$sql = "SELECT * FROM barang WHERE id_pengguna='$sid' ORDER BY id Desc";
	$result = $koneksi->query($sql);
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
				<a href="index.php">
					<button type="button" class="btn btn-outline-info my-2 ml-3 mr-4"><?php echo $ambil['nama']; ?></button>
				</a>

			</div>
		</nav>

		<br>
		<div class="container">
			<div class="row">
				<div class="col" align="left">

					<?php
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							?>

							<!-- Item -->
							<img src="<?php echo '../asset/barang/'.$row['foto']; ?>" style="margin-top: -160px;" width="210px" height="210px">
							<a data-toggle="modal" href="#barang<?php echo $row['id']; ?>">
								<button type="button" style="margin-left: -69px; margin-right: 12px; margin-top: 200px; ">Tawar</button>
							</a>					
							<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="barang<?php echo $row['id']; ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">

											<h4>Detail Barang</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form method="POST" action="">
											<div class="modal-body">
												<div class="row">
													<div class="col">
														<img class="img-circle" width="230" src="<?php echo '../asset/barang/'.$row['foto']; ?>"> 
													</div>
													<div class="col">
														Tersedia : <?php echo $row['berat']; ?> Kg<br><br> 
														Harga : Rp <?php echo $row['harga']; ?>/Kg<br><br><br>
														<input type="num" name="tawar" placeholder="Tawar RP/Kg" class="form-control placeholder-no-fix" required="">
													</div>
												</div>				
											</div>
											<div class="modal-footer centered">
												<button data-dismiss="modal" class="btn btn-warning" type="button">Cancel</button>
												<button class="btn btn-success" type="submit">&nbsp;Tawar&nbsp;</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Item -->

							<?php
						}
					}
					$koneksi->close();
					?>


				</div>

			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	</html>

	<?php

}else{
	header("location:keluar.php");
}

?>
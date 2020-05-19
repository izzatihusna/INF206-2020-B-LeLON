<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];

if($slevel=="Penjual"){


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

				<a href="index.php">
					<button class="btn btn-outline-info my-2 my-sm-0">Lelang</button>
				</a>
				<button type="button" class="btn btn-outline-info my-2 ml-3 mr-4" disabled><?php echo $ambil1['nama']; ?></button>

			</div>
		</nav>

		<br>
		<div class="container">
			<?php 
			if(isset($_GET['status'])){
				if($_GET['status'] == "berhasil"){
					echo "<br><br><div class='alert alert-danger' role='alert'>
					<h4 class='alert-heading'>Berhasil Dihapus!</h4>
					</div>";

				}else{

				}
			}
			?>
			<?php

			$sql = "SELECT * FROM barang where id_pengguna=$sid ORDER BY id Desc";
			$result = $koneksi->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>
					<div class="row">
						<div class="col" align="right">
							<img src="<?php echo '../asset/barang/'.$row['foto']; ?>" class="img-thumbnail" width="220px"><br>
							Tersedia : <?php echo $row['berat']; ?> Kg<br>
							Harga : Rp <?php echo $row['harga']; ?>/Kg
						</div>
						<div class="col-8">
							<h3>Pelelang Tertinggi :</h3><br>

							<table>
								<?php

								$sql2 = "SELECT * FROM penawaran where id_barang=$row[id] ORDER BY harga Desc LIMIT 3";
								$result2 = $koneksi->query($sql2);

								if ($result2->num_rows > 0) { 
									$no=1;
									while($row2 = $result2->fetch_assoc()){

										$data2  = mysqli_query($koneksi,"select * from pengguna where id=$row2[id_pembeli]"); 
										$ambil2 = mysqli_fetch_array($data2);
										?>
										<tr>
											<th><?php echo $no++; ?>. </th>
											<th><?php echo $ambil2['nama']; ?></th>
											<th>&nbsp;</th>
											<th><?php echo 'Rp '.$row2['harga'].'/Kg'; ?></th>
											<th>&nbsp;</th>
											<th align="right">
													<a href="<?php echo 'terima.php?barang='.$row['id'].'&tawar='.$row2['id']; ?>">
														<button class="btn btn-outline-info btn-sm">Terima</button>
													</a>

											</th>
										</tr>
										<?php
									}
								}
								?>
							</table>
							<a href="<?php echo 'batal_lelang.php?id='.$row['id'].'&nama_foto='.$row['foto']; ?>" >
								<button class="btn btn-outline-info btn-md">Batalkan Lelang</button>
							</a>
						</div>
					</div><hr><br>
					<?php
				}
			}
			?>
		</div>

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
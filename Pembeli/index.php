<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];

if($slevel=="Pembeli"){

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
	<body style="background-image:none; background-color: #F8F9F9 ;">
		<?php
		$sql = "SELECT * FROM pengguna WHERE id=$sid";
		$result = $koneksi->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
				<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5DADE2;">
					<h3 style="color:white; text-transform: uppercase;"><?php echo $row["level"]; ?></h3>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>
					</div>
				</nav>


				<br>
				<div class="container">
					<div class="row">
						<div class="col col-3 mx-auto" align="left">
							<?php 
								if(isset($_GET['status'])){
									if($_GET['status'] == "berhasilLelang"){
										echo "<br><br><div class='alert alert-success' role='alert'>
										<h4 class='alert-heading'> Anda Berhasil Menawar!</h4>
										</div>";

									}else{
									}
								}
								?>
							<img src="<?php echo '../asset/profil/'.$row["foto"]; ?>" class="img-thumbnail" width="450px" height="450px" style="margin-left: 20px"><br><br>
							<p style="margin-left: 14px">
								Name : <?php echo $row["nama"]; ?><br><br>
								<b class="primary">
									Age : <?php echo $row["age"]; ?> thn<br>
									Work : <?php echo $row["work"]; ?><br>

									Location : <?php echo $row["alamat"]; ?><br>
									Gender : <?php echo $row["gender"]; ?>
								</b>
							</p>
							<a href="keluar.php">
								<button type="button" class="btn btn-secondary">LogOut</button>
							</a>
							<a href="pasar.php">
								<button type="button" class="btn btn-warning">Halaman Lelang</button>
							</a>
						</div>					
					</div>
				</div>

				<?php
			}
		}
		$koneksi->close();
		?>
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
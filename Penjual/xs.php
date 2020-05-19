<?php
session_start();
include "../koneksi.php";

$sid	= $_SESSION['id'];
$slevel	= $_SESSION['level'];

if($slevel=="Penjual"){

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
			<div class="container" style="margin-left: 0px">
				<div class="row">
					<div class="col" align="left">
						<img src="<?php echo '../asset/profil/'.$row["foto"]; ?>" alt="..." class="img-thumbnail" width="210px" height="210px" style="margin-left: 14px"><br><br>
						<div class="alert" role="alert" style="background-color: #5DADE2;">
							<i>"Hablu-minannas, habi minallah"</i>
						</div>
						<p style="margin-left: 14px">
							Name : <?php echo $row["nama"]; ?><br>
							<b class="primary">
								Age : 35 thn<br>
								Work : Wiraswasta<br>
								Family : Menikah<br>
								Location : <?php echo $row["alamat"]; ?><br>
								Gender : Perempuan
							</b>
						</p>
					</div>
					<div class="col col-9" align="left">
						<div class="row">
							<div class="col-3" align="left">
								<div class="alert" role="alert" style="background-color: #5DADE2;">
									<center>Pekerja Keras</center>
								</div>
							</div>
							<div class="col-3" align="left">
								<div class="alert" role="alert" style="background-color: #5DADE2;">
									<center>Pemilih</center>
								</div>
							</div>
						</div>
						<br>

						<h2 style="color: #3498DB;">Goals</h2>

						<h2 style="color: #3498DB;">Frustrations</h2>

						<div class="alert alert-secondary" role="alert">
							<h2 style="color: #3498DB;">Bio</h2>
							This is a secondary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
						</div>
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
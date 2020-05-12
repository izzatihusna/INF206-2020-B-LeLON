<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	
	<title>LelangBersamaku</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			</ul>

			<a href="daftar.php">
				<button class="btn btn-outline-info my-2 my-sm-0"><b>DAFTAR</b></button>
			</a>
			<a href="masuk.php">
				<button class="btn btn-outline-info my-2 ml-3 mr-4"><b>MASUK</b></button>
			</a>
		</div>
	</nav>

	<br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg">
			</div>
			<div class="col-lg">
				<center>
				<img src="asset/logo.png" width="80%" >
				
				<form method="post" action="aksi_daftar_penjual.php" ><br>
					<div class="form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-primary btn-md btn-block">DAFTAR</button>
				</form></center>
			</div>
			<div class="col-lg">
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
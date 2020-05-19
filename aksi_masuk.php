<?php 
session_start();

include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"select * from pengguna where email='$email' and password='$password'"); 
$cek = mysqli_num_rows($data);
$ambil = mysqli_fetch_array($data);

if($cek > 0){
	$_SESSION['id'] = $ambil[id];
	$_SESSION['level'] = $ambil[level];

	if($_SESSION['level']=="Penjual"){

		if($ambil['foto']==''){
			header("location:penjual/data_diri.php");
		}else{
			header("location:penjual/index.php");
		}
	}else{

		if($ambil['foto']==''){
			header("location:pembeli/data_diri.php");
		}else{
				header("location:pembeli/selamat.php");
		}
	}

}else{
	header("location:masuk.php?status=gagalLogin");
}
?>
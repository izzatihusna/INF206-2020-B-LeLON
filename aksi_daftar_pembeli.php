<?php

include "koneksi.php";

$nama 	= $_POST['nama'];
$email 	= $_POST['email'];
$password= $_POST['password'];

$data = mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('', '$nama', '$email', '$password', 'Pembeli', '', '0', '', '', '', '', '')");
$ambil = mysqli_fetch_array($data);

header("location:masuk.php?status=berhasil");

?>

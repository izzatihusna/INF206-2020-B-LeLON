<?php

include "koneksi.php";

$nama 	= $_POST['nama'];
$email 	= $_POST['email'];
$password= $_POST['password'];

mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('', '$nama', '$email', '$password', 'Penjual', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");

header("location:masuk.php?status=berhasil");

?>
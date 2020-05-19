<?php
include "../koneksi.php";

$sid	   = $_GET['y'];
$id_barang = $_GET['barang'];
$id_tawar  = $_GET['tawar'];
$id_user   = $_GET['user'];

mysqli_query($koneksi, "INSERT INTO lelang VALUES ('', '$sid', '$id_user')");
mysqli_query($koneksi, "UPDATE barang SET terpilih='$id_tawar' where id='$id_barang'");
mysqli_query($koneksi, "UPDATE pengguna SET x='1' where id='$id_user'");


header("location:lelang.php?status=memilih&terpilih=$id_tawar");
?>
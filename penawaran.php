<?php

include "../koneksi.php";

$id_brg 	= $_POST['id_brg'];
$id_penj 	= $_POST['id_penj'];
$id_pemb	= $_POST['id_pemb'];
$hrg		= $_POST['tawar'];

$data = mysqli_query($koneksi, "INSERT INTO penawaran VALUES ('', '$id_penj', '$id_pemb', '$id_brg', '$hrg')");
$ambil = mysqli_fetch_array($data);


header("location:index.php?status=berhasilLelang");

?>
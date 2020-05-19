<?php
include "../koneksi.php";

$id = $_GET['id'];
$namaFile = $_GET['nama_foto'];

mysqli_query($koneksi, "delete from barang where id='$id'");
mysqli_query($koneksi, "delete from penawaran where id_barang='$id'");

unlink('../asset/barang/'.$namaFile);
header("location:lelang.php?status=berhasil");
?>
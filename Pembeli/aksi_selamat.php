<?php
include "../koneksi.php";

$id = $_GET['xz'];


mysqli_query($koneksi, "delete from lelang where id='$id'");



header("location:keluar.php");
?>
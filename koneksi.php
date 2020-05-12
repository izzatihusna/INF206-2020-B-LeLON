<?php

	$koneksi = mysqli_connect("localhost", "root", "", "lelon");

	if(mysqli_connect_errno()){
		echo "koneksi gagal";
	}

?>
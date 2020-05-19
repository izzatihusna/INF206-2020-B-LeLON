<?php
session_start();
include "../koneksi.php";

$sid  = $_SESSION['id'];
$slevel = $_SESSION['level'];

	// membuat variabel untuk menampung data dari form
$nama  		 	   = date("Ymd").date("his");
$berat    		 = $_POST['berat'];
$harga   		   = $_POST['harga'];
$gambar_produk = $_FILES['nama_file']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['nama_file']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/barang/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                $query = "INSERT INTO barang (id_pengguna, nama, berat, harga, foto) VALUES ('$sid', '$nama', '$berat', '$harga', '$nama_gambar_baru')";
                $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                if(!$result){
                	die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                		" - ".mysqli_error($koneksi));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                	header("location:index.php?status=berhasil");
                }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            	echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
        } else {
        	$query = "INSERT INTO barang (id_pengguna, nama, berat, harga, foto) VALUES ('$sid', '$nama', '$berat', '$harga', null)";
        	$result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
        	if(!$result){
        		die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        			" - ".mysqli_error($koneksi));
        	} else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
        		echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        	}
        }

<?php
session_start();
include "../koneksi.php";

$sid  = $_SESSION['id'];
$slevel = $_SESSION['level'];

$nama  		 	   = date("Ymd").date("his");
$gambar_produk = $_FILES['nama_file']['name'];
$hp    		 = $_POST['hp'];
$age       = $_POST['age'];
$work      = $_POST['work'];
$address   = $_POST['address'];
$gender    = $_POST['gender'];

if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $gambar_produk);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['nama_file']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/profil/'.$nama_gambar_baru); 
                $query  = "UPDATE pengguna SET 
                            foto    ='$nama_gambar_baru', 
                            alamat  ='$address',
                            hp      ='$hp',
                            age     ='$age',
                            work    ='$work',
                            gender  ='$gender'
                            where id='$sid'";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                	die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                		" - ".mysqli_error($koneksi));
                } else {
                	header("location:index.php");
                }

            } else {     
            	echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
        } else {
        	$query  = "UPDATE pengguna SET 
                            foto    =null, 
                            alamat  ='$address',
                            hp      ='$hp',
                            age     ='$age',
                            work    ='$work',
                            gender  ='$gender'
                            where id='$sid'";
        	$result = mysqli_query($koneksi, $query);
        	if(!$result){
        		die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        			" - ".mysqli_error($koneksi));
        	} else {
        		echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        	}
        }

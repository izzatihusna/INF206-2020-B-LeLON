<?php
session_start();
include "../koneksi.php";

$sid  = $_SESSION['id'];
$slevel = $_SESSION['level'];

	// membuat variabel untuk menampung data dari form
$nama  		 	   = date("Ymd").date("his");
$gambar_produk = $_FILES['nama_file']['name'];
$hp    		 = $_POST['hp'];
$address   = $_POST['address'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['nama_file']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/profil/'.$nama_gambar_baru); 
                $query  = "UPDATE pengguna SET 
                            foto    ='$nama_gambar_baru', 
                            alamat  ='$address',
                            hp      ='$hp'
                            where id='$sid'";
                $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                if(!$result){
                	die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                		" - ".mysqli_error($koneksi));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                	header("location:index.php");
                }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            	echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
        } else {
        	$query  = "UPDATE pengguna SET 
                            foto    =null, 
                            alamat  ='$address',
                            hp      ='$hp'
                            where id='$sid'";
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

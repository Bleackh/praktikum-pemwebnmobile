<?php 
$koneksi =  mysqli_connect("localhost","root","","db_perpustakaan");
if ($koneksi->connect_error) {
	die('Database Tidak Terhubung :'. $koneksi->connect_error);
}  
?>
<?php 
include_once '../config/koneksi.php';

if(isset($_SESSION['username'])){
	session_destroy();
	pesan("warning", "Logout Berhasil", base_url());
	
}

 ?>
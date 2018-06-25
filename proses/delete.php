<?php 
include_once '../config/koneksi.php';

if (isset($_GET['kd'])) {
	$kd = $_GET['kd'];
	$get = $db->query("SELECT * FROM member WHERE kd_member = '$kd'");
	if($get->rowCount()<> 0){
		$query = $db->query("UPDATE member set stat = 0 where kd_member = '$kd'");
		pesan("success", "Data berhasil dihapus", base_url('members.php'));
	} else {
		pesan("warning", "Data tidak ditemukan", base_url('members.php'));
	}
	
} else {
	pesan("danger", "Tidak dapat mengakses halaman sembarangan", base_url('members.php'));
}



 ?>
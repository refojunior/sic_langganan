<?php 
include_once '../config/koneksi.php';


switch ($_GET['to']) {
	//delete member
	case 'members':
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
		break;
		
	//delete user
	case 'users':
		if (isset($_GET['kd'])) {
			$kd = $_GET['kd'];
			$get = $db->query("SELECT * FROM user WHERE id = '$kd'");
			if($get->rowCount()<> 0){
				$query = $db->query("UPDATE user set stat = 0 where id = '$kd'");
				pesan("success", "Data berhasil dihapus", base_url('users.php'));
			} else {
				pesan("warning", "Data tidak ditemukan", base_url('users.php'));
			}
		
		} else {
			pesan("danger", "Tidak dapat mengakses halaman sembarangan", base_url('users.php'));
		}
		break;

	case 'hadiah' :
		if(isset($_GET['kd'])){
			$kd = $_GET['kd'];
			$get = $db->query("SELECT * FROM hadiah WHERE kd_hadiah = '$kd'");
			if($get->rowCount()<> 0){
				$query = $db->query("UPDATE hadiah set stat = 0 where kd_hadiah = '$kd'");
				pesan("success", "Data berhasil dihapus", base_url('hadiah.php'));
			} else {
				pesan("warning", "Data tidak ditemukan", base_url('hadiah.php'));
			}
		}
		break;
	
	default:
		# code...
		break;
}





 ?>
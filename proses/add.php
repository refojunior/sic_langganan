<?php 
include_once '../config/koneksi.php';

switch ($_GET['to']) {
	case 'member':
		$kd_member = $_POST['kd_member'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$tempat_lhr = $_POST['tempat_lhr'];
		$tgl_lhr = $_POST['tgl_lhr'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$email = $_POST['email'];
		$created = date('Y-m-d H:i:s');

		$insert = $db->query("INSERT INTO member VALUES ('$kd_member', '$nama_lengkap', '$tempat_lhr', '$tgl_lhr', '$jk', '$alamat', '$no_telp', '$email', '$created')");
		if($insert){
			$loc = base_url('members.php');
			pesan("success", "Data member berhasil ditambahkan", $loc );
		}


		break;
	
	case 'points':
		echo "Proses Add Pooint";
		break;
	
	default:
		# code...
		break;
}

 ?>
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

		$insert = $db->query("UPDATE member set nama_lengkap = '$nama_lengkap', 
												tempat_lhr = '$tempat_lhr', 
												tgl_lhr = '$tgl_lhr', 
												jk = '$jk', 
												alamat = '$alamat', 
												no_telp = '$no_telp', 
												email = '$email'
												WHERE kd_member='$kd_member' "); 
	
		if($insert){
			$loc = base_url('members.php');
			pesan("success", "Data member berhasil diedit", $loc );
		}


		break;
	
	case 'unblock':
		$kd= $_GET['kd'];
		$unblock = $db->query("UPDATE member set stat=1 where kd_member= '$kd'");
		pesan('success', 'Proses unblock berhasil', base_url('blocked.php'));
		break;

	case 'hadiah': 
		$kd = $_GET['kd'];
		$kd_hadiah = $_POST['kd_hadiah'];
		$nama_hadiah = $_POST['nama_hadiah'];
		$ketentuan_poin = $_POST['ketentuan_poin'];
		$stok = $_POST['stok'];

		$upd = $db->query("UPDATE hadiah SET kd_hadiah = '$kd_hadiah', nama_hadiah='$nama_hadiah', ketentuan_poin='$ketentuan_poin', stok='$stok' WHERE kd_hadiah = '$kd' ");
		if($upd){
			pesan("success", "Data Hadiah berhasil di update", base_url('hadiah.php'));
		} else {
			pesan("danger", "Data hadiah gagal di update", base_url('hadiah.php'));
		}

	break;
	
	default:
		# code...
		break;
}

 ?>
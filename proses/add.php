<?php 
include_once '../config/koneksi.php';

switch ($_GET['to']) {
	case 'member':
		//mendapatkan inputan user dari form
		$kd_member = $_POST['kd_member'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$tempat_lhr = $_POST['tempat_lhr'];
		$tgl_lhr = $_POST['tgl_lhr'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$email = $_POST['email'];
		$created = date('Y-m-d'); //fungsi bawaan php untuk menyimpan tgl skarang

		//kalau kd_member dan nama lengkap kosong tidak bisa input
		if($kd_member=='' && $nama_lengkap==''){
			pesan("danger", "Masukan Data terlebih dahulu!", base_url('members.php'));
		}

		//insert value ke db
		$insert = $db->query("INSERT INTO member VALUES ('$kd_member', '$nama_lengkap', '$tempat_lhr', '$tgl_lhr', '$jk', '$alamat', '$no_telp', '$email', '$created', 1)");

		//kalo berhasil tampilkan flash message success dan kembali ke halaman member
		if($insert){
			$loc = base_url('members.php');
			pesan("success", "Data member berhasil ditambahkan", $loc );
		} else {
			pesan("danger", "Data member tidak berhasil ditambahkan", $loc );
		}


		break;
	
	case 'points':
		$kd_member = $_POST['kd_member'];
		$nota = $_POST['nota'];
		$nominal = $_POST['nominal'];
		//menghitung point yg di dapat berdasarkan nominal
		$point = $nominal / 1000;
		$id_user = $_SESSION['id'];
		$tgl = date('Y-m-d');

		if($kd_member=='' && $nominal==''){
			pesan("danger", "Harap isi seluruh form yang di sediakan!!", base_url('points.php'));
		} else {
			$ins = $db->query("INSERT INTO points values ('', '$kd_member', '$tgl', '$id_user', '$nominal', '$nota', '$point')");
			if($ins){
				pesan("success", "Data point sukses ditambahkan", base_url('points.php'));
			} else {
				pesan("danger", "Data point tidak berhasil ditambahkan", base_url('points.php'));
			}
		}
		break;

	case 'users':
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$retype = sha1($_POST['retype_password']);
		$level = $_POST['level'];

		if($password!=$retype){
			pesan("danger", "Password dan retype password harus sama!!", base_url('users.php'));
		} else {
			$ins = $db->query("INSERT INTO user VALUES ('','$username', '$password', '$level', 1)");
			pesan("success", "Data user berhasil ditambahkan", base_url('users.php'));
		}

		break;
	
	default:
		# code...
		break;
}

 ?>
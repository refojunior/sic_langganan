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
		//parsing data agar yang disimpan kode saja
		$member = $_POST['member'];
		$members = explode(' ', $member);
		$kd_member = $members[0];

		//parsing data agar yg di simpan tanpa koma
		$nominal1 = $_POST['nominal'];
		$nominal2 = str_replace(',', '', $nominal1);
		$nominal = $nominal2;

		$nota = $_POST['nota'];
		
		//menghitung point yg di dapat berdasarkan nominal
		$point = $nominal / 1000;

		$id_user = $_SESSION['id'];
		$tgl = date('Y-m-d');

		if($kd_member=='' && $nominal==''){
			pesan("danger", "Harap isi seluruh form yang di sediakan!!", base_url('points.php'));
		} else {
			//INSERT KE TABEL LOG 
			$log = $db->query("INSERT into log VALUES ('', '$kd_member', '1', '$point', '$tgl', '$nota')");
			//MASUKAN ATAU EDIT KE TABEL POIN
			$cek_points = $db->query("SELECT * from points WHERE kd_member='$kd_member'");
			if($cek_points->rowCount() == 0){
				$ins = $db->query("INSERT INTO points VALUES ('$kd_member', '$point') ");
			} else {
				$ins = $db->query("UPDATE points set jumlah_poin = jumlah_poin + '$point' WHERE kd_member = '$kd_member' ");
			}
			//masuk tabel transaksi poin
			$ins = $db->query("INSERT INTO trans_points values ('', '$kd_member', '$tgl', '$id_user', '$nominal', '$nota', '$point')");
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

	case 'hadiah' :
		$kd_hadiah = $_POST['kd_hadiah'];
		$nama_hadiah = $_POST['nama_hadiah'];
		$ketentuan_poin = $_POST['ketentuan_poin'];
		$stok = $_POST['stok'];
		$tgl = date('Y-m-d');

		if($kd_hadiah == '' && $nama_hadiah == '' && $ketentuan_poin == ''){
			pesan("danger", "Mohon memasukan seluruh data pada form", base_url('hadiah.php'));
		} else {
			$ins = $db->query("INSERT INTO hadiah VALUES ('$kd_hadiah', '$nama_hadiah', '$ketentuan_poin', '$stok', 1) ");
			//insert ke tb log hadiah 
			$log = $db->query("INSERT INTO log_had VALUES ('', '$tgl', '$kd_hadiah', '1', '$stok', 'dari proses input data master', '') ");
			pesan("success", "Data Hadiah berhasil ditambahkan!", base_url('hadiah.php'));
		}

		break;

	case 'penukaran' : 
		//parsing data agar yang disimpan kode saja
		$member = $_POST['member'];
		$members = explode(' ', $member);
		
		$kd_member = $members[0];

		$kd_hadiah = $_POST['kd_hadiah'];
		$jml_tkr = $_POST['stok'];
		$user = $_SESSION['id'];
		$tgl = date('Y-m-d');

		//cek poin member
		$poin = $db->query("SELECT * FROM points WHERE kd_member = '$kd_member' ");
		$hadiah = $db->query("SELECT * FROM hadiah WHERE kd_hadiah = '$kd_hadiah' ")->fetch();
		if($poin->rowCount()==0){
			pesan("warning", "Member tersebut belum meiliki point sedikitpun", base_url('penukaran.php'));
		} else {
			$data = $poin->fetch();
			$jmlPoin = $data['jumlah_poin'];
			$ketentuan = $hadiah['ketentuan_poin'] * $jml_tkr;
			
			if($jmlPoin >= $ketentuan){
				//check stok barang 
				if($jml_tkr > $hadiah['stok']){
					pesan("warning", "Stok Hadiah tidak mencukupi!", base_url('penukaran.php'));
				} else {
					//insert ke tabel transaksi penukaran
					$tukar = $db->query("INSERT INTO trans_penukaran VALUES ('', '$kd_member', '$kd_hadiah','$jml_tkr',  '$tgl', '$user') ");
					$updatePoin = $db->query("UPDATE points SET jumlah_poin = jumlah_poin - '$ketentuan' WHERE kd_member = '$kd_member' ");
					$updateStok = $db->query("UPDATE hadiah SET stok = stok - '$jml_tkr' WHERE kd_hadiah = '$kd_hadiah' ");
					//INSERT KE TABEL LOG 
					$log = $db->query("INSERT into log VALUES ('', '$kd_member', '0', '$ketentuan', '$tgl', '$kd_hadiah')");
					//insert ke tabel log hadiah
					$log_had = $db->query("INSERT INTO log_had VALUES ('', '$tgl', '$kd_hadiah', '0', '$jml_tkr', 'ditukar customer', '$kd_member' ) ");

					pesan("success", "Transaksi Penukaran Berhasil", base_url('penukaran.php'));
				}
			} else {
				pesan("danger", "Poin member tersebut tidak cukup!", base_url('penukaran.php'));
			}
		}
		

		break;

	case 'stock' : 
		$kd_hadiah = $_POST['kd_hadiah'];
		$jumlah = $_POST['jumlah'];
		$keterangan = $_POST['keterangan'];
		$tgl = date('Y-m-d');
		$user = $_SESSION['id'];

		$query = "INSERT INTO log_had VALUES";
		$update = "";
		//insert menggunakan perulangan
		foreach($kd_hadiah as $key => $val){
			$data =  "('', '$tgl', '$val', 1,  '$jumlah[$key]', '$keterangan[$key]', '$user'),";
			$query .= $data;

			$upd = $db->query("UPDATE hadiah set stok = stok + '$jumlah[$key]' WHERE kd_hadiah = '$val'");	
		}
		$ins = substr($query, 0, -1). ";";
		$result = $db->query($ins);

		if($result){
			pesan("success", "Data stok hadiah berhasil ditambahkan", base_url('add-hadiah.php'));
		} else {
			pesan("danger", "Data stok hadiah gagal ditambahkan", base_url('add-hadiah.php'));
		}


		break;
	
	default:
		# code...
		break;
}

 ?>
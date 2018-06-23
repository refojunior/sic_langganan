<?php 

include_once "../config/koneksi.php";

$username = $_POST['username'];
$password = sha1($_POST['password']);

$login = $db->query("SELECT * FROM user WHERE username='$username' and password='$password'");
if($login->rowCount() >= 1){
	$data = $login->fetch();
	$_SESSION['username'] = $data['username'];
	$_SESSION['level'] = $data['level'];
	$loc = base_url('dashboard.php');
	pesan("success", "Login Berhasil", $loc);
} else {
	pesan("danger", "Username atau Password salah", base_url());
}



 ?>

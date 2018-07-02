<?php 
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_points';
$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8",$dbuser,$dbpass);

define("BASE_URL", "http://192.168.1.22/sic_langganan/");

date_default_timezone_set("Asia/Makassar");

function base_url($url = null){
	if(empty($url)){
		return BASE_URL;
	} else {
		return BASE_URL."$url";
	}
}

function cek_login(){
	$user = $_SESSION['username'];
	if($user == ''){
		$loc = base_url();
		pesan("danger", "Anda belum login", $loc);
	}
}

function cek_level(){
	$level = $_SESSION['level'];
	if($level != 'admin'){
		$loc = base_url('dashboard.php');
		pesan("danger", "Anda tidak memiliki hak untuk mengakses halaman tersebut!!!", $loc);
	}
}

function pesan($tag, $isi, $loc=null){
	$_SESSION[$tag] = $isi;
	if(!empty($loc)){
		header("location:$loc");
		exit;
	}
}

function msghandling($arr = array("danger", "success", "warning")){
	foreach($arr as $r){
		if(isset($_SESSION[$r])){
			echo "<div class='alert alert-$r'>$_SESSION[$r] <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> </div>";
			unset($_SESSION[$r]);
		}
	}
}





 ?>
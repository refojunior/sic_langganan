<?php 
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_points';
$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8",$dbuser,$dbpass);

define("BASE_URL", "http://localhost/sic_langganan/");

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

function ada_session(){
	if($_SESSION){
		$loc = base_url('dashboard.php');
		pesan("warning", "Anda sudah login", $loc);
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
			echo "<div class='alert alert-$r'>$_SESSION[$r]</div>";
			unset($_SESSION[$r]);
		}
	}
}





 ?>
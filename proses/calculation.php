<?php 
//include_once '../config/koneksi.php';
//total member
$total_member = $db->query("SELECT * FROM member")->rowCount();

//total points
$total_point = $db->query("SELECT sum(point) as poin FROM trans_points")->fetch(PDO::FETCH_ASSOC);

//member bulan ini 
$thisMonth= date('Y-m');

$bulanIni = $db->query("SELECT * FROM member where created like '$thisMonth%' ")->rowCount();

//blocked member
$blocked = $db->query("SELECT * FROM member WHERE stat != 1")->rowCount();




 ?>
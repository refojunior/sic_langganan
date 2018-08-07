<?php 
//wajib
include "config/koneksi.php";
cek_login();

$data = $_GET['data'];
if($data != ''){
    $get_member = $db->query("SELECT * FROM member WHERE nama_lengkap LIKE '%$data%' AND stat = 1 or kd_member like '%$data%' AND stat = 1");
    $output = '<ul class="member-ul">';
    if($get_member->rowCount() != 0) {
        foreach($get_member as $member){
            $output .= "<li class='member-li'>". $member['kd_member'] . " - " . $member['nama_lengkap'] . "</li>";
        }
    } else {
        $output .= "<li class='member-li'>Tidak ada data</li>";
    }
    $output .= "</ul>";
    echo $output;
} 
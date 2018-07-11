<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Laporan Members';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';

?>
<section class="content">
	<div class="card ">
        <div class="card-header">
          <h3 class="card-title">TOP MEMBERS</h3>
        </div>
        <div class="card-body">
      		<table id="example1" class="table table-bordered table-striped">
      			<thead>
      				<tr>
      					<th>No</th>
      					<th>Kode</th>
      					<th>Nama</th>
      					<th>Poin Sekarang</th>
      					<th>Poin Terbanyak</th>
      					<th>Action</th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php $tops = $db->query("SELECT a.kd_member, b.nama_lengkap, c.jumlah_poin,  SUM(a.point) as poin from trans_points a inner join member b on a.kd_member=b.kd_member 
						INNER JOIN points c on c.kd_member = a.kd_member
      					group by kd_member order by jumlah_poin desc  ");
      					$no=1;
      					foreach($tops as $data){
      			 	?>
      				<tr>
      					<td><?= $no++ ?></td>
      					<td><?= $data['kd_member'] ?></td>
      					<td><?= $data['nama_lengkap'] ?></td>
      					<td><?= number_format($data['jumlah_poin']) ?></td>
      					<td><?= number_format($data['poin']) ?></td>
      					<td><a href="history.php?kd=<?= $data['kd_member'] ?>" class="btn btn-info btn-sm">
	                  		show details
	                  	</a></td>
      				</tr>
      				<?php } ?>
      			</tbody>
      		</table>
      	</div>
    </div>
</section>



<?php require_once('layout/footer.php') ?>


<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'History Hadiah';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>

<section class="content">
	<div class="card">
		<div class="card-header">
			Data Hadiah 
		</div>
		<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Hadiah</th>
						<th>Nama Hadiah</th>
						<th>Stok Sekarang</th>
						<th>Show</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$hdh = $db->query("SELECT * FROM log_had a INNER JOIN hadiah b on a.kd_hadiah=b.kd_hadiah GROUP BY a.kd_hadiah ");
						$no = 1;
						foreach($hdh as $data) {  
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $data['kd_hadiah'] ?></td>
						<td><?= $data['nama_hadiah'] ?></td>
						<td><?= $data['stok'] ?></td>
						<td><a href="history_hadiah.php?kd=<?= $data['kd_hadiah'] ?>" class="btn btn-info btn-sm">details</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</section>


<?php require_once('layout/footer.php') ?>
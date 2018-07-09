<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header

if(isset($_GET['kd'])){
	$kd = $_GET['kd'];
	$title = 'History';
	$user = $_SESSION['username'];

	require_once 'layout/header.php';
	//navbar 
	require_once 'layout/navbar.php';

	//sidebar (menu)
	require_once 'layout/sidebar.php'; ?>

	<section class="content">
		<div class="card ">
	        <div class="card-header">
	        	<?php $m = $db->query("SELECT * FROM member WHERE kd_member = '$kd' ")->fetch(); ?>
	          <h3 class="card-title">Riwayat Member <b> <?= $m['kd_member'] . " - " . $m['nama_lengkap'] ?> </b> </h3>
	        </div>
	        <div class="card-body">
	      		<table id="example1" class="table table-bordered table-striped">
	      			<thead>
	      				<tr>
	      					<th>No</th>
	      					<th>Tanggal</th>
	      					<th>Dapat</th>
	      					<th>Tukar</th>
	      					<th>Keterangan</th>
	      					<th>Saldo Points</th>
	      				</tr>
	      			</thead>
	      			<tbody>
	      				<?php
	      					
	      					$no = 1;
	      					$lap = $db->query("SELECT 
	      									a.tanggal, 
	      									a.kd_member,
	      									b.nama_lengkap,
	      									a.ket,
	      									a.dapat_tukar,
	      									a.value,
	      									c.ketentuan_poin
	      									FROM log a 
											INNER JOIN member b on a.kd_member = b.kd_member
											LEFT join hadiah c on c.kd_hadiah = a.ket 
											WHERE a.kd_member = '$kd'
											ORDER BY a.tanggal asc ");

	      					$sum = 0;
	      					foreach($lap as $data){
	      						if($data['dapat_tukar'] == 1){
	      							$sum = $sum + $data['value'];
	      							$dapat = "<div style='color:green'>$data[value]</div>";
	      							$tukar = '';
	      							$ket = "Nota : <b> $data[ket] </b>";
	      						} else {
	      							$sum = $sum - $data['value'];
	      							$dapat = '';
	      							$tukar = "<div style='color:red'>$data[value] </div>";
	      							$banyak = $data['value'] / $data['ketentuan_poin'];
	      							$ket = "Hadiah : <b> $data[ket] ($banyak) </b>";
	      						}
	      				?>
		      				<tr>
		      					<td><?= $no++ ?></td>
		      					<td><?= $data['tanggal'] ?></td>
								<td><?= $dapat ?></td>
								<td><?= $tukar ?></td>
								<td><?= $ket ?></td>
								<td><?= number_format(abs($sum), 0, '', '.') ?></td>
		      				</tr>
		      			<?php } ?>
	      			</tbody>
	      			
	      		</table>
	      	</div>
	    </div>
	</section>
	
	<!-- FOOTER -->
	<?php require_once('layout/footer.php') ?>

<?php } else {
	pesan("warning", "Pilih member terlebih dahulu!", base_url('laporan_members.php'));
}



?>



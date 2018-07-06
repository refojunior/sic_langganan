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
	          <h3 class="card-title">Riwayat Member </h3>
	        </div>
	        <div class="card-body">
	      		<table id="example1" class="table table-bordered table-striped">
	      			<thead>
	      				<tr>
	      					<th>No</th>
	      					<th>Tanggal</th>
	      					<th>Kode</th>
	      					<th>Nama</th>
	      					<th>Dapat / Tukar</th>
	      					<th>Keterangan</th>
	      					<th>Value</th>
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
	      									e.nama_hadiah,
	      									d.nota,
	      									c.jml
	      									FROM log a 
											INNER JOIN member b on a.kd_member = b.kd_member 
											LEFT JOIN trans_penukaran c on a.ket = c.kd_hadiah
											LEFT JOIN trans_points d on a.ket = d.nota
											left JOIN hadiah e on e.kd_hadiah = a.ket 
											WHERE a.kd_member = '$kd'
											ORDER BY a.tanggal asc ");

	      					$sum = 0;
	      					foreach($lap as $data){
	      						if($data['dapat_tukar'] == 1){
	      							$sum = $sum + $data['value'];
	      							$dt = "<div style='color:green'>Dapat</div>";
	      							$ket = "No. Nota : <b>". $data['ket']. "</b>";
	      						} else {
	      							$sum = $sum - $data['value'];
	      							$dt = "<div style='color:red'>Tukar </div>";
	      							$ket = $data['nama_hadiah']. " (" . $data['jml'] . ")";
	      						}
	      				?>
		      				<tr>
		      					<td><?= $no++ ?></td>
		      					<td><?= $data['tanggal'] ?></td>
		      					<td><?= $data['kd_member'] ?></td>
		      					<td><?= $data['nama_lengkap'] ?></td>
								<td><?= $dt ?></td>
								<td><?= $ket ?></td>
								<td><?= $data['value'] ?></td>
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



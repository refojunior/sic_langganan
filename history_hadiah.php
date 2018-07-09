<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
if(isset($_GET['kd'])){
	$kd = $_GET['kd'];
	$title = 'History Hadiah';
	$user = $_SESSION['username'];

	require_once 'layout/header.php';
	//navbar 
	require_once 'layout/navbar.php';

	//sidebar (menu)
	require_once 'layout/sidebar.php'; ?>

	<section class="content">
		<div class="card ">
	        <div class="card-header">
	        	<?php $h=$db->query("SELECT * from hadiah WHERE kd_hadiah = '". $_GET['kd']. "'")->fetch(); ?>
				<h3><?= $h['kd_hadiah']. " - " . $h['nama_hadiah'] ?></h3>
	        </div>
	        <div class="card-body">
	      		<table id="example1" class="table table-bordered table-striped">
	      			<thead>
	      				<tr>
	      					<th>No</th>
	      					<th>Tanggal</th>
	      					<th>Masuk</th>
	      					<th>Keluar</th>
	      					<th>Keterangan</th>
	      					<td>Saldo</td>
	      					
	      				</tr>
	      			</thead>
	      			<tbody>
	      				<?php $no = 1;
	      				$kd = $_GET['kd'];
	      				$data = $db->query("SELECT * FROM log_had a  
											INNER JOIN hadiah b on a.kd_hadiah = b.kd_hadiah 
											WHERE b.kd_hadiah = '$kd';
	      					");
	      				$sum=0;
	      				foreach($data as $row) {
	      					if($row['masuk_keluar'] == 1){
	      							$sum = $sum + $row['jumlah'];
	      							$masuk = $row['jumlah'];
	      							$keluar = '';
	      							$ket = $row['keterangan'];
	      						} else {
	      							$sum = $sum - $row['jumlah'];
	      							$masuk = '';
	      							$keluar = $row['jumlah'];
	      							$ket = $row['keterangan']  . " : <b>" .$row['oleh']. "</b>";
	      						}
	      				 ?>
	      				
	      				<tr>
	      					<td><?= $no++ ?></td>
	      					<td><?= $row['tgl'] ?></td>
	      					<td><?= $masuk ?></td>
	      					<td><?= $keluar ?></td>
	      					<td><?= $ket ?></td>
	      					<td><?= $sum ?></td>
	      				</tr>
	      			<?php } ?>
	      			</tbody>
	      		</table>
	      	</div>
	    </div>
		
	</section>

	<!-- FOOTER -->
	<?php require_once('layout/footer.php'); ?>


<?php } else {
	pesan("warning", "Pilih member terlebih dahulu!", base_url('laporan_members.php'));
}

?>
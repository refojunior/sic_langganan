<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Laporan Points';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          	<div class="col-12">
          		<div class="callout callout-info ">
          			<h5>Tampilkan Transaksi Points </h5>
          			<form action="laporan_points.php" method="get">
          				<div class="row">
	          				<div class="col-md-6">
				              <h6>Dari Tanggal : </h6>
				              <input type="text" name="dari" class="form-control" id="datepicker" value="<?= (isset($_GET['dari']) ? $_GET['dari'] : '') ?>" required>
				            </div>
			            	<div class="col-md-6">
				              <h6>Sampai Tanggal : </h6>
				              <input type="text" name="sampai" class="form-control" id="datepicker2" value="<?= (isset($_GET['dari']) ? $_GET['sampai'] : '') ?>" required>
				            </div>
          				</div>
	          			<br>
	          			<div class="row ">
	          				<div class="col-md-12" align="right">
	          					<input type="submit" class="btn btn-flat btn-block" name="point" value="Tampilkan">
	          				</div>
	          			</div>
          			</form>
          			<div style="margin-top:14px"></div>
          		</div>
			</div>
		</div>
	</div>
</section>
<?php if (isset($_GET['point'])){

		$dari = $_GET['dari'];
		$sampai = $_GET['sampai'];
		if($dari > $sampai){
			echo "<script>alert('Tanggal Tidak Valid!!'); location.href='laporan_points.php'</script>";
			
		}
	 ?>
	<section class="content">
		<div class="card ">
	        <div class="card-header">
	          <h3 class="card-title">DATA TRANSAKSI DARI <b><?= $dari ?></b> SAMPAI <b><?= $sampai ?></b></h3>
	        </div>
	        <div class="card-body">
	      		<table id="example1" class="table table-bordered table-striped">
	      			<thead>
	      				<tr>
	      					<th>No</th>
	      					<th>Tanggal</th>
	      					<th>Kode</th>
	      					<th>Nama</th>
	      					<th>No Nota</th>
	      					<th>Nominal</th>
	      					<th>Points</th>
	      				</tr>
	      			</thead>
	      			<tbody>
	      				<?php
	      					
	      					$no = 1;
	      					$lap = $db->query("SELECT * FROM trans_points INNER JOIN member on trans_points.kd_member = member.kd_member WHERE trans_points.tgl BETWEEN '$dari' and '$sampai' ORDER by tgl desc ");
	      					foreach($lap as $data){
	      				 ?>
		      				<tr>
		      					<td><?= $no++ ?></td>
		      					<td><?= $data['tgl'] ?></td>
		      					<td><?= $data['kd_member'] ?></td>
		      					<td><?= $data['nama_lengkap'] ?></td>
								<td><?= $data['nota'] ?></td>
								<td><?= "Rp. ". number_format($data['nominal']) ?></td>
								<td><?= number_format($data['point']) ?></td>
		      				</tr>
		      			<?php } ?>
	      			</tbody>
	      			
	      		</table>
	      	</div>
	    </div>
	</section>

<?php } ?>

<?php require_once('layout/footer.php') ?>
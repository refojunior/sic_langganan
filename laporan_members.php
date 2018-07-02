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


if(isset($_GET['kd'])){
	$kd_member = $_GET['kd'];
	$get_mem = $db->query("SELECT * FROM trans_points a inner join member b on a.kd_member=b.kd_member where a.kd_member='$kd_member' "); 
	$no=1;
	$modal=1;
	 ?>
	

<!-- Modal -->
<div class="modal fade" id="teacherModal">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
		        <h5 class="modal-title">Detail Transaksi Member</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </div>
	        <div class="modal-body">
	        	<table class="table table-sm table-striped">
	        		<thead>
	        			<tr>
	        				<td>No</td>
	        				<td>Tanggal</td>
	        				<td>Kode</td>
	        				<td>Nama</td>
	        				<td>No. Nota</td>
	        				<td>Nominal</td>
	        				<td>Points</td>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php 
	        			 foreach($get_mem as $data){ ?>
	        			 <tr>
		        			<td><?= $no++ ?></td>
		        			<td><?= $data['tgl'] ?></td>
		        			<td><?= $data['kd_member'] ?></td>
		        			<td><?= $data['nama_lengkap'] ?></td>
		        			<td><?= $data['nota'] ?></td>
		        			<td><?= $data['nominal'] ?></td>
		        			<td><?= $data['point'] ?></td>
	        			</tr>
	        			<?php } ?>
	        		</tbody>
	        		
	        	</table>
	        	
	        </div>
	    </div>
	</div>
</div>


<?php } ?>

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
      					<th>Total Point</th>
      					<th>Action</th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php $tops = $db->query("SELECT a.kd_member, b.nama_lengkap,  SUM(a.point) as poin from trans_points a inner join member b on a.kd_member=b.kd_member group by kd_member order by poin desc  ");
      					$no=1;
      					foreach($tops as $data){
      			 	?>
      				<tr>
      					<td><?= $no++ ?></td>
      					<td><?= $data['kd_member'] ?></td>
      					<td><?= $data['nama_lengkap'] ?></td>
      					<td><?= $data['poin'] ?></td>
      					<td><a href="laporan_members.php?kd=<?= $data['kd_member'] ?>" class="btn btn-info btn-sm">
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

<?php if ($modal == 1) { ?>
	<script type="text/javascript">
    $(window).on('load',function(){
        $('#teacherModal').modal('show');
    });
	</script>
<?php } ?>

<script>
$(".modal").on("hidden.bs.modal", function(){
    window.location = "laporan_members.php";
});
</script>
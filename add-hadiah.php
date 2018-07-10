<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Add Hadiah';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';

?>

<section class="content">
	<div class="card card-primary card-outline">
		<div class="card-header">
			<h3 class="card-title">Add Stock Hadiah</h3>
		</div>
		<div class="card-body">
			<form action="proses/add.php?to=stock" method="post">
			<table class="table table-sm" id="addHadiahTable">
				<thead>
					<tr>
						<th>Hadiah</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<th>
							<select name="kd_hadiah[]" class="form-control" required>
								<option value=""> - PILIH - </option>
								<?php 
									$query = $db->query("SELECT * FROM hadiah WHERE stat = 1");
									foreach($query as $hadiah){ 
								 ?>
								 <option value="<?= $hadiah['kd_hadiah'] ?>"><?= $hadiah['kd_hadiah']. " - ". $hadiah['nama_hadiah'] ?></option>
								<?php } ?>
							</select>
						</th>
						<th><input type="number" class="form-control" name="jumlah[]" required></th>
						<th><input type="text" class="form-control" name="keterangan[]"></th>
					</tr>
					
				</tbody>
			</table>
			
			<a href="" class="btn-plus"> <i class="fa fa-plus"></i> Tambah Baris</a>
			<br><br>
			<input type="submit" value="Simpan" class="btn btn-secondary">
			</form>
		</div>
	</div>
</section>



<?php require_once('layout/footer.php');
$data = $db->query("SELECT * FROM hadiah where stat = 1");
?>

<script>
	$(document).ready(function(){
		var row = 0;

		$('.btn-plus').click(function(e){
			e.preventDefault();
			row++;
			var html = '<tr id="row'+row+'">';
			html += "<td> <select name='kd_hadiah[]' class='form-control'>";
			html += "<option value=''>- PILIH -</option>";
			html += "<?php foreach($data as $row){ ?>";
			html += "<option value='<?= $row['kd_hadiah'] ?>'><?= $row['kd_hadiah']. ' - '. $row['nama_hadiah'] ?></option>";
			html += "<?php } ?>";
			html += "</select></td>";
			html += "<th><input type='number' class='form-control' name='jumlah[]'></th>";
			html += "<th><input type='text' class='form-control' name='keterangan[]'></th>";
			html += '<td><button type="button" data-row="row'+row+'" class="btn btn-sm btn-danger fa fa-minus btn-minus"></button></td>';
            html += '</tr>';
            $('#addHadiahTable').append(html);
		});

		$(document).on('click', '.btn-minus', function(e){
			e.preventDefault();
			var data_row = $(this).attr('data-row');

			$('#'+data_row).remove();

			row--;
		});
	});

</script>
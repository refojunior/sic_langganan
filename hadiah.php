<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Hadiah';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>
<section class="content">
  	<div class="col-md-6">
      	<a data-toggle="collapse" href="#collapseMember" class="btn btn-flat btn-primary"><?= (!isset($_GET['kd']) ? 'Add hadiah' : 'Edit hadiah') ?></a>
        <?php if(!isset($_GET['kd'])){ ?>
        <!-- FORM INPUT -->
        <div class="card card-primary">
            <div id="collapseMember" class="panel-collapse collapse in">
              	<div class="card-body">
              		<!-- FORM INPUT -->
	                <form action="proses/add.php?to=hadiah" method="post">
	                	<div class="row">
	                		<div class="card-body col-md-12">
							  <div class="form-group">
				                <label>Kode Hadiah</label>
				                <input type="text" class="form-control" name="kd_hadiah" placeholder="Kode Hadiah">
				              </div>
				              <div class="form-group">
				                <label>Nama Hadiah</label>
				                <input type="text" class="form-control" name="nama_hadiah" placeholder="Nama Hadiah">
				              </div>
				              <div class="form-group">
				                <label>Ketentuan Poin</label>
				                <input type="text" class="form-control" name="ketentuan_poin" placeholder="Ketentuan Poin">
				              </div>
				              <div class="form-group">
				                <label>Stok</label>
				                <input type="text" class="form-control" name="stok" placeholder="Stok">
				              </div>

				              <div class="form-group">
								<button type="submit" class="btn btn-success btn-flat">Submit</button>
							  </div>
			            	</div>
	               		</div>
			        </form>
			     
              	</div>
            </div>
        </div>

        <?php } else { 
        	$kd_hadiah = $_GET['kd'];
        	$get_hadiah = $db->query("SELECT * FROM hadiah WHERE kd_hadiah = '$kd_hadiah' ");
        	if ($get_hadiah->rowCount()==0) {
        		echo "<script>alert('Data hadiah tidak ditemukan'); location.href='hadiah.php'</script>";
        		//pesan("warning", "Data Member tidak ditemukan", "members.php");
        	}
        	$row = $get_hadiah->fetch();
        ?>
        <!-- FORM EDIT -->
        <div class="card card-primary">
            <div id="collapseMember" class="panel-collapse ">
              	<div class="card-body">
	                <form action="proses/edit.php?to=hadiah&kd=<?= $row['kd_hadiah'] ?>" method="post">
	                	<div class="row">
	                		<div class="card-body col-md-12">
							  <div class="form-group">
				                <label>Kode Hadiah</label>
				                <input type="text" class="form-control" name="kd_hadiah" value="<?= $row['kd_hadiah'] ?>">
				              </div>
				              <div class="form-group">
				                <label>Nama Hadiah</label>
				                <input type="text" class="form-control" name="nama_hadiah" value="<?= $row['nama_hadiah'] ?>">
				              </div>
				              <div class="form-group">
				                <label>Ketentuan Poin</label>
				                <input type="text" class="form-control" name="ketentuan_poin" value="<?= $row['ketentuan_poin'] ?>">
				              </div>
				              <div class="form-group">
				                <label>Stok</label>
				                <input type="text" class="form-control" name="stok" value="<?= $row['stok'] ?>">
				              </div>

				              <div class="form-group">
								<button type="submit" class="btn btn-success btn-flat">Submit</button>
							  </div>
			            	</div>
	               		</div>
			        </form>
			     
              	</div>
            </div>
        </div>
    	<?php } ?>
  	</div>
</section>

<section class="content">
 <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Table Hadiah</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Kode Hadiah</th>
              <th>Nama Hadiah </th>
              <th>Ketentuan Poin</th>
              <th>Stok Akhir</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php $sql = $db->query("SELECT * FROM hadiah WHERE stat = 1"); 
        	foreach($sql as $row){ ?>
            <tr>
              <td><?= $row['kd_hadiah'] ?></td>
              <td><?= ucwords($row['nama_hadiah']) ?></td>
              <td><?= number_format($row['ketentuan_poin']) ?></td>
              <td><?= $row['stok'] ?></td>
              <td>
              	<a href="hadiah.php?kd=<?= $row['kd_hadiah'] ?>" class="btn btn-warning btn-sm">
              		edit
              	</a>
			  	<a href="proses/delete.php?to=hadiah&kd=<?= $row['kd_hadiah'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus hadiah?')">
			  		blokir
			  	</a>
              </td>
            </tr>
        	<?php } ?>

      </table>
    </div>
  </div>
</section>


<?php require_once('layout/footer.php') ?>
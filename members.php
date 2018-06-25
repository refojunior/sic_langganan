<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Members';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>
    <section class="content">
      	<div class="col-md-12">
	      	<a data-toggle="collapse" href="#collapseMember" class="btn btn-flat btn-primary"><?= (!isset($_GET['kd']) ? 'Add Member' : 'Edit Member') ?></a>
	        <?php if(!isset($_GET['kd'])){ ?>
	        <!-- FORM INPUT -->
	        <div class="card card-primary">
	            <div id="collapseMember" class="panel-collapse collapse in">
	              	<div class="card-body">
	              		<!-- FORM INPUT -->
		                <form action="proses/add.php?to=member" method="post">
		                	<div class="row">
		                		<div class="card-body col-md-6">
								  <div class="form-group">
					                <label>Kode Member</label>
					                <input type="text" class="form-control" name="kd_member" placeholder="Kode Member">
					              </div>
					              <div class="form-group">
					                <label>Nama Lengkap</label>
					                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
					              </div>
					              <div class="form-group">
					                <label>Tempat Lahir</label>
					                <input type="text" class="form-control" name="tempat_lhr" placeholder="Tempat Lahir">
					              </div>
					              <div class="form-group">
					                <label>Tanggal Lahir</label>
					                <input type="text" id="datepicker" class="form-control" name="tgl_lhr" placeholder="Tanggal Lahir">
					              </div>
				            	</div>
					            <div class="card-body col-md-6">
								  <div class="form-group">
					                <label >Jenis Kelamin</label> <br>
					               	<input type="radio" name="jk" value="l" class="minimal" checked> Laki Laki
					               	&nbsp;&nbsp;&nbsp;
					               	<input type="radio" name="jk" value="p" class="minimal"> Perempuan
					              </div>
					              <div class="form-group">
					                <label>Alamat</label>
					                <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					              </div>
					              <div class="form-group">
					                <label>No. Telp</label>
					                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp">
					              </div>
					              <div class="form-group">
					                <label>Email</label>
					                <input type="email" name="email" class="form-control" placeholder="Email">
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
	        	$kd_member = $_GET['kd'];
	        	$get_member = $db->query("SELECT * FROM member WHERE kd_member = '$kd_member' ");
	        	$row = $get_member->fetch();
	        ?>
	        <!-- FORM EDIT -->
	        <div class="card card-primary">
	            <div id="collapseMember" class="panel-collapse ">
	              	<div class="card-body">
		                <form action="proses/edit.php?to=member" method="post">
		                	<div class="row">
		                		<div class="card-body col-md-6">
								 <input type="hidden" name="kd_member" value="<?= $row['kd_member'] ?>">
					              <div class="form-group">
					                <label>Nama Lengkap</label>
					                <input type="text" class="form-control" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" placeholder="Nama Lengkap">
					              </div>
					              <div class="form-group">
					                <label>Tempat Lahir</label>
					                <input type="text" class="form-control" name="tempat_lhr" value="<?= $row['tempat_lhr'] ?>" placeholder="Tempat Lahir">
					              </div>
					              <div class="form-group">
					                <label>Tanggal Lahir</label>
					                <input type="text" id="datepicker" value="<?= $row['tgl_lhr'] ?>" class="form-control" name="tgl_lhr" placeholder="Tanggal Lahir">
					              </div>
					              <div class="form-group">
					                <label >Jenis Kelamin</label> <br>
					               	<input type="radio" name="jk" value="l" class="minimal" <?= ($row['jk'] == 'l' ? 'checked' : '') ?>> Laki Laki
					               	&nbsp;&nbsp;&nbsp;
					               	<input type="radio" name="jk" value="p" class="minimal" <?= ($row['jk'] == 'p' ? 'checked' : '') ?>> Perempuan
					              </div>
				            	</div>
					            <div class="card-body col-md-6">
				                  <div class="form-group">
				                    <label>Alamat</label>
				                    <textarea class="form-control" rows="3" name="alamat" placeholder="Enter ..."><?= $row['alamat'] ?></textarea>
				                  </div>
					              <div class="form-group">
					                <label>No. Telp</label>
					                <input type="number" name="no_telp" class="form-control" value="<?= $row['no_telp'] ?>" placeholder="No. Telp">
					              </div>
					              <div class="form-group">
					                <label>Email</label>
					                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" placeholder="Email">
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
    	 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table Member</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Kode</th>
	                  <th>Nama </th>
	                  <th>TTL</th>
	                  <th>JK</th>
	                  <th>Alamat</th>
	                  <th>Telp</th>
	                  <th>Email</th>
	                  <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	<?php $sql = $db->query("SELECT * FROM member WHERE stat = 1"); 
                	foreach($sql as $row){ ?>
	                <tr>
	                  <td><?= $row['kd_member'] ?></td>
	                  <td><?= ucwords($row['nama_lengkap']) ?></td>
	                  <td><?= ucwords($row['tempat_lhr']).", ".$row['tgl_lhr'] ?></td>
	                  <td><?= ($row['jk']== 'l' ? 'Laki - Laki' : 'Perempuan') ?></td>
	                  <td><?= ucwords($row['alamat']) ?></td>
	                  <td><?= strtoupper($row['no_telp']) ?></td>
	                  <td><?= $row['email'] ?></td>
	                  <td>
	                  	<a href="members.php?kd=<?= $row['kd_member'] ?>" class="btn btn-warning btn-sm">
	                  		edit
	                  	</a>
					  	<a href="proses/delete.php?kd=<?= $row['kd_member'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan memblokir member?')">
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
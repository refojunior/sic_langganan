<?php 
//wajib
include "config/koneksi.php";
cek_login();
cek_level();
 
//header
$title = 'Users';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>
    <section class="content">
      	<div class="col-md-6">
	      	<a data-toggle="collapse" href="#collapseMember" class="btn btn-flat btn-primary">Tambah User</a>
	   
	        <!-- FORM INPUT -->
	        <div class="card card-primary">
	            <div id="collapseMember" class="panel-collapse collapse in">
	              	<div class="card-body">
	              		<!-- FORM INPUT -->
		                <form action="proses/add.php?to=users" method="post">
		                	<div class="row">
		                		<div class="card-body col-md-12">
								  <div class="form-group">
					                <label>Username</label>
					                <input type="text" class="form-control" name="username" placeholder="Username" required>
					              </div>
					              <div class="form-group">
					                <label>Password</label>
					                <input type="password" class="form-control" name="password" placeholder="Password" required>
					              </div>
					              <div class="form-group">
					                <label>Re-type Password</label>
					                <input type="password" class="form-control" name="retype_password" placeholder="Re-ype Password" required>
					              </div>
					              <div class="form-group">
					                <label>Level</label>
					                <select name="level" class="form-control" required>
					                	<option value="">- PILIH -</option>
					                	<option value="admin">Admin</option>
					                	<option value="operator">Operator</option>
					                </select>
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

      	</div>
    </section>

    <section class="content">
    	 <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Table User</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Username </th>
	                  <th>Level</th>
	                  <th>Blokir</th>
	                </tr>
                </thead>
                <tbody>
                	<?php $sql = $db->query("SELECT * FROM user WHERE stat = 1"); 
                	foreach($sql as $row){ ?>
	                <tr>
	                  <td><?= $row['username'] ?></td>
	                  <td><?= $row['level'] ?></td>
	             
	                  <td>
					  	<a href="proses/delete.php?to=users&kd=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan memblokir member?')">
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
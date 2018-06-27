<?php 
//wajib
include "config/koneksi.php";
cek_login();
cek_level();
 
//header
$title = 'Blocked';
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
              <h3 class="card-title">Data Table Blocked Member</h3>
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
                	<?php $sql = $db->query("SELECT * FROM member WHERE stat = 0"); 
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
					  	<a href="proses/edit.php?to=unblock&kd=<?= $row['kd_member'] ?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin akan unblock member?')">
					  		unblock
					  	</a>
	                  </td>
	                </tr>
	            	<?php } ?>

              </table>
            </div>
          </div>
    </section>
<?php require_once('layout/footer.php') ?>
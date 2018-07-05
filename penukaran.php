<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Penukaran';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>

<section class="content">
	<div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Penukaran Hadiah</h3>
          </div>
          <form action="proses/add.php?to=penukaran" method="post">
            <div class="card-body">
              <div class="form-group">
                <label >Kode Member</label>
                <select name="kd_member" class="form-control" required>
                  <option value=""> - PILIH - </option>
                  <?php $sql = $db->query("SELECT * FROM member where stat = 1"); 
                      foreach($sql as $col){ ?>
                        <option value="<?= $col['kd_member'] ?>">
                          <?= $col['kd_member']." - ". ucwords($col['nama_lengkap']) ?>
                        </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label >Kode Hadiah</label>
                <select name="kd_hadiah" class="form-control" required>
                  <option value=""> - PILIH - </option>
                  <?php $had = $db->query("SELECT * FROM hadiah where stat = 1"); 
                      foreach($had as $iah){ ?>
                        <option value="<?= $iah['kd_hadiah'] ?>">
                          <?= $iah['nama_hadiah']." - ". ucwords($iah['ketentuan_poin']) ." Points" ?>
                        </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="stok" value="1">
              </div>
              
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success btn-flat">Submit</button>
            </div>
          </form>
        </div>
    </div>
</section>



<?php require_once('layout/footer.php') ?>
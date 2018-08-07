<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Points';
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
            <h3 class="card-title">Form Tambah Points</h3>
          </div>
          <form action="proses/add.php?to=points" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Member</label>
                <input type="text" class="form-control" id="member" name="member" placeholder="Masukan Kode / Nama Member">
                <div id="member-list"></div>
              </div>
              <div class="form-group">
                <label>Nomor Nota</label>
                <input type="text" name="nota" class="form-control" placeholder="No. Nota" required>
              </div>
              <div class="form-group">
                <label>Nominal</label>
                <input type="text" name="nominal" class="form-control" id="nominal" placeholder="Nominal" required>
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


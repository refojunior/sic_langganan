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
          <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label >Kode Member</label>
                <input type="email" class="form-control" placeholder="Kode Member">
              </div>
              <div class="form-group">
                <label>Nomor Nota</label>
                <input type="nota" class="form-control" placeholder="No. Nota">
              </div>
              <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control" placeholder="Nominal">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>
<?php require_once('layout/footer.php') ?>
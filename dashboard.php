<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Dashboard';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';

//kalkulasi data 
require_once 'proses/calculation.php';
?>
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=  $total_hadiah['stock']; ?></h3>

                <p>Stock Hadiah</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="<?= base_url('hadiah.php'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $total_member ?></h3>

                <p>Total Member</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('members.php'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $bulanIni ?></h3>
                <p>Member Baru Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('members.php'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $blocked ?></h3>

                <p>Member Diblacklist</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="blocked.php" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Sistem Informasi Customer Langganan</h3>
        </div>
        <div class="card-body">
          Sistem ini merupakan sistem yang digunakan untuk menanage data pembelian customer, dimana tiap nominal dari pembelian customer tersebut akan mendapatkan point. Perhitungan pendapatan point didapat dari jumlah nominal, semakin besar nominal pembelian maka akan mendapatkan point lebih banyak pula.
        </div>
     
      </div>

    </section>

<?php require_once('layout/footer.php') ?>
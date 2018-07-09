  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard.php') ?>" class="brand-link">
      <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SI Customer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-<?= ($title=='Dashboard' || $title=='Members' || $title=='Users' || $title=='Hadiah') ? 'open' : '' ?>">
            <a href="#" class="nav-link <?= ($title=='Dashboard' || $title=='Members' || $title=='Users' || $title=='Hadiah') ? 'active' : '' ?>">
              <i class="nav-icon fa fa-circle-o"></i>
              <p>
                MASTER DATA
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('dashboard.php') ?>" class="nav-link <?= ($title=='Dashboard') ? 'active' : '' ?>">
                  <i class="fa fa-dashboard nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('members.php') ?>" class="nav-link <?= ($title=='Members') ? 'active' : '' ?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('hadiah.php') ?>" class="nav-link <?= ($title=='Hadiah') ? 'active' : '' ?>">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Hadiah</p>
                </a>
              </li>
              
              <?php if($_SESSION['level'] == 'admin'){ ?>
              <li class="nav-item">
                <a href="users.php" class="nav-link <?= ($title=='Users') ? 'active' : '' ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item has-treeview menu-<?= ($title=='Points' || $title=='Blocked' || $title=='Penukaran') ? 'open' : '' ?>">
            <a href="#" class="nav-link <?= ($title=='Points' || $title=='Blocked' || $title=='Penukaran') ? 'active' : '' ?>">
              <i class="nav-icon fa fa-circle-o"></i>
              <p>
                TRANSAKSI
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="<?= base_url('points.php') ?>" class="nav-link <?= ($title=='Points') ? 'active' : '' ?>">
                  <i class="fa fa-database nav-icon"></i>
                  <p>Points</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('penukaran.php') ?>" class="nav-link <?= ($title=='Penukaran') ? 'active' : '' ?>">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>Penukaran</p>
                </a>
              </li>
              
              <?php if($_SESSION['level'] == 'admin'){ ?>
             
              <li class="nav-item">
                <a href="blocked.php" class="nav-link <?= ($title=='Blocked') ? 'active' : '' ?>">
                  <i class="fa fa-ban nav-icon"></i>
                  <p>Blocked Members</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item has-treeview menu-<?= ($title=='Laporan Points' || $title=='Laporan Members' || 
          $title=='History' || $title=='Laporan Penukaran' || $title=='History Hadiah' ) ? 'open' : '' ?>">
            <a href="" class="nav-link <?= ($title=='Laporan Points' || $title=='Laporan Members' || $title=='History' || $title=='Laporan Penukaran' || $title=='History Hadiah') ? 'active' : '' ?>">
              <i class="nav-icon fa fa-circle-o"></i>
              <p>
                Laporan
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?= base_url('laporan_points.php') ?>" class="nav-link <?= ($title=='Laporan Points') ? 'active' : '' ?>">
                  <p><i class="fa fa-angle-double-right"></i>Transaksi Points</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?= base_url('laporan_penukaran.php') ?>" class="nav-link <?= ($title=='Laporan Penukaran') ? 'active' : '' ?>">
                  <p><i class="fa fa-angle-double-right"></i> Transaksi Penukaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('laporan_members.php') ?>" class="nav-link <?= ($title=='Laporan Members' || $title=='History') ? 'active' : '' ?>">
                  <p><i class="fa fa-angle-double-right"></i> History Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('laporan_hadiah.php') ?>" class="nav-link <?= ($title=='History Hadiah') ? 'active' : '' ?>">
                  <p><i class="fa fa-angle-double-right"></i> History Hadiah</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <?= msghandling(); ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          
        </div>
      
      </div>
    </section>
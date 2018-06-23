<?php 
//wajib
include "config/koneksi.php";


//header
$title = 'Login';
require_once 'layout/header.php';

?>

<style>
	body {
		background: #F1F1F1;
	}
	.box-custom {
		border-radius:10px;
	}
	.footer-login{
		font-size: 13px;
	}
</style>

<div class="login-box">
  <div class="login-logo">
    <a><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body box-custom">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="proses/login.php" method="post">
      	
      	<?= msghandling() ?>
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    </div>
    <!-- /.login-card-body -->
  </div>
  <p align="center" class="footer-login">Copyright 2018 - Refo & Roni</p>
</div>
<!-- /.login-box -->
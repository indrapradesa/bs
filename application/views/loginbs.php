<html>
<head>
    <title>Login - CodeIgniter</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('../../vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('../../vendors/iconfonts/puse-icons-feather/feather.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('../../vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('../../vendors/css/vendor.bundle.addons.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="POST" action="<?php echo base_url() ?>loginbs">
                <center><h1>LOGIN</h1></center>
                <center><h2>BANK SAMPAH</h2></center>
                <center>Kabupaten Malang</center>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <?php echo form_error('username'); ?>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="*********">
                    <?php echo form_error('password'); ?>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
              </form>
            </div>
            <p class="footer-text text-center">Copyright © 2018 DLH(Dinas Lingkungan Hidup). All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 <script src="<?php echo base_url('../../vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?php echo base_url('../../vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('../../js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('../../js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('../../js/misc.js')?>"></script>
  <script src="<?php echo base_url('../../js/settings.js')?>"></script>
  <script src="<?php echo base_url('../../js/todolist.js')?>"></script>
</body>
</html>
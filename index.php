<!DOCTYPE html>
<?php
include('config.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN | IT PORTAL MANAGEMENT</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/green.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <br>
    <div class="login-box">
      <div class="login-logo">
        <a href="../index.php">IT PORTAL <STRONG>MANAGEMENT</STRONG></a>
      </div><!-- /.login-logo -->
      <!-- /.PESAN KESALAHAN -->
      <?php 
	  	if (!empty($_GET['error']) && $_GET['error'] == '1') {
      ?>
		<div class="alert alert-error fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Kesalahan!</strong> Kolom username dan password kosong.
		</div>
    	<?php
		} else if (!empty($_GET['error']) && $_GET['error'] == '2') {
		?>
		<div class="alert alert-error fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Kesalahan!</strong> Kolom username kosong.
		</div>
    	<?php
		} else if (!empty($_GET['error']) && $_GET['error'] == '3') {
		?>
		<div class="alert alert-error fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Kesalahan!</strong> Kolom password kosong.
		</div>
    	<?php
		} else if (!empty($_GET['error']) && $_GET['error'] == '4') {
		?>
		<div class="alert alert-error fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Kesalahan!</strong> akun atau password tidak terdaftar atau salah.
		</div>
      <?php
		}
		?>
      <!-- /.PESAN KESALAHAN -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan login dengan menggunakan akun anda!</p>
        <form action="validasi.php" method="post">
          <div class="form-group has-feedback">
            <input required type="username" name="username" class="form-control" placeholder="Username..." maxlength="10">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input required type="password" name="password" class="form-control" placeholder="Password..." maxlength="10">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

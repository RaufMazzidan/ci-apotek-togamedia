<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Togamedia</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>/assets/img/logo-dark.png" alt="Logo"></div>
								<p class="lead">Login to your account</p>
								<?php 
									if ($this->session->userdata('pesan') == NULL) {
																		
									}
									else{
										?>

										<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> <?=$this->session->userdata('pesan')?>
									</div>
											<?php
									}

								 ?>
							</div>
							<form class="form-auth-small" action="<?=base_url('index.php/user/proses_login')?>" method="post">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username">
									<br>
								<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="LOGIN">
								
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">TOKO BUKU TOGAMEDIA</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
	<script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>/assets/scripts/klorofil-common.js"></script>
</html>

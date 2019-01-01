<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/chartist/css/chartist-custom.css">

	
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" href="<?=base_url()?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?=base_url()?>/assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
					<li>
						<?php
						if ($this->session->userdata('notif') != NULL) { ?>
						<div style="margin-left: 5%; margin-right: 5%;margin-top: 5%" class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-info"></i> <?=$this->session->userdata('notif')?>
						</div>
						<?php } ?>
					</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"></i> <span>
								<?php 
								if ($this->session->userdata('login') == TRUE) {
									echo $this->session->userdata('nama_user');
								}
								else{
									echo "Nama User";
								}
								?>
							</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="" style="pointer-events: none;"><i class="lnr lnr-user"></i> <span><?=$this->session->userdata('level');?></span></a></li>
								<li><a href="<?=base_url('index.php/user')?>"><i class="lnr lnr-enter"></i> <span>Login</span></a></li>
								<li><a href="<?=base_url('index.php/user/logout')?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">

						<li><a href="<?=base_url('index.php/home')?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="<?=base_url('index.php/kategori')?>" class=""><i class="lnr lnr-crop"></i> <span>Kategori</span></a></li>
						<li><a href="<?=base_url('index.php/buku')?>" class=""><i class="lnr lnr-book"></i> <span>Buku</span></a></li>
						<?php if ($this->session->userdata('level') == 'kasir'): ?>
							<li><a href="<?=base_url('index.php/transaksi')?>" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
						<?php endif ?>
						<li><a href="<?=base_url('index.php/history_beli')?>" class=""><i class="lnr lnr-history"></i> <span>History Pembelian</span></a></li>
						<?php if ($this->session->userdata('level') == 'admin'): ?>
						<li><a href="<?=base_url('index.php/kasirsetting')?>" class=""><i class="lnr lnr-users"></i> <span>Account Setting</span></a></li>
						<?php endif ?>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<?php 
		$this->load->view($konten);
		?>

	</div>
	<!-- END MAIN -->
	<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
		</div>
	</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?=base_url()?>/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?=base_url()?>/assets/vendor/toastr/toastr.min.js"></script>
<script src="<?=base_url()?>/assets/scripts/klorofil-common.js"></script>
<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
			[23, 29, 24, 40, 25, 24, 35],
			[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
			[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
</script>
</body>

</html>

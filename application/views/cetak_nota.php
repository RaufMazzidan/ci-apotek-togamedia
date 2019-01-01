<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nota</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css">
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
	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<!-- BASIC TABLE -->
						<div class="panel">
							<div class="panel-heading">
							<img src="<?=base_url()?>/assets/img/logo-dark.png">
							<br>
								<h3 class="panel-title">Cetak Nota</h3>
								
							</div>
							<div class="panel-body">
								<table align="left">
									<tr>
										<td>Nama Pembeli</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td><?=$nota->nama_pembeli?></td>
									</tr>
									<tr>
										<td>Tanggal</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?=$nota->tanggal?></td>
									</tr>
									<tr>
										<td>Kasir</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td><td><?=$nota->nama_user?></td>
									</tr>
									<tr>&nbsp;</tr>
									<tr>
										<table align="center" class="table table-striped">
											<tr>
												<th>No</th>
												<th>Judul Buku</th>
												<th>Harga</th>
												<th>Jumlah</th>
												<th>Subtotal</th>
											</tr>
											<?php 
											$no=1;
											foreach ($this->trans->detail_pembelian($nota->kode_transaksi) as $det) { ?>
											<tr>

												<td><?=$no++?></td>
												<td><?=$det->judul_buku?></td>
												<td>Rp. <?=number_format($det->harga)?></td>
												<td><?=$det->jumlah?></td>
												<td>Rp. <?php $sub =  $det->harga * $det->jumlah; echo number_format($sub);?></td>
											</tr>
											<?php } ?>
											<tr>
												<td colspan="4" align="center">Grandtotal</td>
												<td>Rp. <?=number_format($nota->total)?></td>
											</tr>
										</table>
									</tr>
								</table>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	window.print();
	location.href="<?=base_url('index.php/transaksi')?>"
</script>

</html>
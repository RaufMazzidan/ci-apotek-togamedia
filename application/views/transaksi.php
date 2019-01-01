<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Transaksi</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
						</div>
						<?php
						if ($this->session->userdata('pesan') != NULL) { ?>
						<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-info"></i> <?=$this->session->userdata('pesan')?>
						</div>
						<?php } ?>
						<div class="panel-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Buku</th>
										<th>Kategori</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($list_buku as $list) {
										?>
										<tr>
											<td><?=$no++;?></td>
											<td><?=$list->judul_buku?></td>
											<td><?=$list->nama_kategori?></td>
											<td>Rp. <?=number_format($list->harga)?></td>
											<td><?=$list->stok?></td>
											<td><a class="btn btn-primary" href="<?=base_url('index.php/transaksi/addcart/'.$list->kode_buku)?>" data-toggle="modal"><span class="lnr lnr-cart"></span> Beli</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END RECENT PURCHASES -->
					</div>
					<div class="col-md-6">
						<!-- RECENT PURCHASES -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Cart</h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
							</div>
							<?php
							if ($this->session->userdata('pesan_list') != NULL) { ?>
							<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-info"></i> <?=$this->session->userdata('pesan_list')?>
							</div>
							<?php }elseif ($this->session->userdata('kembalian') != NULL) { ?>
								<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-info"></i> Kembalian Rp. <?= number_format($this->session->userdata('kembalian')) ?>
								</div>
								<?php } ?>
							<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Judul Buku</th>
												<th>Qty</th>
												<th>Harga</th>
												<th>Subtotal</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no=1;
											foreach ($this->cart->contents() as $list) {
												?>

												<input type="hidden" name="kode_buku[]" value="<?=$list['id']?>">
												<input type="hidden" name="rowid[]" value="<?=$list['rowid']?>">
												<tr>
													<td><?=$no++;?></td>
													<td><?=$list['name']?></td>
													<td><input type="number" name="qty[]" class="form-control" style="width: 55px;" value="<?=$list['qty']?>"></td>
													<td>Rp. <?= number_format($list['price'])?></td>
													<td>Rp. <?= number_format($list['subtotal'])?></td>
													<td><a class="btn btn-danger" href="<?=base_url('index.php/transaksi/hapus_cart/'.$list['rowid'])?>" onclick="return confirm('Apakah Anda Yakin ?')" data-toggle="modal"><span class="lnr lnr-trash"></span> Delete</a></td>
												</tr>

												<?php } ?>
												<tr>
													<input type="hidden" name="grandtotal" value="<?=$this->cart->total()?>">
													<td colspan="1"></td>
													<td colspan="3">Grandtotal</td>
													<td>Rp. <?=number_format($this->cart->total())?></td>
													<td><a style="margin-left: -2%" class="btn btn-danger" href="<?=base_url('index.php/transaksi/clearcart')?>" onclick="return confirm('Apakah Anda Yakin ?')" data-toggle="modal">Clear Cart</a></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-4">
												<input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli">
											</div>
											<div class="col-md-4">
												<input type="text" name="uang_bayar" class="form-control" placeholder="Uang Bayar">
											</div>
											<div class="col-md-1"><input style="width: 50px; margin-left: -30%; padding-left: 10px" type="submit" name="update" class="btn btn-primary" value="QTY"></div>
											<div class="col-md-3"><input type="submit" name="bayar" class="btn btn-success" value="Checkout"></div>
										</div>
										<div class="row">
											<div class="col-md-6">
												
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
			dataType:"json",
			success:function(data) {
				$("#kode_kategori").val(data.kode_kategori);
				$("#nama_kategori").val(data.nama_kategori);
			}

		});
	}
</script>
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-md-12">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">History Pembelian</h3>
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
						<?php } ?>
						<div class="panel-body no-padding">
							<table  id="datatable" class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Transaksi</th>
										<th>Nama Pembeli</th>
										<th>Nama Kasir</th>
										<th>Total</th>
										<th>Tanggal</th>
										<th>Detail</th>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach ($history as $list):
											?>
										<tr>
											<td><?=$no++;?></td>
											<td><?=$list->kode_transaksi?></td>
											<td><?=$list->nama_pembeli?></td>
											<td><?=$list->nama_user?></td>
											<td>Rp. <?= number_format($list->total)?></td>
											<td><?=$list->tanggal?></td>
											<td>
												<a href="#<?=$list->kode_transaksi?>" data-toggle="modal"><span class="fa fa-shopping-bag"></span> Detail</a>
											</td>
										</tr>
									<?php endforeach ?>

									<?php  foreach ($history as $list):?>
										<div class="modal fade" id="<?=$list->kode_transaksi?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>
														<h4 class="modal-title">Detail Pembelian</h4>
													</div>
													<div class="modal-body">

														<input type="hidden" name="kode_buku" id="kode_buku">

															<?php foreach ($this->trans->detail_pembelian($list->kode_transaksi) as $det): ?>
																<div class="container-fluid">
																<div class="row">
																	<div class="col-md-4">
																		<div class="thumbnail">
																			<img style="width: 100%" src="<?=base_url('assets/cover/'.$det->foto_cover)?>">
																		</div>
																	</div>
																	<div class="col-md-8">
																	<br><br>
																		<div class="row">
																		<div class="col-md-4">Judul Buku</div>
																		<div class="col-md-1">:</div>
																		<div class="col-md-7"><?=$det->judul_buku?></div><p></p>
																		</div>
																		<div class="row">
																		<div class="col-md-4">Kategori</div>
																		<div class="col-md-1">:</div>
																		<div class="col-md-7"><?=$det->nama_kategori?></div><p></p>
																		</div>
																		<div class="row">
																		<div class="col-md-4">Harga Buku</div>
																		<div class="col-md-1">:</div>
																		<div class="col-md-7"><?=$det->harga?></div><p></p>
																		</div>
																		<div class="row">
																		<div class="col-md-4">Jumlah Buku</div>
																		<div class="col-md-1">:</div>
																		<div class="col-md-7"><?=$det->jumlah?></div><p></p>
																		</div>
																		
																	</div>
																</div>
																</div>
															<?php endforeach ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach ?>



								</tbody>
							</table>
						</div>
					</div>
					<!-- END RECENT PURCHASES -->

					<!-- modal edit -->

				</div>

			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').DataTable();
	});
</script>
<script type="text/javascript">
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
			dataType:"json",
			success:function(data) {
				$("#kode_buku").val(data.kode_buku);
				$("#judul_buku").val(data.judul_buku);
				$("#tahun").val(data.tahun);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#penerbit").val(data.penerbit);
				$("#penulis").val(data.penulis);
				$("#stok").val(data.stok);
			}

		});
	}
</script>
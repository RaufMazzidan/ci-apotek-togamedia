<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
			<?php if ($this->session->userdata('level') == 'admin'): ?>
								<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>



							<h3 class="panel-title">Create Buku</h3>
						</div>
						<?php 
						if ($this->session->userdata('pesan') != NULL) { ?>
						<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-info"></i> <?=$this->session->userdata('pesan')?>
						</div>
						<?php } ?>
						<form action="<?=base_url('index.php/buku/create_buku')?>" method="post" enctype="multipart/form-data">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="judul_buku" class="form-control" required placeholder="Judul Buku">
										<br>
										<input type="text" name="tahun" class="form-control" required placeholder="Tahun">
										<br>
										<select class="form-control" name="kategori">
										<?php foreach ($list_kategori as $list) { ?>
												<option value="<?=$list->kode_kategori?>"><?=$list->nama_kategori?></option>
										<?php } ?>
										</select>
										<br>
										<input type="text" name="harga" class="form-control" required placeholder="Harga">
										<br>
									</div>
									<div class="col-md-6">
										<input type="file" name="foto_cover" class="form-control" required placeholder="Foto">
										<br>
										<input type="text" name="penerbit" class="form-control" required placeholder="Penerbit">
										<br>
										<input type="text" name="penulis" class="form-control" required placeholder="Penulis">
										<br>
										<input type="number" name="stok" class="form-control" required placeholder="Stok">
										<br>
									</div>
									
									<input type="submit" name="create" value="Create" class="btn btn-primary pull-right">
								</div>
							</div>
						</form>
					</div>
				</div>
							<?php endif ?>
				
				<div class="col-md-12">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">List Buku</h3>
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
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul Buku</th>
										<th>Nama Kategori</th>
										<th>Harga</th>
										<th>Cover</th>
										<th>Penerbit</th>
										<th>Penulis</th>
										<th>Stok</th>
										<?php if ($this->session->userdata('level') == 'admin') {
												?>
										<th>Edit</th>
										<th>Delete</th>
										<?php } ?>

									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($list_buku as $list) {
										?>
										<tr>
											<td><?=$no++;?></td>
											<td><?=$list->judul_buku?> (<?=$list->tahun?>)</td>
											<td><?=$list->nama_kategori?></td>
											<td>Rp. <?= number_format( $list->harga)?></td>
											<td><img style="width: 100px" src="<?=base_url('assets/cover/'.$list->foto_cover)?>"></td>
											<td><?=$list->penerbit?></td>
											<td><?=$list->penulis?></td>
											<td><?=$list->stok?></td>
											<?php if ($this->session->userdata('level') == 'admin') {
												?>
												<td><a href="#edit" onclick="edit(<?=$list->kode_buku?>)" data-toggle="modal"><span class="lnr lnr-pencil"></span> Edit</a></td>
											<td><a href="<?=base_url('index.php/buku/hapus_buku/'.$list->kode_buku)?>" onclick="return confirm('Apakah Anda Yakin ?')" data-toggle="modal"><span class="lnr lnr-trash"></span> Delete</a></td>
												<?php
											} ?>


											
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END RECENT PURCHASES -->

						<!-- modal edit -->
						<div class="modal fade" id="edit">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">
											<span aria-hidden="true">&times;</span>
											<span class="sr-only">Close</span>
										</button>
										<h4 class="modal-title">Edit Buku</h4>
									</div>
									<form action="<?=base_url('index.php/buku/buku_update')?>" method="post" enctype="multipart/form-data">
										<div class="modal-body">

											<input type="hidden" name="kode_buku" id="kode_buku">
											<div class="row">
									<div class="col-md-6">
										<input type="text" id="judul_buku" name="judul_buku" class="form-control" required placeholder="Judul Buku">
										<br>
										<input type="text" id="tahun" name="tahun" class="form-control" required placeholder="Tahun">
										<br>
										<select class="form-control" id="kategori" name="kategori">
										<?php foreach ($list_kategori as $list) { ?>
												<option value="<?=$list->kode_kategori?>"><?=$list->nama_kategori?></option>
										<?php } ?>
										</select>
										<br>
										<input type="text" id="harga" name="harga" class="form-control" required placeholder="Harga">
										<br>
									</div>
									<div class="col-md-6">
										<input type="file" id="foto_cover" name="foto_cover" class="form-control" placeholder="Foto">
										<br>
										<input type="text" id="penerbit" name="penerbit" class="form-control" required placeholder="Penerbit">
										<br>
										<input type="text" id="penulis" name="penulis" class="form-control" required placeholder="Penulis">
										<br>
										<input type="number" id="stok" name="stok" class="form-control" required placeholder="Stok">
										<br>
									</div>
									</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<input type="submit" name="update" class="btn btn-primary" value="Update">
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
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<?php if ($this->session->userdata('level') == 'admin'): ?>
					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								<h3 class="panel-title">Create Kategori</h3>
							</div>
							<?php 
							if ($this->session->userdata('pesan') != NULL) { ?>
							<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-info"></i> <?=$this->session->userdata('pesan')?>
							</div>
							<?php } ?>
							<form action="<?=base_url('index.php/kategori/create_kategori')?>" method="post">
								<div class="panel-body">
									<input type="text" name="nama_kategori" class="form-control" required placeholder="Nama Kategori">
									<br>
									<input type="submit" name="create" value="Create" class="btn btn-primary pull-right">
								</div>
							</form>
						</div>
					</div>
				<?php endif ?>
				
				<div class="col-md-6">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">List Kategori</h3>
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
										<th>Nama Kategori</th>
										<?php if ($this->session->userdata('level') == 'admin'): ?>
											<th>Edit</th>
											<th>Delete</th>
										<?php endif ?>
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($list_kategori as $list) {
										?>
										<tr>
											<td><?=$no++;?></td>
											<td><?=$list->nama_kategori?></td>
											<?php if ($this->session->userdata('level') == 'admin'): ?>
												<td><a href="#edit" onclick="edit(<?=$list->kode_kategori?>)" data-toggle="modal"><span class="lnr lnr-pencil"></span> Edit</a></td>
												<td><a href="<?=base_url('index.php/kategori/hapus_kategori/'.$list->kode_kategori)?>" onclick="return confirm('Apakah Anda Yakin ?')" data-toggle="modal"><span class="lnr lnr-trash"></span> Delete</a></td>
											<?php endif ?>
											
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
										<h4 class="modal-title">Edit Kategori</h4>
									</div>
									<form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
										<div class="modal-body">

											<input type="hidden" name="kode_kategori" id="kode_kategori">
											<input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required placeholder="Nama Kategori">
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
				url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
				dataType:"json",
				success:function(data) {
					$("#kode_kategori").val(data.kode_kategori);
					$("#nama_kategori").val(data.nama_kategori);
				}

			});
		}
	</script>
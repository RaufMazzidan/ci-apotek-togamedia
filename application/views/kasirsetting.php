<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="panel">
						<div class="panel-heading">
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
							<h3 class="panel-title">Create Kasir</h3>
						</div>
						<?php 
						if ($this->session->userdata('pesan') != NULL) { ?>
						<div style="margin-left: 5%; margin-right: 5%" class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-info"></i> <?=$this->session->userdata('pesan') ?>
						</div>
						<?php } ?>
						<form action="<?=base_url('index.php/kasirsetting/create_kasir')?>" method="post">
							<div class="panel-body">
								<label>Nama</label>
								<input type="text" name="nama_user" class="form-control" required placeholder="Nama User">
								<br>
								<label>Username</label>
								<input type="text" name="username" class="form-control" required placeholder="Username">
								<br>
								<label>Password</label>
								<input type="password" name="password" class="form-control" required placeholder="Password">
								<br>
								<label>Jabatan</label>
								<select class="form-control" name="level">
									<option value="admin">Admin</option>
									<option value="kasir">Kasir</option>
								</select>
								<br>
								<input type="submit" name="create" value="Create" class="btn btn-primary pull-right">
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-8">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">List Kasir</h3>
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
										<th>Nama User</th>
										<th>Username</th>
										<th>Password</th>
										<th>Level</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($list_kasir as $list) {
										?>
										<tr>
											<td><?=$no++;?></td>
											<td><?=$list->nama_user?></td>
											<td><?=$list->username?></td>
											<td><?=md5($list->password)?></td>
											<td><?=$list->level?></td>
											<td><a href="#edit" onclick="edit(<?=$list->kode_user?>)" data-toggle="modal"><span class="lnr lnr-pencil"></span> Edit</a></td>
											<td><a href="<?=base_url('index.php/kasirsetting/hapus_kasir/'.$list->kode_user)?>" onclick="return confirm('Apakah Anda Yakin ?')" data-toggle="modal"><span class="lnr lnr-trash"></span> Delete</a></td>
											
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
									<form action="<?=base_url('index.php/kasirsetting/kasir_update')?>" method="post">
										<div class="modal-body">

										<input type="hidden" name="kode_user" id="kode_user">
											<label>Nama</label>
											<input type="text" id="nama_user" name="nama_user" class="form-control" required placeholder="Nama User">
											<br>
											<label>Username</label>
											<input type="text" id="username" name="username" class="form-control" required placeholder="Username">
											<br>
											<label>Password</label>
											<input type="password" id="password" name="password" class="form-control" required placeholder="Password">
											<br>
											<label>Jabatan</label>
											<select class="form-control" id="level" name="level">
												<option value="admin">Admin</option>
												<option value="kasir">Kasir</option>
											</select>
											<br>
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
				url:"<?=base_url()?>index.php/kasirsetting/edit_kasir/"+a,
				dataType:"json",
				success:function(data) {
					$("#kode_user").val(data.kode_user);
					$("#nama_user").val(data.nama_user);
					$("#username").val(data.username);
					$("#password").val(data.password);
					$("#level").val(data.level);
				}

			});
		}
	</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<!-- <div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Siswa</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Blank Page</li>
					</ol>
				</div>
			</div> -->
		</div><!-- /.container-fluid -->
	</section>
	<?php echo $this->session->flashdata('pesan'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="card-header border-white" style="background-color: #9ED2E9 ;">
			<h3>
				<font size="">
					&ensp;<b>Data Siswa</b>
				</font>
			</h3>
		</div>

		<!-- Default box -->
		<div class="card">
			<div class="card-header border-white">
				<h3 class="card-title"></h3>
				<div class="card-tools">
					<div class="mr-3">
						<form action="<?php site_url() ?>data_siswa" method="POST">
							<div class="form-row">
								<div class="">
									<label class="text-dark" for="a"><i>Jurusan</i></label>
									<div class="input-group">
										<select name="jurusan" id="id_jurusan" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
											<option value="9999">Semua</option>
											<?php if ($jurusan) { ?>
												<?php foreach ($jurusan as $key) { ?>
													<option value="<?php echo $key->ID ?>"><?php echo $key->JURUSAN ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="">
									<label class="text-dark" for="a"><i>Kelas</i></label>
									<div class="input-group">
										<div class="sopt2">
											<select name="kelas" id="id_kelas" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">

											</select>
										</div>
										<button class="btn btn-dark"><i class="fas fa-search"></i></button>
										<div class="btn-group" style="color: #000;">
											<button class="btn btn-dark dropdown-toggle" type="submit" data-toggle="dropdown" aria-expanded="false"></button>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="" class="dropdown-item" data-target="#insert" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover" id="table" width="100%" cellspacing="0" style="font-size:12px">
					<thead style="background-color: #9ED2E9 ;">
						<tr style="color: #fff ;">
							<th width="20px">
								<center>NO</center>
							</th>
							<th>
								<center>NIS</center>
							</th>
							<th>
								<center>NAMA</center>
							</th>
							<th>
								<center>JURUSAN</center>
							</th>
							<th>
								<center>KELAS</center>
							</th>
							<th>
								<center>PASSWORD</center>
							</th>
							<th>
								<center>AKSI</center>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if (is_array($data_siswa) || is_object($data_siswa)) { ?>
							<?php $i = 1; ?>
							<?php foreach ($data_siswa as $dt) { ?>
								<?php
								$get_jurusan = $this->db->query("SELECT * FROM tb_jurusan WHERE ID ='$dt->ID_JURUSAN' ")->row();
								$get_kelas = $this->db->query("SELECT * FROM tb_kelas WHERE ID ='$dt->ID_KELAS' ")->row();
								?>
								<tr class="text-center">
									<td><?php echo $i++ ?></td>
									<td><?php echo $dt->NIS ?></td>
									<td><?php echo $dt->NAMA ?></td>
									<td><?php echo $get_jurusan->JURUSAN ?></td>
									<td><?php echo $get_kelas->KELAS ?></td>
									<td><?php echo $dt->PASSWORD ?></td>
									<td>
										<a href="#edit" data-toggle="modal" class="btn" onclick="edit_data_siswa(<?php echo $dt->ID ?>)" title="Edit"><i class="fas fa-edit" style="color: #f0ad4e;"></i></a>
										<a href="" data-toggle="modal" data-target="#hapus" class="btn" onclick="get_id_delete(<?php echo $dt->ID ?>)" title="Hapus"><i class="fas fa-trash" style="color: #d9534f;"></i></a>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>

					</tfoot>
				</table>
			</div>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-gray-100" id="exampleModalLabel">TAMBAH DATA</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_tambah" method="post" action="<?php echo base_url('SAS/tambah_data_siswa') ?>" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>Nis</td>
							<td><input type="text" name="nis" id="idnis" value="" class="form-control" required></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td><input type="text" name="nama" id="idnama" value="" class="form-control" required></td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td><select name="jurusan" id="idjurusan" class="form-control">
									<option></option>
									<?php
									foreach ($jurusan as $key) {
									?>
										<option value="<?php echo $key->ID ?>">
											<?php echo $key->JURUSAN ?>
										</option>
									<?php } ?>
								</select></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td><select name="kelas" id="idkelas" class="form-control">
									<option></option>
									<?php
									foreach ($kelas as $key) {
									?>
										<option value="<?php echo $key->ID ?>">
											<?php echo $key->KELAS ?>
										</option>
									<?php } ?>
								</select></td>
						</tr>

					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="btn-tambah" data-dismiss="modal">Tambah</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-gray-100" id="exampleModalLabel">EDIT DATA</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_edit" method="post" action="<?php echo base_url('SAS/edit_data_siswa') ?>" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>Nis</td>
							<td><input type="text" name="nis" id="idnis" value="" class="form-control" required></td>
							<input type="hidden" name="id">
						</tr>
						<tr>
							<td>Nama</td>
							<td><input type="text" name="nama" id="idnama" value="" class="form-control" required></td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td><select name="jurusan_edit" id="idjurusan_edit" class="form-control">
									<option></option>
									<?php
									foreach ($jurusan as $key) {
									?>
										<option value="<?php echo $key->ID ?>">
											<?php echo $key->JURUSAN ?>
										</option>
									<?php } ?>
								</select></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td><select name="kelas_edit" id="idkelas_edit" class="form-control">
									<?php
									foreach ($kelas as $key) {
									?>
										<option value="<?php echo $key->ID ?>">
											<?php echo $key->KELAS ?>
										</option>
									<?php } ?>
								</select></td>
						</tr>

					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="btn-edit" data-dismiss="modal">Edit</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-gray-100" id="exampleModalLabel">NOTIF</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form_delete" method="post" action="<?php echo base_url('SAS/delete_data_siswa') ?>" enctype="multipart/form-data">
					apakah anda ingin menghapus data ini?
					<input type="hidden" name="id">
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">cancel</button>
				<button type="button" class="btn btn-info" id="btn-delete" data-dismiss="modal">hapus</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		$("#id_jurusan").change(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('') ?>viewKelasByJurusan",
				cache: false,
				data: "jurusan=" + $(this).val(),
				success: function(msg) {
					$("#sopt2").html(msg).show();
					$("#flash").hide();
				},
				error: function() {
					$('#sopt2').remove();
					$('#sopt2').html('Error. Please try other Program Studi options').show();
				}
			});
		});
	});
</script>
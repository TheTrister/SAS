<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<a class="d-none d-sm-inline-block btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#insert"><i
			class="fas fa-fw fa-folder-plus text-white-50"></i> Tambah Data</a>
		</div>
		<?php echo $this->session->flashdata('pesan');?>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">DataTables &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
					<a href="<?php echo base_url('Template/dashboard') ?>" onclick="window.open('export')" class="d-none d-sm-inline-block btn btn-sm btn-primary
						shadow-sm"><i
						class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
					</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="table" width="100%" cellspacing="0" style="font-size:12px">
							<thead>
								<tr>
									<th>no</th>
									<th>nama</th>
									<th>umur</th>
									<th>jenis kelamin</th>
									<th>agama</th>
									<th>file</th>
									<th>username</th>
									<th>password</th>
									<th>level</th>
									<th>aksi</th>
								</thead>
								<tbody>
									<?php
									if (is_array($tes) || is_object($tes)){
										foreach ($tes as $row1) { 
											?>
											<?php $agama = $this->db->query("SELECT * FROM tagama WHERE id_agama ='$row1->agama' ")->row(); ?>
											<tr>			
												<td><?php echo $row1->id ?></td>
												<td><?php echo $row1->nama ?></td>
												<td><?php echo $row1->umur ?></td>
												<td><?php echo $row1->kelamin ?></td>
												<td><?php echo $agama->agama ?></td>
												<td><?php echo $row1->file ?></td>
												<td><?php echo $row1->username ?></td>
												<td><?php echo $row1->password ?></td>
												<td><?php echo $row1->level ?></td>
												<td>
													<a href="#edit" data-toggle="modal" class="btn btn-success" onclick="edit(<?php echo $row1->id ?>)"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url('Template/fungsi_hapus') ?>/<?php echo $row1->id  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
													<a href="#info" data-toggle="modal" class="btn btn-primary" onclick="submit(<?php echo $row1->id ?>)"><i class="fa fa-info-circle"></i></a>
												</td>
											</tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>
							<!-- /.container-fluid -->

						</div>

						<!-- End of Main Content -->
					</div>
				</div>	

				<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-secondary">
							<h5 class="modal-title text-gray-100" id="exampleModalLabel">TAMBAH DATA</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form_tambah" method="post" action="<?php echo base_url('Template/insert_data') ?>" enctype="multipart/form-data">
								<table class="table">
									<tr>
										<td>Absen</td>
										<td><input type="text" name="absen"  id="idabsen" value="" class="form-control" readonly></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td><input type="text" name="nama" id="idnama" value="" class="form-control" required></td>
									</tr>
									<tr>
										<td>Umur</td>
										<td><input type="text" name="umur" id="idumur" value="" class="form-control" required></td>
									</tr>
									<tr>
										<td>Kelamin</td>
										<td>
											<input type="radio" name="kelamin" id="kelamin4" value="pria " checked>&ensp;pria
											&emsp;<input type="radio" name="kelamin" id="kelamin5" value="wanita " >&ensp;wanita
										</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td><select name="agama" id="idagama"  class="form-control" onclick="agama">
											<option></option>
											<?php 
											foreach ($data_agama as $key) { 
												?>
												<option value="<?php echo $key->id_agama?>">
													<?php echo $key->agama ?>
												</option>
											<?php } ?>
										</select></td>
									</tr>
									<tr>
										<td>Username</td>
										<td><input type="text" name="username" id="iduser" value="" class="form-control" required></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="password" id="idpass" value="" class="form-control" required></td>
									</tr>
									<tr>
										<td>Upload Data </td>
										<td><input type="file" name="tfile" size="20" class="form-control" required></td>
									</tr>
								</table>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="btn-tambah" data-dismiss="modal">Tambah</button>
						</div>
					</div>
				</div>
			</div>

			<!-- edit-->

			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-secondary">
						<h5 class="modal-title text-gray-100" id="exampleModalLabel">EDIT DATA</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form_edit" method="post">
							<table class="table">
								<tr>
									<td>Absen</td>
									<td><input type="text" name="absen"  id="absen2" value="" class="form-control" readonly></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td><input type="text" name="nama" id="nama2" value="" class="form-control" required></td>
								</tr>
								<tr>
									<td>Umur</td>
									<td><input type="text" name="umur" id="umur2" value="" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>
										<input type="radio" name="kelamin" id="kelamin2" value="pria " checked>pria
										<input type="radio" name="kelamin" id="kelamin3" value="wanita " >wanita
									</td>
								</tr>
								<tr>
									<td>Agama</td>
									<td><select name="agama" id="agama2" class="form-control">
										<option></option>
										<?php 
										foreach ($data_agama_edit as $key) { 
											?>
											<option value="<?php echo $key->id_agama?>">
												<?php echo $key->agama ?>
											</option>
										<?php } ?>
									</select></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><input type="text" name="username" id="iduser2" value="" class="form-control" required></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="text" name="password" id="idpass2" value="" class="form-control" required></td>
								</tr>
								<tr>
									<td>Upload Data </td>
									<td><input type="text" name="file" id="file2" size="20" class="form-control" readonly></td>
								</tr>
							</table>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" id="btn-edit" data-dismiss="modal">Edit</button>
					</div>
				</div>
			</div>
		</div>

		<!-- detail --> 
		<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-secondary">
					<h5 class="modal-title text-gray-100" id="exampleModalLabel">DETAIL DATA</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table">
						<tr>
							<td>Absen</td>
							<td><input type="text" name="absen"  id="absen1" value="" class="form-control" readonly=""></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td><input type="text" name="nama" id="nama1" value="" class="form-control" readonly=""></td>
						</tr>
						<tr>
							<td>Umur</td>
							<td><input type="text" name="umur" id="umur1" value="" class="form-control" readonly=""></td>
						</tr>
						<div class="form-check">
							<tr>
								<td>Jenis Kelamin</td>
								<td><input type="text" name="jk" id="jk1" value="" class="form-control" readonly=""></td>
							</tr>
						</div>
						<tr>
							<td>Agama</td>
							<td><input type="text" name="agama" id="agama1" value="" class="form-control" readonly=""></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" id="username1" value="" class="form-control" readonly></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" id="password1" value="" class="form-control" readonly></td>
						</tr>
						<tr>
							<td>Upload Data </td>
							<td><input type="text" name="file" id="file1" size="20" class="form-control" readonly></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
				</div>
			</div>
		</div>
	</div>

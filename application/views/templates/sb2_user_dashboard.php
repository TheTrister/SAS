<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<a href="<?php echo base_url('Template/dashboard') ?>" onclick="window.open('export')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
		</div>
	 <?php echo $this->session->flashdata('pesan');?>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="table" width="100%" cellspacing="0" style="font-size:13px">
					<thead>
						<tr>
							<th>no</th>
							<th>nama</th>
							<th>umur</th>
							<th>jenis kelamin</th>
							<th>agama</th>
							<th>file</th>
						</thead>
						<tbody>
							<?php
							if (is_array($user) || is_object($user)){
								foreach ($user as $row1) { 
									?>
									<tr>			
										<td><?php echo $row1->id ?></td>
										<td><?php echo $row1->nama ?></td>
										<td><?php echo $row1->umur ?></td>
										<td><?php echo $row1->kelamin ?></td>
										<td><?php echo $row1->agama ?></td>
										<td><?php echo $row1->file ?></td>
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

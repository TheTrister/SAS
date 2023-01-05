<?php if ($this->session->userdata('level')=="admin") {?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Template/dashboard') ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-cube"></i>
		</div>
		<div class="sidebar-brand-text mx-3">PRAKERIN</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?php echo base_url('Template/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('Template/tes') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>User</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="<?php echo base_url('Template/chart') ?>">
				<i class="fas fa-fw fa-chart-pie"></i>
				<span>Charts</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#insert">
				<i class="fas fa-fw fa-folder-plus"></i>
				<span>Insert</span>
			</a>
		</li>

		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#upload">
				<i class="fas fa-fw fa-upload"></i>
				<span>Upload</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Export
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item item">
			<a class="nav-link" href="<?php echo base_url('Template/dashboard') ?>" onclick="window.open('export')" >
				<i class="fas fa-fw fa-file-export"></i>
				<span>Export Excel</span></a>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
<?php }else if ($this->session->userdata('level')=="user") { ?>
	<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Template/dashboard') ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-cube"></i>
		</div>
		<div class="sidebar-brand-text mx-3">PRAKERIN</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
		<a class="nav-link" href="<?php echo base_url('Template/tes') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dahboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#upload">
				<i class="fas fa-fw fa-upload"></i>
				<span>Upload</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Export
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item item">
			<a class="nav-link" href="<?php echo base_url('Template/dashboard') ?>" onclick="window.open('export')" >
				<i class="fas fa-fw fa-file-export"></i>
				<span>Export Excel</span></a>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
<?php } ?>
        <!-- End of Sidebar -->

        <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        	<div class="modal-content">
        		<div class="modal-header bg-secondary">
        			<h5 class="modal-title text-gray-100" id="exampleModalLabel">UPLOAD GAMBAR</h5>
        			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true">×</span>
        			</button>
        		</div>
        		<div class="modal-body">
        			<form action="<?php echo base_url('Template/upload') ?>" method="POST" enctype="multipart/form-data">
        				<table class="table">
        					<tr>
        						<td>Upload Data </td>
        						<td><input type="file" name="userfile" size="20" class="form-control" required></td>
        					</tr>
        				</table>
        			</form>
        		</div>
        		<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Upload</button>
        		</div>
        	</div>
        </div>
    </div>
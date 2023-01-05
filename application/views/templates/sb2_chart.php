<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Charts</h1>
	</div>
	<?php echo $this->session->flashdata('pesan');?>

	<div class="card-body">
		<!-- Bar Chart -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
			</div>
			<div class="card-body">
				<div class="chart-bar">
					<canvas id="myBarChart"></canvas>
				</div>
			</div>
		</div>

	</div>
	<!-- Pie Chart -->
	<div class="col-xl-4 col-lg-5">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div
			class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Data Kelamin</h6>
		</div>

		<!-- Card Body -->
		<div class="card-body">
			<div class="chart-pie pt-4 pb-2">
				<canvas id="myPieChart"></canvas>
			</div>
			<div class="mt-4 text-center small">
				<span class="mr-2">
					<i class="fas fa-circle text-primary"></i> Pria
				</span>
				<span class="mr-2">
					<i class="fas fa-circle text-info"></i> Wanita
				</span>
			</div>
		</div>
	</div>
</div>

</div>
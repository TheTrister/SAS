<?php 
    // fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

    // membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename= data_Orang.xls");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Proses Exsport</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="wrap">
		<div class="container" align="center">
			<b>
				<table align="center">
					<tr>
						
						<th>no</th>
						<th>nama</th>
						<th>umur</th>
						<th>jenis kelamin</th>
						<th>agama</th>
						<th>file</th>
						
					</tr>
					<?php 
					foreach ($allq as $row) { 
						?>
						<?php $agama = $this->db->query("SELECT * FROM tagama WHERE id_agama ='$row->agama' ")->row(); ?>
						<tr>			
							<td><?php echo $row->id ?></td>
							<td><?php echo $row->nama ?></td>
							<td><?php echo $row->umur ?></td>
							<td><?php echo $row->kelamin ?></td>
							<td><?php echo $agama->agama ?></td>
							<td><?php echo $row->file ?></td>
						</tr>
					<?php } ?>
				</table>
			</b>
		</div>
	</div>
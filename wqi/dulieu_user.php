
<div class="card">
	<?php

	if(isset($_GET['filename'])){
		$filename = $_GET['filename'];
		?>

		<div class="header">
			<div class="tieude" style="text-align: center;" >
				<h3>Bảng dữ liệu quan trắc chất lượng môi trường nước</h3>
			</div>
		</div>

		<div class="content table-responsive" style="margin-right: 15px;margin-top:50px">
			<table class="table table-bordered table-striped table-hover" id="dulieuuser" width="100%">
				<thead>
					<tr class="danger">
						<th>TênTrạm</th>
						<th>X</th>
						<th>y</th>
						<th>Thờigian</th>
						<th>NhiệtĐộ</th>
						<th>BOD</th>
						<th>COD</th>
						<th>N_NH4+</th>
						<th>P_PO3-</th>
						<th>TSS</th>
						<th>DO</th>
						<th>pH</th>
						<th>Coliform</th>
						<th>Độđục</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
					$select_data= "SELECT * from $filename";
					$result = pg_query($conn,"$select_data");
					if ($result == true){
						while($row = pg_fetch_array($result)){
							?>
							<tr>
								<td><?php echo $row['tentram']?></td>
								<td><?php echo $row['x']?></td>
								<td><?php echo $row['y']?></td>
								<td><?php echo $row['thoigian']?></td>
								<td><?php echo $row['nhietdo']?></td>
								<td><?php echo $row['bod']?></td>
								<td><?php echo $row['cod']?></td>
								<td><?php echo $row['n']?></td>
								<td><?php echo $row['p']?></td>
								<td><?php echo $row['tss']?></td>
								<td><?php echo $row['d0']?></td>
								<td><?php echo $row['ph']?></td>
								<td><?php echo $row['coliform']?></td>
								<td><?php echo $row['doduc']?></td>
							</tr>
							<?php

						} ?>
					</tbody>

					<?php
				}
			}
			?>

		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready( function () {
		$('#dulieuuser').DataTable();
	} );

	$('#dulieuuser').dataTable( {
		"columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
		"lengthMenu": [ 10,15, 25, 50, 100 ],

		"language": {
			"search": "Tìm Kiếm",
			"lengthMenu": "Hiển thị _MENU_ dòng",
			"paginate": {
				"first":      "First",
				"last":       "Last",
				"next":       "Sau",
				"previous":   "Trước",
			},
			"info":"",
			"infoFiltered":"",
			"infoEmpty":"",
			"zeroRecords":    "Không có kết quả tìm kiếm",
		}


	});


</script>

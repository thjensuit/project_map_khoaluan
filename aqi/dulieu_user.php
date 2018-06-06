
<div class="card">
	<?php
	if(isset($_GET['filename'])){
		$filename = $_GET['filename'];
		?>

		<div class="header">
			<div class="tieude" style="text-align: center;" >
				<h3>Bảng dữ liệu quan trắc chất lượng môi trường không khí</h3>
			</div>
		</div>

		<div class="content table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dulieuuser">
				<thead>
					<tr class="danger">
						<th>Tên Trạm</th>
						<th>Thời gian(giờ)</th>
						<th>SO2</th>
						<th>CO</th>
						<th>NO2</th>
						<th>O3</th>
						<th>TSP</th>
						<th>PM10</th>
						<th>PM2.5</th>
						<th>Pb</th>
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
								<td><?php echo $row['thoigian']?></td>
								<td><?php echo $row['so2']?></td>
								<td><?php echo $row['co']?></td>
								<td><?php echo $row['no2']?></td>
								<td><?php echo $row['o3']?></td>
								<td><?php echo $row['tsp']?></td>
								<td><?php echo $row['pm10']?></td>
								<td><?php echo $row['pm25']?></td>
								<td><?php echo $row['pb']?></td>
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
  </script>

  <script type="text/javascript">
		$(document).ready( function () {
			$('#dulieuuser').DataTable();
		} );

		$('#dulieuuser').dataTable( {

			"lengthMenu": [ 15,20, 25, 50, 100 ],

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
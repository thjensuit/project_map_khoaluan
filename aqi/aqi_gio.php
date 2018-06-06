
<div class="card" style="width: auto">
	<?php
	if(isset($_GET['filename'])){
		$filename = $_GET['filename'];
		?>

		<div class="header">
			<div class="tieude" style="text-align: center;" >
				<h3>Kết quả tính toán chỉ số AQI theo giờ</h3>
			</div>
		</div>

		<div class="content table-responsive">
			<table class="table table-bordered table-striped table-hover" id="tbl-aqigio">
				<thead>
					<tr class="danger">
						<th>TênTrạm</th>
						<th>Thờigian(giờ)</th>
						<th>AQI_SO2</th>
						<th>AQI_CO</th>
						<th>AQI_NO2</th>
						<th>AQI_O3</th>
						<th>AQI_TSP</th>
						<th>AQI_PM10</th>
						<th>AQI_PM2.5</th>
						<th>AQI_Pb</th>
						<th>AQI_Trạm</th>
						<th>Thôngsố ô nhiễm nhất</th>

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
								<td><?php echo $row['aqi_h_so2']?></td>
								<td><?php echo $row['aqi_h_co']?></td>
								<td><?php echo $row['aqi_h_no2']?></td>
								<td><?php echo $row['aqi_h_o3']?></td>
								<td><?php echo $row['aqi_h_tsp']?></td>
								<td><?php echo $row['aqi_h_pm10']?></td>
								<td><?php echo $row['aqi_h_pm25']?></td>
								<td><?php echo $row['aqi_h_pb']?></td>
								<td><?php echo $row['aqi_h_tram']?></td>
								<td><?php echo $row['thongso_h_max']?></td>

							</tr>
							<?php

						} ?>
					</tbody>

					<?php
				}
			}
			?>

		</table>
		<button class="btn btn-warning" style="background: #ff6600; margin-left:450px" id="btn_downloadaqigio"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> download kết quả</button>
	</div>
</div>


  <script type="text/javascript">
		$(document).ready( function () {
			$('#tbl-aqigio').DataTable();
		} );

		$('#tbl-aqigio').dataTable( {

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

	<script type="text/javascript" src="js/jquery.table2excel.js"></script>
        <script type="text/javascript">
            $("#btn_downloadaqigio").click(function(){
                    $("#tbl-aqigio").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "<?php echo $filename; ?>",
                        fileext: ".xls"
                    });
                });
 		</script>
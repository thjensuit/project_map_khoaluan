<div class="card">
	<div class="header">
		<div class="tieude" style="text-align: center;margin-bottom:30px" >
		<h3>Kết quả tính toán chỉ số WQI thông số (WQI_SI)</h3>
		</div>
	</div>
<?php
if(isset($_GET['filename'])){
 	$filename = $_GET['filename'];
 ?>
 	<div class="content table-responsive">
	<table class="table table-bordered table-striped" id="tbl_wqithongso">
		<thead>
			<tr class="success">
				<th>TênTrạm</th>
				<th>ThờiGian</th>
				<th>WQI_BOD</th>
				<th>WQI_COD</th>
				<th>WQI_N</th>
				<th>WQI_P</th>
				<th>WQI_TSS</th>
				<th>WQI_ĐộĐục</th>
				<th>WQI_Coliform</th>
				<th>WQI_DO</th>
				<th>WQI_pH</th>
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
					<tr><td><?php echo $row['tentram'];?></td>
						<td><?php echo $row['thoigian'];?></td>
						<td><?php echo $row['wqi_bod'];?></td>
						<td><?php echo $row['wqi_cod'];?></td>
						<td><?php echo $row['wqi_n'];?></td>
						<td><?php echo $row['wqi_p'];?></td>
						<td><?php echo $row['wqi_tss'];?></td>
						<td><?php echo $row['wqi_doduc'];?></td>
						<td><?php echo $row['wqi_coliform'];?></td>
						<td><?php echo $row['wqi_do'];?></td>
						<td><?php echo $row['wqi_ph'];?></td>
					</tr>
					<?php

				}
			}
		}
		?>

		</tbody>

	</table>
	</div>
</div>

<script type="text/javascript">
		$(document).ready( function () {
			$('#tbl_wqithongso').DataTable();
		} );

		$('#tbl_wqithongso').dataTable( {

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

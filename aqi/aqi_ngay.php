
<div class="card">
	<?php
	if(isset($_GET['filename'])){
		$filename = $_GET['filename'].'_ngay';
		?>

		<div class="header">
			<div class="tieude" style="text-align: center;" >
				<h3>Kết quả tính toán chỉ số AQI ngày</h3>
			</div>
		</div>

		<div class="content table-responsive">
			<table class="table table-bordered table-striped table-hover" id="tbl_aqingay">
				<thead>
					<tr class="danger">
						<th>Tên Trạm</th>
						<th>Thời gian(ngay)</th>
						<th>AQI_Trạm</th>
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
								<td><?php echo $row['aqi_ngay_tram']?></td>

							</tr>
							<?php

						} ?>
					</tbody>

					<?php

			}
			?>

		</table>
	</div> <!-- end aqi ngay -->

	<div class="header">
		<div class="tieude" style="text-align: center;" >
			<h3>Mức độ ảnh hưởng sức khỏe</h3>
		</div>
	</div>

	<div class="content table-responsive">
			<table class="table table-bordered table-striped table-hover" id="tbl_canhbao">
				<thead>
					<tr style="background:#e6ffcc">
						<th>Tên Trạm</th>
						<th>ThờiGian(ngày)</th>
						<th>AQI_Trạm</th>
						<th>Khoảng giá trị AQI</th>
						<th>Chất lượng không khí</th>
						<th>Mức ảnh hưởng</th>
						<th>Màu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
					$select_data= "SELECT * from $filename";
					$result = pg_query($conn,"$select_data");
					if ($result == true){
						while($row = pg_fetch_array($result)){
							$mucanhhuong='';
							$chatluong='';
							$mau ='';
							?>
							<tr>
								<td><?php echo $row['tentram']?></td>
								<td><?php echo $row['thoigian']?></td>
								<td><?php echo $row['aqi_ngay_tram']?></td>
								<td><?php
									if($row['aqi_ngay_tram']>=0 && $row['aqi_ngay_tram']<=50){
										echo"0-50";
										$mucanhhuong='Không ảnh hưởng đến sức khỏe';
										$chatluong='Tốt';
										$mau='Xanh';
									}elseif ($row['aqi_ngay_tram']>=51 && $row['aqi_ngay_tram']<=100) {
										echo"51-100";
										$mucanhhuong='Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài';
										$chatluong='Trung bình';
										$mau='Vàng';
									}elseif($row['aqi_ngay_tram']>=101 && $row['aqi_ngay_tram']<=200){
										echo"101-200";
										$mucanhhuong='Nhóm nhạy cảm cần hạn chế thời gian ở bên ngoài';
										$chatluong='Kém';
										$mau='Da cam';
									}elseif($row['aqi_ngay_tram']>=201 && $row['aqi_ngay_tram']<=300){
										echo"201-300";
										$mucanhhuong='Nhóm nhạy cảm tránh ra ngoài. Những người khác hạn chế ở bên ngoài';
										$chatluong='Xấu';
										$mau='Đỏ';
									}else{
										echo "Trên 300";
										$mucanhhuong='Mọi người nên ở trong nhà';
										$chatluong='Nguy hại';
										$mau='Nâu';
									}
									?>
								</td>
								<td><?php echo $chatluong ?></td>
								<td><?php echo "$mucanhhuong"; ?></td>
								<td style="background: <?php if($mau=='xanh'){echo "blue";}elseif ($mau=='Vàng') {
									echo "yellow";}elseif ($mau=='Da cam') {
										echo "#cc7a00";}elseif ($mau=='Đỏ') {
											echo "red";
										}else{echo "#996600";} ?>"> <?php echo $mau ?></td>

							</tr>
							<?php

						} ?>
					</tbody>

					<?php
				}
			}
			?>

		</table>
		<button class="btn btn-warning" style="background: #ff6600; margin-left:400px" id="btn_downloadaqingay"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> download kết quả</button>
	</div> <!-- end aqi ngay -->

</div>
<script type="text/javascript">
    $(document).ready( function () {
    $('#tbl_aqingay').DataTable();
    $('#tbl_canhbao').DataTable();
} );
  </script>

   <script type="text/javascript">
		$(document).ready( function () {
			$('#tbl_aqingay').DataTable();
    		$('#tbl_canhbao').DataTable();
		} );

		$('#tbl_aqingay').dataTable( {

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

		$('#tbl_canhbao').dataTable( {

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
            $("#btn_downloadaqingay").click(function(){
                    $("#tbl_canhbao").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "<?php echo $filename; ?>",
                        fileext: ".xls"
                    });
                });
 		</script>
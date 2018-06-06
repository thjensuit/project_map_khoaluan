<?php
if(isset($_GET['filename'])){
 	$filename = $_GET['filename'];
 	echo "$filename";
 }
 ?>
<div class="card">
	<div class="header">
		<div class="tieude" style="text-align: center;margin-bottom:30px" >
		<h3>Kết quả tính toán chỉ số WQI trạm</h3>
		</div>
	</div>

	<div class="content table-responsive">
		<table class="table table-bordered table-striped" id="tbl_wqitram">
			<thead>
				<tr>
					<th>TênTrạm</th>
					<th>ThờiGian</th>
					<th>WQITrạm</th>
					<th>WQITiêuChuẩn</th>
					<th>Mức đánh giá chất lượng nước</th>
					<th>Màuthểhiện</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
				$select_data= "SELECT * from $filename";
				$result = pg_query($conn,"$select_data");
				if ($result == true){
					while($row = pg_fetch_array($result)){
						if($row['wqi_tram'] >=0 && $row['wqi_tram'] <= 25){
							$mucdo = "Nước ô nhiễm nặng, cần các biện pháp xử lý trong tương lai";
							$mau = "Đỏ";
							$wqichuan = "0-25";
						}elseif ($row['wqi_tram'] >=26 && $row['wqi_tram'] <= 50) {

							$mucdo = "Sử dụng cho giao thông thủy và các mục đích tương đương khác";
							$mau = "Da cam";
							$wqichuan = "26-50";
						}elseif ($row['wqi_tram'] >=51 && $row['wqi_tram'] <= 75) {
							$mucdo = "Sử dụng cho mục đích tưới tiêu và các mục đích tương đương khác";
							$mau = "Vàng";
							$wqichuan = "51-75";
						}elseif ($row['wqi_tram'] >=76 && $row['wqi_tram'] <= 90) {
							$mucdo = "Sử dụng cho mục đích cấp nước sinh hoạt nhưng cần các biện pháp xử lý phù hợp";
							$mau = "Xanh lá cây";
							$wqichuan = "76-90";
						}else{
							$mucdo = "Sử dụng tốt cho mục đích cấp nước sinh hoạt";
							$mau = "Xanh nước biển";
							$wqichuan = "91-100";
						}


				?>
				<tr>
					<td><?php echo $row['tentram'];?></td>
					<td><?php echo $row['thoigian'];?></td>
					<td><?php echo $row['wqi_tram'];?></td>
					<td><?php echo $wqichuan;?></td>
					<td><?php echo $mucdo;?></td>
					<td style="background: <?php
						if($row['wqi_tram'] >=0 && $row['wqi_tram'] <= 25){
							echo "#ff3333";
						}elseif ($row['wqi_tram'] >=26 && $row['wqi_tram'] <= 50) {
							echo "#ff751a";
						}elseif ($row['wqi_tram'] >=51 && $row['wqi_tram'] <= 75) {
							echo "#ffff1a";
						}elseif ($row['wqi_tram'] >=76 && $row['wqi_tram'] <= 91) {
							echo "#66ff33";
						}else{
							echo "#6666ff";
						}
					 ?>">
					 	<?php echo $mau;?>
					 </td>
				</tr>

				<?php
					}
						}
				?>

			</tbody>

		</table>
		<div class="row">
			<div class="col-md-4 col-md-offset-5">
				<button class="btn btn-primary" id="wqitram" style=""><span class="glyphicon glyphicon-download-alt" aria-hidden="true"> </span> Download kết quả</button>
			</div>
		</div>

	</div>

</div>
<script type="text/javascript">
		$(document).ready( function () {
			$('#tbl_wqitram').DataTable();
		} );

		$('#tbl_wqitram').dataTable( {

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
            $("#wqitram").click(function(){
                    $("#tbl_wqitram").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "<?php echo $filename; ?>",
                        fileext: ".xls"
                    });
                });
        </script>
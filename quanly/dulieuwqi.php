	<div class="card">
		<div class="header">
			<div class="tieude" style="text-align: center;margin-bottom:30px" >
				<h3>Dữ liệu file WQI của người dùng</h3>
			</div>
		</div>
			<div class="content table-responsive">
				<table class="table table-bordered table-striped" id="tbl_taikhoan">
					<thead>
						<tr class="success">
							<th>ID</th>
							<th>Tên Tài Khoản</th>
							<th>Tên file</th>
							<th>Thời gian</th>
							<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
						$select_data= "SELECT * from dulieufilewqi";
						$result = pg_query($conn,"$select_data");
						if ($result == true){
							$id = 0;
							while($row = pg_fetch_array($result)){
								$id ++ ;
								?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo $row['tentaikhoan'];?></td>
									<td><?php echo $row['tenfile'];?></td>
									<td><?php echo $row['thoigian'];?></td>
									
										<td>
										<a class="btn btn-warning" style="color:white; margin-left: 50px" name="xoa" href="http://localhost/khoaluan/quanly/dulieuwqi-main.php?username=admin&tentaikhoan=<?php echo $row[1] ?>&tenfile=<?php echo $row[2] ?>"> Xóa</a>
										
										</td>	
	
								</tr>
								<?php
							} 
						}
					?>

				</tbody>

			</table>
		</div>


	<script type="text/javascript">
		$(document).ready( function () {
			$('#tbl_taikhoan').DataTable();
		} );

		$('#tbl_taikhoan').dataTable( {

			"lengthMenu": [ 7,15, 25, 50, 100 ],

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

</div>
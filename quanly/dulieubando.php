	<div class="card">
		<div class="header">
			<div class="tieude" style="text-align: center;margin-bottom:30px" >
				<h3>Dữ liệu file bản đồ</h3>
			</div>
		</div>
			<div class="content table-responsive">
				<table class="table table-bordered table-striped" id="tbl_taikhoan">
					<thead>
						<tr class="success">
							<th>ID</th>
							<th>Tiêu đề</th>
							<th>Chỉ số</th>
							<th>Tênfile</th>
							<th>Top</th>
							<th>Bottom</th>
							<th>Left</th>
							<th>Right</th>
							<th>Chọn</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
							$select_data= "SELECT * from dulieufilebando";
							$result = pg_query($conn,"$select_data");
							if($result ==true){
								$id =0;
								while($row = pg_fetch_array($result)){
									$id ++;
						?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $row['tieude']; ?></td>
							<td><?php echo $row['chiso']; ?></td>
							<td><?php echo $row['tenfile']; ?></td>
							<td><?php echo $row['top']; ?></td>
							<td><?php echo $row['bottom']; ?></td>
							<td><?php echo $row['leftt']; ?></td>
							<td><?php echo $row['rightt']; ?></td>
							<td>

								<a class="btn btn-primary" style="color:white;" name="xoa" href="http://khoa-luan.local/quanly/dulieubando-chon.php?username=admin&filename=<?php echo $row['tenfile']?>"> Chọn</a>
								</td>
							<td>
								<a class="btn btn-warning" style="color:white;" name="xoa" href="http://khoa-luan.local/quanly/dulieubando-xoa.php?username=admin&filename=<?php echo $row['tenfile']?>"> Xóa</a>

							</td>
						</tr>
						<?php
								}
							}
						 ?>
					</tbody>

			</table>
			<div class="row">
				<div class="col-md-6 col-md-offset-5">
					<a class="btn btn-success" href="http://khoa-luan.local/quanly/dulieubando-them.php?username=admin" style="color:white">Thêm mới</a>
				</div>
			</div>
		</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12">
		<div class="header">
			<div class="tieude" style="text-align: center;margin-bottom:30px" >
				<h3>Dữ liệu chọn hiển thị trên Trang chủ</h3>
			</div>
		</div>

	<div class="content table-responsive">
				<table class="table table-bordered table-striped" id="tbl_chon_dulieubando">
					<thead>
						<tr class="success">
							<th>ID</th>
							<th>Tiêu đề</th>
							<th>Chỉ số</th>
							<th>Tênfile</th>
							<th>Top</th>
							<th>Bottom</th>
							<th>Left</th>
							<th>Right</th>
							<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
							$select_data= "SELECT * from chon_dulieufilebando";
							$result = pg_query($conn,"$select_data");
							if($result ==true){
								$id =0;
								while($row = pg_fetch_array($result)){
									$id ++;
						?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $row['tieude']; ?></td>
							<td><?php echo $row['chiso']; ?></td>
							<td><?php echo $row['tenfile']; ?></td>
							<td><?php echo $row['top']; ?></td>
							<td><?php echo $row['bottom']; ?></td>
							<td><?php echo $row['leftt']; ?></td>
							<td><?php echo $row['rightt']; ?></td>

							<td>
								<a class="btn btn-warning" style="color:white;" name="xoa" href="http://khoa-luan.local/quanly/dulieubando-chon-xoa.php?username=admin&filename=<?php echo $row['tenfile']?>"> Xóa</a>

							</td>
						</tr>
						<?php
								}
							}
						 ?>
					</tbody>

			</table>
		</div>
	</div>
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#tbl_taikhoan').DataTable();
			$('#tbl_chon_dulieubando').DataTable();
		} );

		$('#tbl_chon_dulieubando').dataTable( {

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
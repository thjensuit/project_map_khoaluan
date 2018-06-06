<?php
  $tentaikhoan = '';
  $_GET['username1']='';
  if(isset($_GET['username1'])){
    $tentaikhoan1 = $_GET['username1'];
  }
 ?>
	<div class="card">
		<div class="header">
			<div class="tieude" style="text-align: center;margin-bottom:30px" >
				<h3>Thông tin tài khoản nhân viên</h3>
			</div>
		</div>
			<div class="content table-responsive">
				<table class="table table-bordered table-striped" id="tbl_taikhoan">
					<thead>
						<tr class="success">
							<th>ID</th>
							<th>Tên người dùng</th>
							<th>Tên Tài Khoản</th>
							<th>Mật khẩu</th>
							<th>Mail</th>
							<th>Xóa</th>
							<th>Sửa</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
						$select_data= "SELECT * from taikhoan";
						$result = pg_query($conn,"$select_data");
						if ($result == true){
							$stt = 0;
							while($row = pg_fetch_array($result)){
								$stt ++ ;
								$tennguoidung = str_replace(" ","-",$row['tennguoidung']);
								$tentaikhoan = $row['tentaikhoan'];
								$matkhau = $row['matkhau'];
								$mail = $row['mail'];
								?>
								<tr><td><?php echo $stt; ?></td>
									<td><?php echo $row['tennguoidung'];?></td>
									<td><?php echo $row['tentaikhoan'];?></td>
									<td><?php echo $row['matkhau'];?></td>
									<td><?php echo $row['mail'];?></td>
									<td>
										<a class="btn btn-warning" style="color:white; margin-left: 20px" name="xoa" href="http://localhost/khoaluan/quanly/thongtinnv-main.php?action=xoa&username=admin&tentaikhoan=<?php echo $row[1] ?>"> Xóa</a>
									</td>
									<td>
										<a class="btn btn-primary" style="color:white;" name="sua" href="http://localhost/khoaluan/quanly/thongtinnv-sua.php?username=admin&id=<?php echo $id;?>&tennguoidung=<?php echo $tennguoidung;?>&taikhoan=<?php echo $tentaikhoan;?>&matkhau=<?php echo $matkhau;?>&email=<?php echo $mail;?>"> Sửa</a>
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
					<a class="btn btn-success" href="http://localhost/khoaluan/quanly/thongtinnv-them.php?username=admin" style="color:white">Tạo tài khoản mới</a>
				</div>
			</div>
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
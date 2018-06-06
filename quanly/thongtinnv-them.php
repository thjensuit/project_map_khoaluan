<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Bootstrap Exampl</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<form action = "http://khoa-luan.local/quanly/thongtinnv-them-thongbao.php?username=admin" method = "POST">
		<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-12">
									<a  class="close" href="">&times;</a>
									<h4 class="modal-title" style="padding-left: 150px">Thông tin tạo tài khoản nhân viên </h4>
								</div>
							</div>
						</div> <!-- end header -->

						<div class="modal-body">
							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Tên người dùng: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="tennguoidung" class="form-control">
								</div>
							</div> <!-- tenguoidung-->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Tài khoản: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="taikhoan" class="form-control">
								</div>
							</div> <!-- taikhoan -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Mật khẩu: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="matkhau" class="form-control">
								</div>
							</div> <!-- matkhau -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Địa chỉ email: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="email" class="form-control">
								</div>
							</div> <!-- mail -->


						</div>

						<div class="modal-footer">
							<input type="submit" value="Thêm" class="btn btn-success" name="them" >

							<a class="btn btn-default" href="http://khoa-luan.local/quanly/dashboard.php?username=admin&active=thongtinnv"> Hủy</a>
						</div> <!-- end footer -->

					</div> <!-- end content -->

				</div>
			</div> <!-- end modal -->
	</form>>

</body>
</html>
<script type="text/javascript">
		$(window).on('load',function(){
			$('#myModal').modal('show');
		});
	</script> <!-- auto modal -->

	<script type="text/javascript">
		jQuery('#myModal').modal('show').on('hide.bs.modal', function (e) {
  		e.preventDefault();
	});
	</script>
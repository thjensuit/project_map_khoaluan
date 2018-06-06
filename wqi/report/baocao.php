<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

	<form method="post" action="test1.php">
			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-12">
									<a  class="close" href="" data-dismiss="modal" >&times;</a>
									<h4 class="modal-title" style="padding-left: 180px">Thông tin lập báo cáo </h4>
								</div>
							</div>
						</div> <!-- end header -->

						<div class="modal-body">

							<div class="row form-group">
								<div class="col-md-4">
									<p><b><i>Tiêu đề báo cáo: </i></b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="tennguoilapbaocao" class="form-control">
								</div>
							</div> <!-- ten bao cao-->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b><i>Tên người lập báo cáo: </i></b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="tennguoilapbaocao" class="form-control">
								</div>
							</div> <!-- ten nguoi lap bao cao -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b><i>Thời gian lập báo cáo: </i></b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="thoigianlapbaocao" class="form-control">
								</div>
							</div> <!-- thoigian -->

							<div class="row form-group">
								<div class="col-md-12">
									<p><b><i>Chọn tiêu chí đánh giá: </i></b></p>
								</div>
								<div class="col-md-4 col-md-offset-1">
									<p>Thời gian</p>
								</div>
							</div> <!-- chi tieu danh gia -->

						</div> <!-- end body -->

						<div class="modal-footer">
							<a type="submit" class="btn btn-primary" name="xuatbaocao" href="http://khoa-luan.local/wqi/report/test1.php">Xuất báo cáo</a>

							<a class="btn btn-default" href="http://khoa-luan.local/wqi/dashboard.php"> Đóng</a>
						</div> <!-- end footer -->

					</div> <!-- end content -->

				</div>
			</div> <!-- end modal -->
		</form>

	</div>

	<div class="container">
		<div>

		</div>
	</div>

	<script type="text/javascript">
		$(window).on('load',function(){
			$('#myModal').modal('show');
		});
	</script> <!-- auto modal -->

</body>
</html>

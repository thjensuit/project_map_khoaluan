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
	<form action = "http://khoa-luan.local/quanly/dulieubando-them-thongbao.php?username=admin" method = "POST" enctype="multipart/form-data">
		<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-12">
									<a  class="close" href="http://khoa-luan.local/quanly/dashboard.php?username=admin&active=dulieubando">&times;</a>
									<h4 class="modal-title" style="padding-left: 200px"> Thêm lớp bản đồ  </h4>
								</div>
							</div>
						</div> <!-- end header -->

						<div class="modal-body">
							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Tên tiêu đề: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="tieude" class="form-control">
								</div>
							</div> <!-- ten tieu de-->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Chỉ số: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="chiso" class="form-control">
								</div>
							</div> <!-- ten tieu de-->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b> File bản đồ </b></p>
								</div>
								<div class="col-md-5">
									<input type="file" name="filebando">
								</div>
							</div> <!-- ten file -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Top: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="top" class="form-control">
								</div>
							</div> <!-- top -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Bottom: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="bottom" class="form-control">
								</div>
							</div> <!-- bottom -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Left: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="left" class="form-control">
								</div>
							</div> <!-- left -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Right: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="right" class="form-control">
								</div>
							</div> <!-- right -->


						</div>

						<div class="modal-footer">
							<input type="submit" value="Thêm" class="btn btn-success" name="them" >

							<a class="btn btn-default" href="http://khoa-luan.local/quanly/dashboard.php?username=admin&active=dulieubando"> Hủy</a>
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
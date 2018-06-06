<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<?php
	$tentaikhoan = '';
  if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  }
		$act ='';
		if(isset($_GET['filename'])){
           	if($_GET['filename']!=''){
           	$filename_h= $_GET['filename'];
           	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
           
           
	 ?>
	<form action="http://localhost/khoaluan/aqi/baocao_main.php?username=<?php echo $tentaikhoan ?>&filename=<?php if(isset($_GET['filename'])){
            echo $_GET['filename'];
            } ?>" method="POST">
		<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-12">
									<a  class="close" href="http://localhost/khoaluan/aqi/dashboard-aqi.php?username=<?php echo $tentaikhoan ?>">&times;</a>
									<h4 class="modal-title" style="padding-left: 180px">Thông tin lập báo cáo </h4>
								</div>
							</div>
						</div> <!-- end header -->

						<div class="modal-body">
							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Tiêu đề báo cáo: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="tieude" class="form-control">
								</div>
							</div> <!-- ten bao cao-->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Tên người lập báo cáo: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="ten" class="form-control">
								</div>
							</div> <!-- ten nguoi lap bao cao -->

							<div class="row form-group">
								<div class="col-md-4">
									<p><b>Thời gian lập báo cáo: </b></p>
								</div>
								<div class="col-md-5">
									<input type="text" name="thoigian" class="form-control">
								</div>
							</div> <!-- thoigian -->

							<div class="row form-group">
								<div class="col-md-12">
									<p><b>Chọn tiêu chí báo cáo: </b></p>
								</div>

								<div class="col-md-11 col-md-offset-1">
									<p><b><i>Thời gian</i></b></p>
								</div>

								<div class="col-md-12">

									<div class="col-md-3 col-md-offset-1">
										<select class="form-control" id="sel1" name="ngay_option">
											<option selected value="chonngay">- Ngày -</option>
											<?php
											$select_ngay= "SELECT distinct extract(day from thoigian)as ngay  from $filename_h order by ngay asc ";
											$result_ngay = pg_query($conn,"$select_ngay");
											if($result_ngay ==true){
												while($row =pg_fetch_array($result_ngay)){
													?>
													<option value="<?php echo $row[0]; ?>"><?php echo "Ngày $row[0]"; ?></option>
													<?php
												}
											} 
											?>
										</select>
									</div>

									<div class="col-md-3">
										<select class="form-control" id="sel1" name="thang_option">
											<option selected value="chonthang">- Tháng -</option>
											<?php
											$select_thang= "SELECT distinct extract(month from thoigian)as thang  from $filename_h order by thang asc ";
											$result_thang = pg_query($conn,"$select_thang");
											if($result_thang ==true){
												while($row =pg_fetch_array($result_thang)){
													?>
													<option value="<?php echo $row[0]; ?>"><?php echo "Tháng $row[0]"; ?></option>
													<?php
												}
											} 
											?>
										</select>
									</div>
									
									<div class="col-md-3">
										<select class="form-control" id="sel1" name="nam_option">
											<option selected value="chonnam" style="">-Năm-</option>
											<?php
											$select_nam= "SELECT distinct extract(year from thoigian)as nam  from $filename_h order by nam asc ";
											$result_nam = pg_query($conn,"$select_nam");
											if($result_nam ==true){
												while($row =pg_fetch_array($result_nam)){
													?>
													<option value="<?php echo $row[0]; ?>"><?php echo "Năm $row[0]"; ?></option>
													<?php
												}
											} 
											?>
										</select>
									</div>
								</div>

								<div class="col-md-3 col-md-offset-1" style="margin-top: 10px">
									<p><b><i>Tên Trạm</i></b></p>
								</div>
								
								<div class="col-md-12">
									<div class="col-md-5 col-md-offset-1">
										<select class="form-control" id="sel1" name="tentram_option">
											<option selected value="chontram" style="">-Tên trạm-</option>
											<?php
											$select_tentram= "SELECT distinct tentram  from $filename_h order by tentram asc ";
											$result_tentram = pg_query($conn,"$select_tentram");
											if($result_tentram ==true){
												while($row =pg_fetch_array($result_tentram)){
													?>
													<option value="<?php echo $row[0]; ?>"><?php echo "Trạm $row[0]"; ?></option>
													<?php
												}
											} 
											?>
										</select>
									</div>
								</div>
							</div> <!-- chi tieu danh gia -->

						</div>

						<div class="modal-footer">
							<input type="submit" value="Xem báo cáo" class="btn btn-primary" name="xembaocaoaqi" >

							<a class="btn btn-default" href="http://localhost/khoaluan/aqi/dashboard-aqi.php?username=<?php echo $tentaikhoan ?>"> Đóng</a>
						</div> <!-- end footer -->

					</div> <!-- end content -->

				</div>
			</div> <!-- end modal -->
	</form>
	<?php
		}
		} 
	 ?>
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
</body>
</html>
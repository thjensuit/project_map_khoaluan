<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <title>Khoa luan</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>


</head>
<body>
	<script src="js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery.table2excel.js"></script>



	<div class="container"> <!-- begin content -->

		<header><!-- begin header -->
			<div class="">
				<div class="row">
					<div class="col-sm-12">
						<div class="pull-left" style="">
							<img src="img/logo.png" style="padding-bottom: 10px ;padding-top: 5px;padding-left: 20px;height:70px; ">
						</div>
						<div class="pull-right">
							<form class="form-inline">
								<div class="form-group">
									<label for="exampleInputName2">Tài Khoản</label>
									<input type="text" class="form-control" id="exampleInputName2" placeholder="Tên đăng nhập...">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail2">Mật Khẩu</label>
									<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Mật Khẩu...">
								</div>
								<button type="submit" class="btn btn-primary">Đăng Nhập</button>
								<button type="submit" class="btn btn-success">Đăng Kí</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</header> <!-- End .header -->



		<div class="slide"> <!-- begin slide -->
			<div class="row">
				<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px">
					<img id="bia" src="img/slider2.jpg" style=" width:100%;height:125px">
				</div>
			</div>
		</div>  <!-- End .slide -->



		 <!-- Begin menu -->
			<div class="menu row" style="background:/*#026A52 */	 /*#ff8533*/#1373af ; ">
				<ul>
					<li><a href="xoa.php"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
					<li><a href="#news">Chỉ số WQI</a></li>
					<li><a href="#news">Chỉ số AQI</a></li>
					<li><a href="#about">Hổ trợ</a></li>
				</ul>
			</div>
		<!-- End menu -->


		<div class="row" style="margin-top: 5px;">
			<div style="width:18%; float:left">
				<div class="sidebar" >
					<ul style="background:/*#1A5784 */ /*#86A47C */   #e6e6e6 ">
						<li><a href="index1.php?active=dulieudauvao" class="item_sidebar" id="dulieudauvao">Dữ liệu đầu vào</a></li>
						<li><a href="index1.php?active=wqithongso&&filenames=
						<?php if(isset($_GET['filenames'])){
						if ($_GET['filenames']!='') {
							echo $_GET['filenames'];				}
					} ?>" class="item_sidebar">Chỉ số WQI thông số</a>
						</li>
						<li><a href="index1.php?active=wqitram&&filenames=
						<?php if(isset($_GET['filenames'])){
						if ($_GET['filenames']!='') {
							echo $_GET['filenames'];				}
					} ?>" class="item_sidebar">Chỉ số WQI trạm</a>
						</li>
						<li><a href="index1.php?active=vebieudo&&filenames=
						<?php if(isset($_GET['filenames'])){
						if ($_GET['filenames']!='') {
							echo $_GET['filenames'];				}
					} ?>" class="item_sidebar">Vẽ biểu đồ</a>
						</li>
						<li><a href="index1.php?active=xembando&&filenames=
						<?php
						if(isset($_GET['filenames'])){
						if ($_GET['filenames']!='') {
							echo $_GET['filenames'];				}
					}
						 ?>" class="item_sidebar">Xem bản đồ</a>
						</li>
					</ul>
				</div>
			</div>

			<div style="width:80%; float:right" id="main">

				<?php
					if(isset($_GET['active'])){
						if ($_GET['active']=='dulieudauvao') {
							require("history_wqi.php");
						}elseif ($_GET['active']=='wqithongso') {
							if(isset($_GET['filenames'])){
								if ($_GET['filenames']==''){
				?>
						<script type="text/javascript">
							alert("<?php echo'Bạn chưa chọn dữ liệu đầu vào' ?>")
						</script>
				<?php
								}else{
								require("wqi_thongso.php");	}
							}
							?>

							<?php

						}elseif ($_GET['active']=='wqitram') {
							if(isset($_GET['filenames'])){
								if ($_GET['filenames']==''){
							?>
						<script type="text/javascript">
							alert("<?php echo'Bạn chưa chọn dữ liệu đầu vào' ?>");
						</script>
							<?php
								}else{
									require("wqi_tram.php");
								}
							}

						}elseif ($_GET['active']=='dulieuuser') {
							require("dulieu_user.php");
						}elseif($_GET['active']=='vebieudo'){
							if(isset($_GET['filenames'])){
								if ($_GET['filenames']==''){
						?>
						<script type="text/javascript">
							alert("<?php echo'Bạn chưa chọn dữ liệu đầu vào' ?>");
						</script>
						<?php
								}else{
										require("bieudo.php");
								}
							}
						}elseif($_GET['active']=='xembando'){
							if(isset($_GET['filenames'])){
								if ($_GET['filenames']==''){
						?>
						<script type="text/javascript">
							alert("<?php echo'Bạn chưa chọn dữ liệu đầu vào' ?>");
						</script>
						<?php
								}else{
										require("map.php");

								}
							}
						}
					}else{
						require("formdulieuwqi.php");
					}

				 ?>
			</div>
		</div>




		<div class="footer row" style="background:  #bfbfbf; height: 130px; border-radius: 5px">
			<div class="pull-left item_ketnoi" style="margin-top: 10px;padding-bottom: 15px">
				<ul>
					<li><span class="glyphicon glyphicon-link"></span><a href="" style="margin-left: 15px; color:  #4d004d; font-weight: bold">Kết nối với chúng tôi</a></li>
					<li><a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
						<a href="https://twitter.com/bootsnipp" style="color: #4099FF"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
						<a href="https://plus.google.com/+Bootsnipp-page" style="color: #d34836;"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
						<a href="mailto:bootsnipp@gmail.com" style="color: #f39c12"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
					</li>
					<li style="margin-left: 55px; color:#4d004d">Hoặc</li>
				</ul>
				<a id="link" href="" style="margin-left: 10px;padding-bottom:10px">http://localhost/qe_new/qe/demo.html</a>
			</div>
			<div class="Diachi col-sm-4 col-sm-offset-1">
				<ul style="margin-left: 20px; color: 	  #4d004d">
					<li style="margin-left: 22px; margin-top: 18px; font-size: 14px"><span class="glyphicon glyphicon-home"></span> Trường Đại Học Khoa Học Tự Nhiên </li>
					<li style="margin-top: 5px;margin-left: 30px; font-style: italic ">227-Nguyễn Văn Cừ - Q5.TPHCM</li>
					<li style="margin-top: 10px;margin-left: 22px; font-size: 15px"><span class="glyphicon glyphicon-edit"></span> Thiết kế Web</li>
					<li style="margin-top: 5px;margin-left: 20px;font-style: italic  ">Trần Khoa luan-1317217</li>
				</ul>
			</div>

			<div class="lienhe col-sm-4 pull-right">
				<ul style="color:	 #4d004d; margin-top: 20px; margin-left: 20px">
					<li style="margin-left: 50px"><span class="glyphicon glyphicon-chevron-right"></span>Liên Hệ</li>
					<li style="padding-top:10px;font-style: italic;"><span class="glyphicon glyphicon-earphone"></span> 0164838673</li>
					<li style="font-style: italic;"><span class="glyphicon glyphicon-envelope"></span> Tranthaison2408@gmail.com</li>
					<li style="font-style: italic;"><span class="glyphicon glyphicon-home"></span> Phan Huy Ích-Q.Gò Vấp.TPHCM</li>
				</ul>
			</div>
		</div>

	</div> <!-- End content -->


	<script type="text/javascript">
		$(document).ready(function(){

			$("#btn_downloadform").click(function(){
				$("#form_dulieu").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Tenfile",
					fileext: ".xls"
				});
			});
		});

		$("#dulieudauvao").click(function(){
			$("#form_dulieu").hide();
		});
	</script> <!-- End download form chuan -->



</body>
</html>
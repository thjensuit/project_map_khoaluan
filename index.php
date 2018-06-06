<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <title>Thái Sơn - Home</title>
  
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- mapboox -->
 <script src='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.js'></script>
 <link href='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.css' rel='stylesheet' />

<style type="text/css">
.title{
	background: #27a64c;
	color:#fff;
}
.footer ul{
	list-style: none;
}

.footer ul li {
	padding: 5px 0;
}

#social:hover {
    -webkit-transform:scale(1.0); 
}
#social {
-webkit-transform:scale(0.8);
                /* Browser Variations: */
-webkit-transition-duration: 0.5s; 

            }           
/* 
    Only Needed in Multi-Coloured Variation 
                                               */
.social-fb:hover {
                color: #3B5998;}
.social-tw:hover {
                color: #4099FF;}
.social-gp:hover {
                color: #d34836;}
.social-em:hover {
                color: #f39c12;
            }
.item_sidebar{
  -webkit-transform:scale(1);
                /* Browser Variations: */
-webkit-transition-duration: 0.03s; 
}
.item_sidebar:hover{
   -webkit-transform:scale(1.05);
}

#container{
	border :1px solid #f5f5f0;
}

</style>

</head>
<body>
	

<div id="container">

	<div class="container" style="background-color: white"> <!-- begin content -->
		<header><!-- begin header -->       
			<div class="">
				<div class="row">
					<div class="col-sm-12">
						<div class="pull-left" style="">
							<img src="img/logo.png" style="padding-bottom: 10px ;padding-top: 5px;padding-left: 20px;height:70px; ">
						</div>            
						<div class="pull-right">
							<form class="form-inline" method="post" action="http://localhost/khoaluan/index-main.php" >
								<div class="form-group">
									<label for="">Tài Khoản</label>
									<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập...">
								</div>
					
								<div class="form-group">
									<label for="">Mật Khẩu</label>
									<input type="password" class="form-control" name="matkhau" placeholder="Mật Khẩu..." id="matkhau">
								</div>
								<button type="submit" class="btn btn-primary" name="dangnhap">Đăng Nhập</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</header> <!-- End .header -->



		<div class="slide"> <!-- begin slide -->
			<div class="row">
				<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px">
					<img id="bia" src="img/banner.jpg" style=" width:100%;height:140px">
				</div>
			</div>
		</div>  <!-- End .slide -->


 
		<div class="menu row" style="background:/*#026A52 */	 /*#ff8533*/#1373af ; "><!-- Begin menu -->
			<div class="col-sm-6 col-sm-offset-3">
				<ul>
					<li><a href="#" style=""><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
					<li><a href="" id ="tinhtoanwqi">Tính toán chỉ số WQI</a></li>
					<li><a href="" id="tinhtoanaqi">Tính toán chỉ số AQI</a></li>
				</ul>
			</div>
		</div><!-- End menu -->

		<div id="content" style="margin-top: 15px">
			<div class="row" style="margin-top: 5px;"> <!-- begin content -->
				<div class="col-sm-12 title">
					<ul>
						<h4><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  Chỉ số chất lượng môi trường</h4>
						<li style="font-style: italic; padding-left: 20px"><p style="font-size:15px;">Tập hợp các tham số hay chỉ thị được tích hợp hay nhân với trọng
							số. Các chỉ số ở mức độ tích hợp cao hơn, nghĩa là chúng được tính toán từ nhiều biến số hay dữ liệu để giải thích cho 1 hiện tượng nào đó.
						</p></li>
					</ul>
				</div>
				

				<div class="col-sm-12" style="padding-bottom:25px; border:1px solid #f5f5f0" >
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1"><h3 style="color:#002080; font-weight: bold;">WQI là gì?</h3></div>
					</div>
					<div class="col-sm-2 col-sm-offset-1">
						<img src="img/wqi.png">
					</div>
					<div class="col-sm-6">
						<p style="padding-top: 25px; font-size:16.5px;">Chỉ số chất lượng nước (viết tắt là WQI) là một chỉ
							số được tính toán từ các thông số quan trắc chất
							lượng nước, dùng để mô tả định lượng về chất
							lượng nước và khả năng sử dụng của nguồn nước
							đó; được biểu diễn qua một thang điểm.</p>
					</div>

					<div class="row">
						<div class="col-sm-10 col-sm-offset-1"><h3 style="font-weight: bold;">Mức đánh giá chất lượng nước theo WQI</h3></div>
						<div class="col-sm-8 col-sm-offset-2">
							<table class="table table-bordered table-str">
								<thead>
									<tr class="active">
										<th>Khoảng giá tri WQI</th>
										<th>Mức đánh giá chất lượng nước</th>
										<th>Màu</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>91-100</td>
										<td>Sử dụng tốt cho mục đích cấp nước sinh hoạt</td>
										<td style="background:  #99bbff"> Màu xanh nước biển</td>
									</tr>
									<tr >
										<td>76-90</td>
										<td>Sử dụng tốt cho mục đích cấp nước sinh hoạt nhưng cần có các biện pháp xử lý phù hợp</td>
										<td style="background: #99ff66"> Màu xanh lá cây</td>
									</tr>
									<tr >
										<td>51-75</td>
										<td>Sử dụng cho mục đích tưới tiêu và các mục đích tương tự khác</td>
										<td style="background: #ffff1a"> Màu vàng</td>
									</tr>
									<tr>
										<td>26-50</td>
										<td>Sử dụng cho giao thông thủy và các mục đích tương tự khác</td>
										<td style="background: orange"> Màu da cam</td>
									</tr>
									<tr >
										<td>0-25</td>
										<td>Nước ô nhiễm nặng, cần các biện pháp xử lý trong tương lai</td>
										<td style="background: red"> Màu đỏ</td>
									</tr>
								</tbody>
							</table>	
						</div>
						<div class="col-sm-6 pull-right"><p style="font-style: italic; font-size: 13px">(Theo tổng cục môi trường quy định)</p></div>
						
						<div class="col-md-7 col-md-offset-2" style="margin-top: 20px">
							<?php require("map-noisuy-nuoc.php") ?>
						</div> <!-- map nước -->
						
						<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-1" style="font-size: 16px; font-weight: bold"><span class="glyphicon glyphicon glyphicon-hand-right" aria-hidden="true"></span> Xem tài liệu hướng dẫn tính toán chỉ số WQI <b><a href="http://www.quantracmoitruong.gov.vn/portals/0/PP%20Tinh%20WQI.pdf">Tại đây</a></b></div>
						</div>

					</div> 
				</div><!-- end wqi -->

					<div class="col-sm-12" style="padding-bottom:25px;border:1px solid #f5f5f0">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1"><h3 style="color:#cc3300; font-weight: bold;">AQI là gì?</h3></div>
						</div>
						<div class="col-sm-2 col-sm-offset-1">
							<img src="img/aqi2.gif">
						</div>
						<div class="col-sm-6" style="margin-left: 20px">
							<p style="padding-top: 15px; font-size:16.5px">Chỉ số chất lượng không khí (viết tắt là AQI) là chỉ số được tính toán từ các thông số quan trắc cácchất ô nhiễm trong không khí, nhằm cho biết tìnhtrạng chất lượng không khí và mức độ ảnh hưởngđến sức khỏe con người, được biểu diễn qua một thang điểm.</p>
						</div>
						<div class="row">
					
							<div class="col-sm-10 col-sm-offset-1"><h3 style="color:#cc3300; font-weight: bold;" >Mức đánh giá chất lượng môi trường không khí theo AQI</h3></div>
							<div class="col-sm-8 col-sm-offset-2">
								<table class="table table-bordered table-str">
									<thead>
										<tr class="active">
											<th>Khoảng giá tri AQI</th>
											<th>Chất lượng không khí</th>
											<th>Ảnh hưởng sức khỏe</th>
											<th>Màu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>0-50</td>
											<td>Tốt</td>
											<td>Không ảnh hưởng đến sức khỏe</td>
											<td style="background: #99bbff"> Màu xanh nước biển</td>
										</tr>
										<tr ">
											<td>51-100</td>
											<td>Trung bình</td>
											<td>Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài</td>
											<td style="background: #ffff00"> Màu vàng</td>
										</tr>
										<tr>
											<td>101-200</td>
											<td>Kém</td>
											<td>Nhóm nhạy cảm cần hạn chế thời gian ở bên ngoài</td>
											<td style="background: orange"> Màu cam</td>
										</tr>
										<tr >
											<td>201-300</td>
											<td>Xấu</td>
											<td>Nhóm nhạy cảm tránh ra ngoài. Những người khác hạn chế ra ngoài</td>
											<td style="background: #ff471a"> Màu đỏ</td>
										</tr>
										<tr>
											<td>Trên 300</td>
											<td>Nguy hại</td>
											<td>Mọi người nên ở trong nhà</td>
											<td style="background: #996600"> Màu nâu</td>
										</tr>
									</tbody>
								</table>	
							</div>
							<div class="col-sm-6 pull-right"><p style="font-style: italic; font-size: 13px">(Theo tổng cục môi trường quy định)</p></div>
						</div>

						<div class="col-md-7 col-md-offset-2" style="margin-top: 20px">
							<?php require("map-noisuy-khongkhi.php") ?>
						</div> <!-- map khongkhi -->

						<div class="col-sm-6 col-sm-offset-1" style="font-size: 16px; font-weight: bold"><span class="glyphicon glyphicon glyphicon-hand-right" aria-hidden="true"></span> Xem tài liệu hướng dẫn tính toán chỉ số AQI <b><a href="http://www.quantracmoitruong.gov.vn/portals/0/AQI%20Method.pdf?&tabid=112">Tại đây</a></b></div>
					</div><!-- end aqi -->
				</div>
			</div> <!-- End content -->

			<div class="footer" >
				<div class="row" style="background: #004d4d">
					<div class="col-sm-3" style="color: #fff">
						<ul>
						<li style="margin-top: 18px;margin-left: 50px;" >Liên hệ</li>
							<li><a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
								<a href="https://twitter.com/bootsnipp" style="color: #4099FF"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
								<a href="https://plus.google.com/+Bootsnipp-page" style="color: #d34836;"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
								<a href="mailto:bootsnipp@gmail.com" style="color: #f39c12"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
							</li>
						</ul>
					</div>
					<div class="col-sm-4 col-sm-offset-1 diachi" style="color: #fff">
						<ul>
							<li style="margin-top: 18px; font-size: 14px"><span class="glyphicon glyphicon glyphicon-road"></span> Trường Đại Học Khoa Học Tự Nhiên </li>
							<li style="margin-top: 5px;margin-left: 20px; font-style: italic ">227-Nguyễn Văn Cừ - Q5.TPHCM</li>
							<li style="margin-left: 70px; margin-top: 5px; font-size: 14px"><span class="glyphicon glyphicon-home"> </span> <a href="#container" style="color:#fff; font-weight: bold">Trang chủ</a> </li>

						</ul>
					</div>
					<div class="col-sm-4 pull-right" style="color: #fff">
						<ul>
							<li style=" margin-top: 18px;font-size: 15px"><span class="glyphicon glyphicon-edit"></span> Thiết kế Web</li>
							<li style="font-style: italic  ">Trần Thái Sơn-1317217</li>
							<li>
								&copy; 2017 <a href="">Thái Sơn</a>, Hỗ trợ tốt nhất cho bạn
							</li>
						</ul>
					</div>
				</div>
			</div>

	</div> <!-- end container -->
	</div>

	
	
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

	<script>
		$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".diachi", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $(".diachi a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    }  // End if
});
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#tinhtoanwqi").click(function(){
			alert("Bạn chưa đăng nhập vào hệ thống");
		});

		$("#tinhtoanaqi").click(function(){
			alert("Bạn chưa đăng nhập vào hệ thống");
		});
	});
</script>

</body>
</html>

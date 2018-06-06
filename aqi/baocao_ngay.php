<!DOCTYPE html>
<html>
<head>
	<title>Báo cáo ngày</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<style type="text/css" media="print">
        #print_button, #quaylai{
            display:none;
        }
    </style>
</head>
<body>
<?php
	 $tentaikhoan = '';
  if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  }
  
	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
	$date = "";
	if(isset($_POST['ngay_option']) && isset($_POST['thang_option']) &&isset($_POST['nam_option']) ){
		$ngay = $_POST['ngay_option'];
		$thang = $_POST['thang_option'];
		$nam = $_POST['nam_option'];
		$tentram = $_POST['tentram_option'];

		if($ngay<=10){
			$ngay1 ="0".$_POST['ngay_option'];
		}else{
			$ngay1 =$ngay;
		}
		if($thang<=10){
			$thang1 ="0".$_POST['thang_option'];
		}else{
			$thang1= $thang;
		}
		$date=  $nam."/".$thang1."/".$ngay1;
		//echo "$date";
	}
	$filename_h ="";
	if(isset($_GET['filename'])){
		$filename_h = $_GET['filename'];
		$filename_ngay = $_GET['filename']."_ngay";
		//echo $filename_h;
	}
	?>
	<div class="container">
		<div class="row">

			<div class="col-md-12" style="padding-left: 300px">
				<h3><b><?php if(isset($_POST["tieude"])){echo $_POST["tieude"];} ?></b></h3>
			</div> <!-- tieu de -->

			<div class="col-md-4" style="margin-top:30px">
				<b><h4>Người lập báo cáo :  <?php if(isset($_POST["ten"])){echo $_POST["ten"];} ?></b></h4>
				<b><h4>Thời gian lập báo cáo : <?php if(isset($_POST["thoigian"])){echo $_POST["thoigian"];} ?></b></h4>
			</div><!-- thong tin nguoi lap bao cao -->

			

			<div class="col-md-12" style="margin-top: 50px">
			<div class="col-md-5 col-md-offset-4" style="margin-bottom: 10px"><h4><i>Bảng Thông tin Trạm Quan Trắc<?php echo " - ".$date ?></i> </h4></div>
				<table class="table table-bordered">
					<thead>
						<tr style="background:#e6ffcc">
							<th>STT</th>
							<th>Tên Trạm</th>
							<th>Tọa độ X </th>
							<th>Tọa độ Y </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$select_data= "SELECT * FROM $filename_ngay where to_char(\"thoigian\", 'YYYY/MM/DD')='$date'";
						$result = pg_query($conn,"$select_data"); 
						if ($result == true){
							$id =0;
							while($row = pg_fetch_array($result)){
							$id++;
							$mucanhhuong='';
							$chatluong='';
							$mau ='';
					 ?>
					 	<tr>
								<td><?php echo $id; ?></td>	
								<td><?php echo $row['tentram']?></td>
								<td><?php echo $row['x']?></td>
								<td><?php echo $row['y']?></td>
						</tr>
					 <?php
					 		}
					 	} 
					  ?>
					</tbody>
				</table>
			</div> <!-- bang thong tin tram quan trac -->

			<div class="col-md-12" style="margin-top: 50px">
			<div class="col-md-6 col-md-offset-4" style="margin-bottom: 10px"><h4><i>Bảng kết quả AQI giờ các Trạm Quan Trắc<?php echo " - ".$date ?></i> </h4></div>
				<table class="table table-bordered">
					<thead>
						<tr style="background:#e6ffcc">
							<th>Tên Trạm</th>
							<th>ThờiGian</th>
							<th>AQI_SO2</th>
							<th>AQI_NO2</th>
							<th>AQI_TSP</th>
							<th>AQI_PM10</th>
							<th>AQI_PM2.5</th>
							<th>AQI_PB</th>
							<th>AQI_trạm</th>
							<th>Thông số ô nhiễm nhất</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$select_data= "SELECT * FROM $filename_h where to_char(\"thoigian\", 'YYYY/MM/DD')='$date'";
						$result = pg_query($conn,"$select_data"); 
						if ($result == true){
							$id =0;
							while($row = pg_fetch_array($result)){
							$id++;
							$mucanhhuong='';
							$chatluong='';
							$mau ='';
					 ?>
					 	<tr>
								<td><?php echo $row['tentram']?></td>	
								<td><?php echo $row['thoigian']?></td>
								<td><?php echo $row['aqi_h_so2']?></td>	
								<td><?php echo $row['aqi_h_no2']?></td>
								<td><?php echo $row['aqi_h_tsp']?></td>
								<td><?php echo $row['aqi_h_pm10']?></td>
								<td><?php echo $row['aqi_h_pm25']?></td>
								<td><?php echo $row['aqi_h_pb']?></td>
								<td><?php echo $row['aqi_h_tram']?></td>
								<td><?php echo $row['thongso_h_max']?></td>
						</tr>
					 <?php
					 		}
					 	} 
					  ?>
					</tbody>
				</table>
				<div class="col-md-7"><h5><i>(Ghi chú : Giá trị -1 : không có dữ liệu)</i></h5></div>
			</div> <!-- bang ket qua aqi gio tram quan trac -->


			<div class="col-md-12" style="margin-top: 50px">
			<div class="col-md-6 col-md-offset-4" style="margin-bottom: 10px"><h4><i>Bảng kết quả AQI ngày các trạm quan trắc <?php echo " - ".$date ?></i> </h4></div>
				<table class="table table-bordered">
					<thead>
						<tr style="background:#e6ffcc">
							<th>Tên Trạm</th>
							<th>ThờiGian</th>
							<th>AQI_SO2</th>
							<th>AQI_NO2</th>
							<th>AQI_TSP</th>
							<th>AQI_PM10</th>
							<th>AQI_PM2.5</th>
							<th>AQI_PB</th>
							<th>AQI_trạm</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$select_data= "SELECT * FROM $filename_ngay where thoigian='$date'";
						$result = pg_query($conn,"$select_data"); 
						if ($result == true){
							while($row = pg_fetch_array($result)){
							$mucanhhuong='';
							$chatluong='';
							$mau ='';
					 ?>
					 	<tr>
								<td><?php echo $row['tentram']?></td>	
								<td><?php echo $row['thoigian']?></td>
								<td><?php echo $row['aqi_ngay_so2']?></td>	
								<td><?php echo $row['aqi_ngay_no2']?></td>
								<td><?php echo $row['aqi_ngay_tsp']?></td>
								<td><?php echo $row['aqi_ngay_pm10']?></td>
								<td><?php echo $row['aqi_ngay_pm25']?></td>
								<td><?php echo $row['aqi_ngay_pb']?></td>
								<td><?php echo $row['aqi_ngay_tram']?></td>
								
							</tr>
					 <?php
					 		}
					 	} 
					  ?>
					</tbody>
				</table>
				<div class="col-md-7"><h5><i>(Ghi chú : Giá trị -1 : không có dữ liệu)</i></h5></div>
			</div> <!-- bang du lieu -->

			<div class="col-md-12" style="margin-top: 40px">
				<div class="col-md-7 col-md-offset-4" style="margin-bottom: 10px"><h4><i>Bảng Cảnh báo chất lượng không khí TPHCM <?php echo " - ".$date ?></i> </h4></div>
				<table class="table table-bordered">
					<thead>
						<tr style="background: #fff2e6">
							<th>Tên Trạm</th>
							<th>ThờiGian(ngày)</th>
							<th>AQI_Trạm</th>
							<th>Khoảng giá trị AQI</th>
							<th>Chất lượng không khí</th>
							<th>Mức ảnh hưởng</th>
							<th>Màu</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$select_data= "SELECT * from $filename_ngay where thoigian ='$date'";
						$result = pg_query($conn,"$select_data"); 
						if ($result == true){
							while($row = pg_fetch_array($result)){
							$mucanhhuong='';
							$chatluong='';
							$mau ='';
					 ?>
					 	<tr>
								<td><?php echo $row['tentram']?></td>	
								<td><?php echo $row['thoigian']?></td>	
								<td><?php echo $row['aqi_ngay_tram']?></td>
								<td><?php 
									if($row['aqi_ngay_tram']>=0 && $row['aqi_ngay_tram']<=50){
										echo"0-50";
										$mucanhhuong='Không ảnh hưởng đến sức khỏe';
										$chatluong='Tốt';
										$mau='Xanh';
									}elseif ($row['aqi_ngay_tram']>=51 && $row['aqi_ngay_tram']<=100) {
										echo"51-100";
										$mucanhhuong='Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài';
										$chatluong='Trung bình';
										$mau='Vàng';
									}elseif($row['aqi_ngay_tram']>=101 && $row['aqi_ngay_tram']<=200){
										echo"101-200";
										$mucanhhuong='Nhóm nhạy cảm cần hạn chế thời gian ở bên ngoài';
										$chatluong='Kém';
										$mau='Da cam';
									}elseif($row['aqi_ngay_tram']>=201 && $row['aqi_ngay_tram']<=300){
										echo"201-300";
										$mucanhhuong='Nhóm nhạy cảm tránh ra ngoài. Những người khác hạn chế ở bên ngoài';
										$chatluong='Xấu';
										$mau='Đỏ';
									}else{
										echo "Trên 300";
										$mucanhhuong='Mọi người nên ở trong nhà';
										$chatluong='Nguy hại';
										$mau='Nâu';
									}
									?>
								</td>
								<td><?php echo $chatluong ?></td>
								<td><?php echo "$mucanhhuong"; ?></td>
								<td> <?php echo $mau ?></td>
								
							</tr>
					 <?php
					 		}
					 	} 
					  ?>
					</tbody>
				</table>
			</div> <!-- bang canh bao -->

			<div class="col-md-12"><div id="container1" style="width: 800px; height: 450px; margin-left: 160px; margin-top: 40px"></div></div><!-- bieudo -->
			<script type="text/javascript">
				$(function () {    
					var defaultTitle = "Biểu đồ AQI các trạm quan trắc TP.HCM <?php echo " - "."$date"; ?>" ;

    // Create the chart
    var chart = new Highcharts.Chart({
    	chart: {
    		type: 'column',
    		renderTo: 'container1',
    		events: {
    			drillup: function(e) {
    				chart.setTitle({ text: defaultTitle });
    			}
    		}
    	},
    	title: {
    		text: defaultTitle
    	},
    	xAxis: {
    		type: 'category',
    	},
    	yAxis: {
    		lineWidth: 1,
    		tickWidth: 1,
    		title:{
    			text : 'Giá trị AQI',
    			margin: 35
    		}
    	},

    	legend: {
    		enabled: false
    	},

    	tooltip: {
    		headerFormat: '<div style="font-size:13px; margin-left:10px">{series.name}</div><br>',
    		pointFormat: '<div style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
    	},
    	plotOptions: {
    		series: {
    			borderWidth: 0,
    			dataLabels: {
    				enabled: true,
    			}
    		}
    	},

    	series: [{

    		data: [<?php
    		$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
    		$select_databieudo = "SELECT * FROM $filename_ngay WHERE thoigian='$date'" ; 
    		$result = pg_query($conn,"$select_databieudo");
    		if($result==true){
    			while($row = pg_fetch_array($result)){
    				$mau="";
                if($row['aqi_ngay_tram']>=0 && $row['aqi_ngay_tram']<=50){
                    $mau= '#66ccff';
                }elseif($row['aqi_ngay_tram']>=51 && $row['aqi_ngay_tram']<=100){
                    $mau = '#ffff00';
                }elseif($row['aqi_ngay_tram']>=101 && $row['aqi_ngay_tram']<=200){
                    $mau = '#ffa31a';
                }elseif($row['aqi_ngay_tram']>=201 && $row['aqi_ngay_tram']<=300){
                    $mau = '#ff4d4d';
                }else{
                    $mau = '#996600';
                }
    					echo "{
    						name:'$row[1]',
    						y:$row[13],
    						color: '$mau',
    						drilldown:'$row[1]'
    					},
    					";
    				}
    			}
    			?>]
    		}]

    	})
});
</script>
		
		
			<div class="col-md-6 col-md-offset-5">
			
				<input type="button" id="print_button"   class="btn btn-success" value="Xuất báo cáo" onclick="window.print()" style="margin-bottom: 70px; margin-top: 70px; " />
				<a href="http://localhost/khoaluan/aqi/baocao.php?username=<?php echo $tentaikhoan ?>&active=lapbaocao&&filename=<?php echo $filename_h ?>" class="btn btn-default" id="quaylai" style="margin-left:40px">Quay lại</a>
			</div>

		</div>
</body>

	</div>
		
</html>
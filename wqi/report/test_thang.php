<!DOCTYPE html>
<html>
<head>
	<title> Báo cáo</title>
	<!-- Latest compiled and minified CSS -->
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
		#print_button,#quaylai{
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
	$date = "";
	if(isset($_POST['ngay_option']) && isset($_POST['thang_option']) &&isset($_POST['nam_option']) ){
		$ngay = $_POST['ngay_option'];
		$thang = $_POST['thang_option'];
		$nam = $_POST['nam_option'];
		$tentram = $_POST['tentram_option'];

		if($ngay<=10){
			$ngay1 ="0".$_POST['ngay_option'];
		}else{
            $ngay1 =$ngay ;
        }
		if($thang<=10){
			$thang1 ="0".$_POST['thang_option'];
		}else{
            $ngay1 = $ngay;
        }
		$date=  $nam."/".$thang1."/".$ngay1;

		$thang_tb = $nam."/".$thang1;

	}
	$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
	$filename ="";
	if(isset($_GET['filename'])){
		$filename = $_GET['filename'];
		$filename_thang = $_GET['filename']."_thang";

	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="padding-left: 300px">
				<h3><b><?php if(isset($_POST["tieude"])){echo $_POST["tieude"];} ?></b></h3>
			</div> <!-- tieu de -->

			<div class="col-md-12">
				<b><h4>Người lập báo cáo :  <?php if(isset($_POST["ten"])){echo $_POST["ten"];} ?></b></h4>
				<b><h4>Thời gian lập báo cáo : <?php if(isset($_POST["thoigian"])){echo $_POST["thoigian"];} ?></b></h4>
			</div><!-- thong tin nguoi lap bao cao -->

			<div class="col-md-12" style="margin-top: 50px; width: 500px">
                <h4 style="margin-bottom:20px;">Thông tin trạm quan trắc</h4>
                       <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Tên Trạm</th>
                               <th>Tọa độ X</th>
                               <th>Tọa độ Y</th>
                           </tr>
                           </thead>


                            <?php
                                $select_data= "SELECT * from $filename_thang where thoigian = '$thang_tb'";
                                $result = pg_query($conn,"$select_data");
                                if($result == true){
                                    while($row = pg_fetch_array($result)){
                                ?>
                                 <tr>
                                    <td><?php echo $row['tentram'] ?></td>
                                    <td><?php echo $row['x'] ?></td>
                                    <td><?php echo $row['y'] ?></td>
                                  </tr>
                                <?php
                                    }
                                }
                            ?>


                       </table><!-- Thong tin tram -->
                </div>

			<div class="col-md-12" style="margin-top: 50px">
				<h4 style="margin-bottom:20px;">Kết quả WQI các trạm quan trắc TPHCM <?php echo $thang_tb ?></h4>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tên Trạm</th>
							<th>Thời gian</th>
							<th>WQI Trạm</th>
							<th>WQI Tiêu Chuẩn</th>
							<th>Mức đánh giá chất lượng nước</th>
							<th>Màu quy định</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$select_data= "SELECT * from $filename_thang where thoigian = '$thang_tb'";
						$result = pg_query($conn,"$select_data");
						if ($result == true){
							$mucdo="";
							$mau="";

							while($row = pg_fetch_array($result)){
								$wqi = $row['wqi_tram'];
								if($wqi >=0 && $wqi <= 25){
									$mucdo = "Nước ô nhiễm nặng, cần các biện pháp xử lý trong tương lai";
									$mau = "Đỏ";
								}elseif ($wqi >=26 && $wqi <= 50) {

									$mucdo = "Sử dụng cho giao thông thủy và các mục đích tương đương khác";
									$mau = "Da cam";
								}elseif ($wqi >=51 && $wqi <= 75) {
									$mucdo = "Sử dụng cho mục đích tưới tiêu và các mục đích tương đương khác";
									$mau = "Vàng";
								}elseif ($wqi >=76 && $wqi <= 90) {
									$mucdo = "Sử dụng cho mục đích cấp nước sinh hoạt nhưng cần các biện pháp xử lý phù hợp";
									$mau = "Xanh lá cây";
								}else{
									$mucdo = "Sử dụng tốt cho mục đích cấp nước sinh hoạt";
									$mau = "Xanh nước biển";
								}

								?>


								<tr><td><?php echo $row['tentram'];?></td>
									<td><?php echo $row['thoigian'];?></td>
									<td><?php echo round($wqi, 2, PHP_ROUND_HALF_UP);?></td>
									<td><?php if ($wqi >=0 && $wqi <=25) {
										echo "0-25";
									}elseif ($wqi >=26 && $wqi <=50) {
										echo "26-50";
									}elseif ($wqi >=51 && $wqi <=75) {
										echo "51-75";
									}elseif ($wqi >=76 && $wqi <=90) {
										echo "76-90";
									}else{
										echo "91-100";
									}
									?></td>

									<td><?php echo $mucdo ?></td>
									<td><?php echo $mau ?></td>

									<?php
								}
							}
							?>
						</tr>
					</tbody>
				</table>
			</div> <!-- bang ket qua -->

			<div id="container" style="width: 800px; height: 450px;margin-top: 50px ;margin-left: 120px" class="col-md-12"></div>

			<div class="col-md-6 col-md-offset-4">
                <input type="button" id="print_button"   class="btn btn-success" value="Xuất báo cáo" onclick="window.print()" style="margin-bottom: 70px; margin-top: 70px; " />
                <a href="http://khoa-luan.local/wqi/lapbaocao-main.php?username=<?php echo $tentaikhoan ?>&active=lapbaocao&filename=<?php echo $filename ?>" class="btn btn-default" id="quaylai" style="margin-left:40px">Quay lại</a>
            </div>

		</div>
	</div>


</body>
</html>
<script type="text/javascript">
    $(function () {
    var defaultTitle = "Biểu đồ WQI các trạm quan trắc TP.HCM tháng <?php echo "$thang_tb"; ?> ";
    var drilldownTitle = "Biểu đồ WQI thông số trạm ";
    var drilldownTitle_thoigian ="<?php echo " $thang_tb"; ?>";

    // Create the chart
    var chart = new Highcharts.Chart({
        chart: {
            type: 'column',
            renderTo: 'container',
            events: {
                drilldown: function(e) {
                    chart.setTitle({ text: drilldownTitle + e.point.name + drilldownTitle_thoigian });
                },
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
                text : 'Giá trị WQI',
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
        name: 'Trạm',
        colorByPoint: true,
        data: [<?php
        $select_data= "SELECT * from $filename_thang where thoigian = '$thang_tb'";
        $result = pg_query($conn,"$select_data");
        if ($result == true){
            while($row = pg_fetch_row($result)){
                $mau="";
                if ($row[24]>=0 && $row[24]<=25) {
                    $mau = '#ff3333';
                }else if($row[24]>26 &&$row[24]<=50){
                    $mau = '#ff751a';
                }else if($row[24]>51 &&$row[24]<=75){
                    $mau = '#ffff33';
                }else if($row[24]>=76 &&$row[24]<=90) {
                    $mau = '#5cd65c';
                }else{
                    $mau = '#4db8ff';
                }
                echo "{
                    name:'$row[1]',
                    y:$row[24],
                    color: '$mau',
                    drilldown:'$row[1]'
                },
                    ";
            }
        }
        ?>]
    }],
         drilldown: {
           title: {
        text: 'Biểu đồ WQI thông sôtp.HCM',
        },
        series: [
        <?php
         $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
        $select_data= "SELECT * from $filename_thang where thoigian = '$thang_tb'";
        $result = pg_query($conn,"$select_data");
       if ($result == true){
            while ($row = pg_fetch_row($result)) {
            echo "
            {
                id: '$row[1]',
                name: '$row[1]',
                data:[
                 ['WQI_BOD',$row[15]],
                 ['WQI_COD',$row[16]],
                 ['WQI_N',$row[17]],
                 ['WQI_P',$row[18]],
                 ['WQI_TSS',$row[19]],
                 ['WQI_DO',$row[24]],
                 ['WQI_pH',$row[21]],
                 ['WQI_Coliform',$row[22]],
                 ['WQI_Doduc',$row[23]]
                 ]

            },";
        }
    }else{
            echo "khong thanh cong";
        }
     ?>
        ]
    }
    })
});



    </script>
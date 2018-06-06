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
	<script src="https://code.highcharts.com/modules/data.js"></script>
	
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
	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
	$date = "";
	if(isset($_POST['ngay_option']) && isset($_POST['thang_option']) &&isset($_POST['nam_option']) ){
		$ngay = $_POST['ngay_option'];
		$thang = $_POST['thang_option'];
		$nam = $_POST['nam_option'];
		$tentram = $_POST['tentram_option'];

		if($ngay<=10){
			$ngay1 ="0".$_POST['ngay_option'];
		}
		if($thang<=10){
			$thang1 ="0".$_POST['thang_option'];
		}
		$date=  $nam."/".$thang1."/".$ngay1;
		echo "$date";
	}
	$filename ="";
	if(isset($_GET['filename'])){
		$filename = $_GET['filename'];
		echo $filename;
	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="padding-left: 300px">
				<h3><b><?php if(isset($_POST["tieude"])){echo $_POST["tieude"];} ?></b></h3>
			</div> <!-- tieu de -->
			
			<div class="col-md-12">
				<b><h4 style="margin-top:30px;margin-bottom:30px;">Người lập báo cáo :  <?php if(isset($_POST["ten"])){echo $_POST["ten"];} ?></b></h4>
				<b><h4>Thời gian lập báo cáo : <?php if(isset($_POST["thoigian"])){echo $_POST["thoigian"];} ?></b></h4>
			</div><!-- thong tin nguoi lap bao cao -->

			<div class="col-md-12" style="margin-top:30px; width: 500px;margin-bottom:50px;">
                <h4 style="margin-bottom:20px;">Thông tin trạm quan trắc</h4>
                       <table class="table table-bordered">
                           <tr>
                               <th>Tên Trạm</th>
                               <th>Tọa độ X</th>
                               <th>Tọa độ Y</th>
                           </tr>
                           <tr>
                            <?php
                                $select_data= "SELECT * from $filename where thoigian = '$date' and tentram ='$tentram' ";
                                $result = pg_query($conn,"$select_data");
                                if($result == true){
                                    while($row = pg_fetch_array($result)){
                                ?>
                                    <td><?php echo $row['tentram'] ?></td>
                                    <td><?php echo $row['x'] ?></td>
                                    <td><?php echo $row['y'] ?></td>
                                <?php     
                                    }
                                }
                            ?>
                               
                           </tr>
                       </table><!-- Thong tin tram --> 
                </div>
			
			<div class="col-md-12" style="margin-top: 20px;margin-bottom:50px">
                <h4 style="margin-bottom:20px;"">Bảng kêt quả tính toán chỉ số WQI <?php echo "$date";?></b>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                                <th>Tên Trạm</th>
                                <th>Thời gian</th>
                                <th>WQI_BOD</th>
                                <th>WQI_COD</th>
                                <th>WQI_N</th>
                               <th>WQI_P</th>
                               <th>WQI_TSS</th>
                               <th>WQI_DO</th>
                               <th>WQI_pH</th>
                               <th>WQI_Coliform</th>
                               <th>WQI_Độ Đục</th>                                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $select_data= "SELECT * from $filename where thoigian = '$date' and tentram ='$tentram'";
                        $result = pg_query($conn,"$select_data");
                        if ($result == true){
                            $mucdo="";
                            $mau="";

                            while($row = pg_fetch_array($result)){
                                                     
                                ?>
                                <tr><td><?php echo $row['tentram'];?></td>
                                    <td><?php echo $row['thoigian'];?></td>
                                    <td><?php echo $row['wqi_bod'];?></td>
                                    <td><?php echo $row['wqi_cod'];?></td>
                                    <td><?php echo $row['wqi_n'];?></td>
                                    <td><?php echo $row['wqi_p'];?></td>
                                    <td><?php echo $row['wqi_tss'];?></td> 
                                    <td><?php echo $row['wqi_do'];?></td>
                                    <td><?php echo $row['wqi_ph'];?></td>
                                    <td><?php echo $row['wqi_coliform'];?></td>
                                    <td><?php echo $row['wqi_doduc'];?></td>
                                    <?php  
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- bang ket qua wqi thong so -->

			<div id="container" style="width: 750px; height: 500px; margin-left: 120px" class="col-md-12">	
			</div> <!-- bieu do wqi thong so -->

			<div class="col-md-12" style="margin-top: 15px">
				<h4 style="margin-bottom:20px;">Bảng kết quả tính toán chỉ số WQI <?php echo $date ?>
				</h4>
				<table class="table table-bordered">
					<thead>
						<tr>
								<th>Tên Trạm</th>
								<th>Thời gian</th>
								<th>WQI Trạm</th>
								<th>WQI Tiêu Chuẩn</th>
								<th>Mức đánh giá chất lượng nước</th>
								<th>Màu Quy Định</th>				
						</tr>
					</thead>
					<tbody>
						<?php  
						$select_data= "SELECT * from $filename where thoigian = '$date' and tentram ='$tentram' ";
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
			
			<div class="col-md-6 col-md-offset-4">
                <input type="button" id="print_button"   class="btn btn-success" value="Xuất báo cáo" onclick="window.print()" style="margin-bottom: 70px; margin-top: 70px; " />
                <a href="http://localhost/khoaluan/wqi/lapbaocao-main.php?username=<?php echo $tentaikhoan ?>&active=lapbaocao&filename=<?php echo $filename ?>" class="btn btn-default" id="quaylai" style="margin-left:40px">Quay lại</a>
            </div>

		</div>
	</div>
	
	
</body>
</html>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },

    xAxis: {
        categories: ['WQI_BOD', 'WQI_COD', 'WQI_N', 'WQI_P', 'WQI_TSS','WQI_DO','WQI_pH','WQI_Coliform','WQI_ĐộĐục']
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

	title: {
            text: 'Biểu đồ WQI thông số trạm <?php echo $tentram.' '.$date ;?>'
        },
    plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },

 <?php
        $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
        $select_data= "SELECT * from $filename where thoigian = '$date' and tentram ='$tentram'";
        $result = pg_query($conn,"$select_data");
        $color ='';
        if ($result == true){
            while($row = pg_fetch_row($result)){ 
            	if($row[24] >=0 && $row[24] <=25 ){
            		$color = '#ff3333';
            	}else if($row[24] >=26 && $row[24] <=50 ){
            		$color = '#ff751a';
            	}else if($row[24] >=51 && $row[24] <=75 ){
            		$color = '#ffff33';
            	}else if($row[24] >=76 && $row[24] <=91 ){
            		$color = '#5cd65c';
            	}else{
            		$color = '#4db8ff';
            	}
         ?>
    series: [{
       
        data: [
        {
            name: 'WQI_BOD',
            color: '<?php echo $color ?>',
            y: <?php echo $row[15] ?>
        }, {
            name: 'WQI_COD',
            color: '<?php echo $color ?>',
            y: <?php echo $row[16] ?>
        }, {
            name: 'WQI_N',
            color: '<?php echo $color ?>',
            y: <?php echo $row[17] ?>
        }, {
            name: 'WQI_P',
            color: '<?php echo $color ?>',
            y: <?php echo $row[18] ?>
        }, {
            name: 'WQI_TSS',
            color: '<?php echo $color ?>',
            y: <?php echo $row[19] ?>
        },{
            name: 'WQI_DO',
            color: '<?php echo $color ?>',
            y: <?php echo $row[20] ?>
        },{
            name: 'WQI_pH',
            color: '<?php echo $color ?>',
            y: <?php echo $row[21] ?>
        },{
            name: 'WQI_Coliform',
            color: '<?php echo $color ?>',
            y: <?php echo $row[22] ?>
        },{
            name: 'WQI_DoDuc',
            color: '<?php echo $color ?>',
            y: <?php echo $row[23] ?>
        },
        ]
        <?php
            }
        } 
         ?>
    }]
});
</script>
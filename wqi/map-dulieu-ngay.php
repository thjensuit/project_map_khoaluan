<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
        if(isset($_GET['filename'])){
        $thoigian = $_GET['thoigian'];
        $filename = $_GET['filename'];
        $tentram = $_GET['tentram'];
        $tentram1  = str_replace("-"," ",$tentram);
        $thoigian = $_GET['thoigian'];
        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    }
     ?>

     <div class="container" style="margin-top: 70px">
     	<div class="row">
     		<div class="col-md-12">
     			<div id='container'></div>
     		</div>
     		<script type="text/javascript">
     			Highcharts.chart('container', {

     				chart: {
     					type: 'column'
     				},
     				title: {
     					text: 'Biểu đồ WQI Thông Số Trạm <?php echo $tentram1." ".$thoigian ?>'
     				},

     				xAxis: {
     					type: 'category',
        // crosshair: true --> hover qua cot
    				},

    				yAxis: {
    					min: 0,
    					title: {
    						text: 'Chỉ số WQI'
    					}
    				},

    				legend: {
    					enabled: false
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
    					colorByPoint: true,
    					 data: [
    					 <?php
    					 $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
        					$select = "SELECT *  from $filename where thoigian='$thoigian' and tentram ='$tentram1'";
        					$result = pg_query($conn,"$select");

        					if ($result == true){
            					while($row = pg_fetch_array($result)){
            						$mau = '#ff6699';
            						echo "{
            							name:'WQI_BOD',
            							y:$row[15],
            							color :'$mau'
            						},
            						{
            							name:'WQI_COD',
            							y:$row[16],
            							color :'$mau'
            						},{
            							name:'WQI_N',
            							y:$row[17],
            							color :'$mau'
            						},{
            							name:'WQI_P',
            							y:$row[18],
            							color :'$mau'
            						},{
            							name:'WQI_TSS',
            							y:$row[19],
            							color :'$mau'
            						},{
            							name:'WQI_DO',
            							y:$row[20],
            							color :'$mau'
            						},
            						{
            							name:'WQI_pH',
            							y:$row[21],
            							color:'$mau'
            						},
            						{
            							name:'WQI_Coliform',
            							y:$row[22],
            							color:'$mau'
            						},{
            							name:'WQI_Độ đục',
            							y:$row[23],
            							color:'$mau'
            						},
            						";
            					}
            				}
        				?>
    					 ]
    				}]

				});
     		</script>
     	</div>
     </div>
</body>
</html>
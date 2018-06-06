<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


<div class="row">
    <div class="col-md-8">
        <div id="container" style="margin: 0 auto;">ok</div>
    </div>
    <div class="col-md-4">

    </div>
</div>


<script type="text/javascript">
	$(function () {
		var defaultTitle = "Biểu đồ AQI giờ trạm <?php echo $tentram ?> ";
		var drilldownTitle = "Biểu đồ AQI thông số trạm <?php echo $tentram.' ' ?>";

    // Create the chart
    var chart = new Highcharts.Chart({
    	chart: {

    		renderTo: 'container',
    		events: {
    			drilldown: function(e) {
    				chart.setTitle({ text: drilldownTitle + e.point.name });
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
    		color : 'red',
    		data: [<?php
    		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    		$select_databieudo = "SELECT * FROM $filename_h where to_char(\"thoigian\", 'YYYY/MM/DD')='$date' and tentram = '$tentram'" ;
    		$result = pg_query($conn,"$select_databieudo");
    		if($result==true){
    			while($row = pg_fetch_array($result)){
    				$mau="";
    				if($row['aqi_h_tram']>=0 && $row['aqi_h_tram']<=50){
    					$mau= '#7cb5ec';
    				}elseif ($row['aqi_h_tram']>=51 && $row['aqi_h_tram']<=100) {
    					$mau= '#ffff00';
    				}elseif($row['aqi_h_tram']>=101 && $row['aqi_h_tram']<=200){
    					$mau = '#ffa31a';}else{$mau = '#996600';}
    					echo "{
    						name:'$row[4]',
    						y:$row[21],
    						type: 'line',
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
    				text: 'Biểu đồ AQI thông sôtp.HCM',
    			},
    			series: [
    			<?php
    			$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    			$select_data= "SELECT * FROM $filename_h where to_char(\"thoigian\", 'YYYY/MM/DD')='$date' and tentram = '$tentram'";
    			$result = pg_query($conn,"$select_data");
    			if ($result == true){
    				while ($row = pg_fetch_row($result)) {
    					if($row[13]<0 ){
    						$row[13] = 0;
    					}
    					if($row[14]<0 ){
    						$row[14] = 0;
    					}
    					if($row[15]<0 ){
    						$row[15] = 0;
    					}
    					if($row[16]<0 ){
    						$row[16] = 0;
    					}if($row[17]<0 ){
    						$row[17] = 0;
    					}
    					if($row[18]<0 ){
    						$row[18] = 0;
    					}
    					if($row[19]<0 ){
    						$row[19] = 0;
    					}
    					if($row[19]<0 ){
    						$row[19] = 0;
    					}
    					if($row[20]<0 ){
    						$row[20] = 0;
    					}


    					echo "
    					{
    						type: 'column',
    						id: '$row[1]',
    						name: '$row[1]',
    						data:[
    						['AQI_SO2',$row[13]],
    						['AQI_CO',$row[14]],
    						['AQI_NO2',$row[15]],
    						['AQI_O3',$row[16]],
    						['AQI_TSP',$row[17]],
    						['AQI_PM10',$row[18]],
    						['AQI_PM2.5',$row[19]],
    						['AQI_pb',$row[20]]
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



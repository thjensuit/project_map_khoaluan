<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


<div class="card" style="padding: 10px 10px">
	<?php
	if(isset($_GET['filename'])){
		$filename_h = $_GET['filename'];
		$filename_ngay = $_GET['filename'].'_ngay';
		?>
		<form method="POST">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="sel1"><b>Thời gian</b></label>
						<select class="form-control" id="sel1" name="thoigian_option">
								<option selected value="chonthoigian">- Chọn thời gian-</option>
							<?php
							$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
							$select_thoigian = "SELECT distinct to_char(\"thoigian\", 'DD/MM/YYYY') FROM $filename_ngay order by to_char(\"thoigian\", 'DD/MM/YYYY') asc";
							$result_thoigian = pg_query($conn,"$select_thoigian");
							if($result_thoigian==true){
								while($row_thoigian = pg_fetch_array($result_thoigian)){
									?>
									<option value="<?php echo "$row_thoigian[0]"?>"><?php echo $row_thoigian[0]; ?></option>
									<?php }} ?>
							</select>
					</div>
				</div>

						<div class="col-md-2">
					<div class="form-group">
						<label for="sel1"><b>Thời gian</b></label>
						<select class="form-control" id="sel1" name="tram">
								<option selected value="chontram">- Trạm-</option>
							<?php
							$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
							$select_thoigian = "SELECT distinct tentram FROM $filename_ngay order by tentram asc";
							$result_thoigian = pg_query($conn,"$select_thoigian");
							if($result_thoigian==true){
								while($row_thoigian = pg_fetch_array($result_thoigian)){
									?>
									<option value="<?php echo "$row_thoigian[0]"?>"><?php echo $row_thoigian[0]; ?></option>
									<?php }} ?>
							</select>
					</div>
				</div>

								<div class="col-md-2" style="padding-top: 30px; padding-left: 30px">
									<button type="submit" class="btn btn-primary btn-md" name="vebieudo">Vẽ biểu đồ</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<input type="text" class="form-control" id="tiem kiem" placeholder="dd/mm/yyyy..." name="txtthoigian">
									</div>
								</div>
							</div>
						</form>
						<?php
						if(isset($_POST['vebieudo'])){
							if(isset($_POST['thoigian_option']) && isset($_POST['tram'])){
								if($_POST['thoigian_option']!= 'chonthoigian'&& $_POST['tram']=='chontram' ){
								$thoigian = $_POST['thoigian_option'];
								echo "$thoigian";
								?>

								<div class="row">
									<div class="col-md-10">
										<div id="container" style="margin: 0 auto"></div>
									</div>
								</div>
								<script type="text/javascript">
									$(function () {
										var defaultTitle = "Biểu đồ AQI các trạm quan trắc TP.HCM ngày" + <?php echo "\" $thoigian\""; ?> ;
										var drilldownTitle = "Biểu đồ AQI thông số trạm ";

    // Create the chart
    var chart = new Highcharts.Chart({
    	chart: {
    		type: 'column',
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

    		data: [<?php
    		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    		$select_databieudo = "SELECT * FROM $filename_ngay WHERE to_char(\"thoigian\", 'DD/MM/YYYY')='$thoigian'" ;
    		$result = pg_query($conn,"$select_databieudo");
    		if($result==true){
    			while($row = pg_fetch_array($result)){
    				$mau="";
    				if($row['aqi_ngay_tram']>=0 && $row['aqi_ngay_tram']<=50){
    					$mau= '#7cb5ec';
    				}elseif ($row['aqi_ngay_tram']>=51 && $row['aqi_ngay_tram']<=100) {
    					$mau= '#ffff00';
    				}elseif($row['aqi_ngay_tram']>=101 && $row['aqi_ngay_tram']<=200){
    					$mau = '#ffa31a';}else{$mau = '#996600';}
    					echo "{
    						name:'$row[1]',
    						y:$row[11],
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
    			$select_data= "SELECT * from $filename_ngay";
    			$result = pg_query($conn,"$select_data");
    			if ($result == true){
    				while ($row = pg_fetch_row($result)) {
    					echo "
    					{
    						id: '$row[1]',
    						name: '$row[1]',
    						data:[
    						['AQI_SO2',$row[3]],
    						['AQI_NO2',$row[5]],
    						['AQI_TSP',$row[7]]
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

<?php
			}//-> TH1: nguoi dung chon chi chon thoi gian
			if($_POST['thoigian_option'] !='chonthoigian' && $_POST['tram'] !='chontram' ){
				$thoigian = $_POST['thoigian_option'];
				$tram = $_POST['tram'];
?>
			<div class="row">
				<div class="col-md-10">
					<div id="container" style="margin: 0 auto">ok</div>
				</div>
			</div>
		<script type="text/javascript">
			$(function () {
	var defaultTitle = "Biểu đồ AQI giờ trạm " +  <?php echo "\" $tram\""; ?> +" ngày " + <?php echo "\"$thoigian\""; ?> ;
	var drilldownTitle = "Biểu đồ AQI thông số trạm <?php echo $tram; ?>";

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
            color : 'red',
    		data: [<?php
    		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    		$select_databieudo = "SELECT * FROM $filename_h WHERE to_char(\"thoigian\", 'DD/MM/YYYY')='$thoigian' and tentram='$tram' " ;
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
    			$select_data= "SELECT * from $filename_h";
    			$result = pg_query($conn,"$select_data");
    			if ($result == true){
    				while ($row = pg_fetch_row($result)) {
    					echo "
    					{
                            type: 'column',
    						id: '$row[1]',
    						name: '$row[1]',
    						data:[
    						['AQI_SO2',$row[13]],
    						['AQI_NO2',$row[15]],
    						['AQI_TSP',$row[17]]
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
<?php
			}// TH2 nguoi dung chon thoi gian va ten tram

		}

	}
}
?>
</div>

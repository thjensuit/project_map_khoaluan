<!DOCTYPE html>
<html>
<head>
	<title>
		thongso lon nha
	</title>
</head>
<body>
	<table>
		<tr>
			<td>aqi_h_so2</td>
			<td>aqi_h_co</td>
			<td>aqi_h_no2</td>
			<td>aqi_h_o3</td>
			<td>aqi_h_tsp</td>
			<td>aqi_h_tram</td>
		</tr>
		<tr>
			<?php
		$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison"); 
		$select_thogso = "SELECT * from aqi_hcm_thang3_2014";
		$result_select_thogso = pg_query($conn,"$select_thogso");
		if($result_select_thogso==true){
			$leng =-1;
			while($row = pg_fetch_array($result_select_thogso)){
			 	
				$max[] ='';
				$tenthongso_max='';
				$tenthongso_max_so2='';
				$tenthongso_max_o3='';
				$tenthongso_max_no2='';
				$tenthongso_max_tsp='';
				$tenthongso_max_co='';
				if($row['aqi_h_so2']==$row['aqi_h_tram']){
					$tenthongso_max_so2 ='SO2';
					$leng ++;
				}
				if($row['aqi_h_co']==$row['aqi_h_tram']){
					$tenthongso_max_co ='CO';
					$leng ++;
				}
				if($row['aqi_h_no2']==$row['aqi_h_tram']){
					$tenthongso_max_no2 ='NO2';
				}
				if($row['aqi_h_o3']==$row['aqi_h_tram']){
					$tenthongso_max_o3 ='O3';
				}
				if($row['aqi_h_tsp']==$row['aqi_h_tram']){
					$tenthongso_max_tsp ='TSP';
				}

			$tenthongso =$tenthongso_max_so2.'sad'.$tenthongso_max_o3.$tenthongso_max_no2.' '.$tenthongso_max_tsp.$tenthongso_max_co ;
				?>
		<td><?php echo $row['aqi_h_so2']?></td>
		<td><?php echo $row['aqi_h_co']?></td>
		<td><?php echo $row['aqi_h_no2']?></td>
		<td><?php echo $row['aqi_h_o3']?></td>
		<td><?php echo $row['aqi_h_tsp']?></td>
		<td><?php echo $row['aqi_h_tram']?></td>
		<td><?php echo $tenthongso ?></td>
		</tr>
			<?php
			}

		}
	 ?>
	</table>
<?php 
		
		echo "$leng";
 ?>
	
</body>
</html>
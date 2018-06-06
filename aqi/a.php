<?php
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
$selectdata_ngay = "SELECT tentram,thoigian from hcm_aqi_thang5_2017_ngay";
$result_selectdata_ngay = pg_query($conn,"$selectdata_ngay");
if($result_selectdata_ngay== true){
	$sodong_ngay=0;
	while($row_ngay = pg_fetch_array($result_selectdata_ngay)){

		$sodong_ngay ++;
		$select_tbl_aqi_h = " SELECT * FROM hcm_aqi_thang5_2017 where tentram = '$row_ngay[0]' and date(thoigian) = '$row_ngay[1]' ";
		$result_select_tbl_aqi_h= pg_query($conn,"$select_tbl_aqi_h");

		if($result_select_tbl_aqi_h==true){
			$so2_tb = 0 ;
			$row_so2_empty = 0;
			$sodong_so2 = 0;

			$no2_tb = 0;
			$row_no2_empty = 0;
			$sodong_no2 = 0;

			$tsp_tb = 0 ;
			$row_tsp_empty = 0;
			$sodong_tsp = 0;

			$pm10_tb = 0;
			$row_pm10_empty = 0;
			$sodong_pm10 = 0;

			$pm25_tb = 0 ;
			$row_pm25_empty = 0;
			$sodong_pm25 = 0;

			$pb_tb = 0;
			$row_pb_empty = 0;
			$sodong_pb = 0;

			$sodong = 0;

			// reset mang
			unset($arr_aqi_h_so2);
			unset($arr_aqi_h_no2);
			unset($arr_aqi_h_tsp);
			unset($arr_aqi_h_pm10);
			unset($arr_aqi_h_pm25);
			unset($arr_aqi_h_pb);

			while($row_gio = pg_fetch_array($result_select_tbl_aqi_h)){
				echo $row_gio['tentram']."-".$row_gio['thoigian']." ".$row_gio['aqi_h_so2']."<br>";
				$arr_aqi_h_so2[] = $row_gio['aqi_h_so2'];
				$arr_aqi_h_no2[] = $row_gio['aqi_h_no2'];
				$arr_aqi_h_co[] = $row_gio['aqi_h_co'];
				$arr_aqi_h_o3[] = $row_gio['aqi_h_o3'];
				$arr_aqi_h_tsp[] = $row_gio['aqi_h_tsp'];
				$arr_aqi_h_pm10[] = $row_gio['aqi_h_pm10'];
				$arr_aqi_h_pm25[] = $row_gio['aqi_h_pm25'];
				$arr_aqi_h_pb[] = $row_gio['aqi_h_pb'];

				$sodong++;

				if($row_gio['so2']!=-1){
					$so2_tb += $row_gio['so2'];
					$sodong_so2 ++ ;
				}else{
					$row_so2_empty ++ ;}

					if($row_gio['no2'] !=-1){
						$no2_tb += $row_gio['no2'];
						$sodong_no2 ++ ;
					}else{$row_no2_empty ++ ;}

					if($row_gio['tsp']!=-1){
						$tsp_tb += $row_gio['tsp'];
						$sodong_tsp ++ ;
					}else{$row_tsp_empty ++ ;}

					if($row_gio['pm10']!=-1){
						$pm10_tb += $row_gio['pm10'];
						$sodong_pm10 ++ ;
					}else{$row_pm10_empty ++ ;}

					if($row_gio['pm25']!=-1){
						$pm25_tb += $row_gio['pm25'];
						$sodong_pm25 ++ ;
					}else{$row_pm25_empty ++ ;}

					if($row_gio['pb']!=-1){
						$pb_tb += $row_gio['pb'];
						$sodong_pb ++ ;
					}else{$row_pb_empty ++ ;}
				} // end while tinh tong

				$aqi_so2_24h = 0;
				$aqi_no2_24h = 0;
				$aqi_tsp_24h = 0;
				$aqi_pm10_24h = 0;
				$aqi_pm25_24h = 0;
				$aqi_pb_24h = 0;

				if($row_so2_empty!=$sodong){
					$aqi_so2_24h = round(($so2_tb/$sodong_so2)*100/125 , 0, PHP_ROUND_HALF_UP);
				}else{$aqi_so2_tb_ngay = -1 ;}


				//->aqi_ngay_no2
				if($row_no2_empty!=$sodong){
					$aqi_no2_24h = round(($no2_tb/$sodong_no2), 0, PHP_ROUND_HALF_UP);
				}else{$aqi_no2_24h = -1 ;}


				//->aqi_ngay_tsp
				if($row_tsp_empty!=$sodong){
					$aqi_tsp_24h = round(($tsp_tb/$sodong_tsp)/2 , 0, PHP_ROUND_HALF_UP);
				}else{$aqi_tsp_24h = -1 ;}


				//->aqi_ngay_pm10
				if($row_pm10_empty!=$sodong){
					$aqi_pm10_24h = round(($pm10_tb/$sodong_pm10)*10/15 , 0, PHP_ROUND_HALF_UP);
				}else{$aqi_pm10_24h = -1 ;}


				//->aqi_ngay_pm25
				if($row_pm25_empty!=$sodong){
					$aqi_pm25_24h = round(($pm25_tb/$sodong_pm25)*2 , 0, PHP_ROUND_HALF_UP);
				}else{$aqi_pm25_24h = -1 ;}

				//->aqi_ngay_pb
				if($row_pb_empty!=$sodong){
					$aqi_pb_24h = round(($pb_tb/$sodong_pb)*100/1.5 , 0, PHP_ROUND_HALF_UP);
				}else{$aqi_pb_24h = -1 ;}

			}	
			
			$arr_aqi_so2_ngay[] = max(max($arr_aqi_h_so2),$aqi_so2_24h);
			$arr_aqi_no2_ngay[] = max(max($arr_aqi_h_no2),$aqi_no2_24h);
			$arr_aqi_co_ngay[] = max($arr_aqi_h_co);
			$arr_aqi_o3_ngay[] = max($arr_aqi_h_o3);
			$arr_aqi_tsp_ngay[] = max(max($arr_aqi_h_tsp),$aqi_tsp_24h);
			$arr_aqi_pm10_ngay[] = max(max($arr_aqi_h_pm10),$aqi_pm10_24h);
			$arr_aqi_pm25_ngay[] = max(max($arr_aqi_h_pm25),$aqi_pm25_24h);
			$arr_aqi_pb_ngay[] = max(max($arr_aqi_h_pb),$aqi_pb_24h);

			$arr_aqi_tram_ngay[] =max(max(max($arr_aqi_h_so2),$aqi_so2_24h),max(max($arr_aqi_h_no2),$aqi_no2_24h),max($arr_aqi_h_co),max($arr_aqi_h_o3),max(max($arr_aqi_h_tsp),$aqi_tsp_24h),max(max($arr_aqi_h_pm10),$aqi_pm10_24h),max(max($arr_aqi_h_pm25),$aqi_pm25_24h),max(max($arr_aqi_h_pb),$aqi_pb_24h));

		} // end while 2

		$tenthongso_max[] = '';
		for($x = 0; $x < $sodong_ngay; $x++){
			$tenthongso="";
			if($arr_aqi_tram_ngay[$x] == $arr_aqi_so2_ngay[$x]){
				$tenthongso= "SO2";
				echo "SO2 <br>"; 
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_no2_ngay[$x]){
				$tenthongso= "NO2";
				echo " NO2 <br>";
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_co_ngay[$x]){
				$tenthongso= "CO";
				echo " CO <br>";
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_o3_ngay[$x]){
				$tenthongso= "O3";
				echo " O3 <br>";
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_tsp_ngay[$x]){
				$tenthongso= "TSP";
				echo " TSP <br>";
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_pm10_ngay[$x]){
				$tenthongso= "PM10";
				echo " PM10 <br>";
				$tenthongso_max[] = $tenthongso;
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_pm25_ngay[$x]){
				$tenthongso= "PM25";
				echo " PM25 <br>";
				$tenthongso_max[] = $tenthongso; 
			}

			if($arr_aqi_tram_ngay[$x] == $arr_aqi_pb_ngay[$x]){
				$tenthongso= "Pb";
				echo " Pb <br>";
				$tenthongso_max[] = $tenthongso;
			}
		}// end for

		for($x = 0 ; $x<=$sodong_ngay ;$x++){
			echo $tenthongso_max[$x]."<br>";
		}

	}
?>
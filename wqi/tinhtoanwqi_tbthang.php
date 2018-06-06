<?php
 	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
 	$kiemtratenfile = "SELECT * FROM dulieufilewqi";
 	$result_kiemtratenfile = pg_query($conn, "$kiemtratenfile");
 	if($result_kiemtratenfile==true){
 	$count_rows_tenfile = pg_num_rows($result_kiemtratenfile);
 	if($count_rows_tenfile!=0){
 	$selectwqithang = "SELECT distinct tentram ,x,y, to_char(\"thoigian\",'yyyy/mm')as thoigian FROM $name[0] order by tentram asc";
 	$result = pg_query($conn,"$selectwqithang");
 	$arrlength = pg_num_rows($result);
 		//echo $arrlength;
 	if($result==true){
 		while($row = pg_fetch_array($result)){
 			$selectwqitbthang = "SELECT tentram,x, to_char(\"thoigian\",'yyyy/mm'), nhietdo, bod, cod,n, p, tss, d0, ph, coliform, doduc FROM $name[0] where tentram = '$row[0]' and  to_char(\"thoigian\",'yyyy/mm') = '$row[3]' order by tentram asc";
 			$tentram_thang[] = $row['tentram'];
 			$thoigian_thang[] = $row['thoigian'];
 			$toadox[] = $row['x'];
 			$toadoy[] = $row['y'];  
 			
 			$resulttb = pg_query($conn,"$selectwqitbthang");
 			if($resulttb == true){
 				$num = 0;
 				$nhietdo_tong = 0 ;
 				$bod_tong = 0 ;
 				$cod_tong = 0 ;
 				$n_tong = 0 ;
 				$p_tong = 0 ;
 				$tss_tong = 0 ;
 				$d0_tong = 0 ;
 				$ph_tong = 0 ;
 				$coliform_tong = 0 ;
 				$doduc_tong = 0 ;
 				while($rowtb=pg_fetch_array($resulttb)){
 					$num ++;
 					$nhietdo_tong += $rowtb['nhietdo'] ;
 					$bod_tong += $rowtb['bod'] ;
 					$cod_tong += $rowtb['cod'] ;
 					$n_tong += $rowtb['n'] ;
 					$p_tong += $rowtb['p'] ;
 					$tss_tong += $rowtb['tss'] ;
 					$d0_tong += $rowtb['d0'] ;
 					$ph_tong += $rowtb['ph'] ;
 					$coliform_tong += $rowtb['coliform'] ;
 					$doduc_tong += $rowtb['doduc'] ;
 				} // ket thuc while 2

 				$nhietdo_tb= round($nhietdo_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$nhietdo_tbthang[] =$nhietdo_tb ;

 				$bod_tb= round($bod_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$bod_tbthang[] =$bod_tb ;

 				$cod_tb= round($cod_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$cod_tbthang[] =$cod_tb ;

 				$n_tb= round($n_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$n_tbthang[] =$n_tb ;

 				$p_tb= round($p_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$p_tbthang[] =$p_tb ;

 				$tss_tb= round($tss_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$tss_tbthang[] =$tss_tb ;

 				$d0_tb= round($d0_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$d0_tbthang[] =$d0_tb ;

 				$ph_tb= round($ph_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$ph_tbthang[] =$ph_tb ;

 				$coliform_tb= round($coliform_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$coliform_tbthang[] =$coliform_tb ;


 				$doduc_tb= round($doduc_tong/$num , 2, PHP_ROUND_HALF_UP); 
 				$doduc_tbthang[] =$doduc_tb ;


 			}//-> ket thuc if 2
 		}//-> ket thuc while 1


 		for($x = 0; $x < $arrlength; $x++) {
 			$update_wqi_thang = "INSERT INTO $name[0]_thang(tentram, x,y, thoigian,nhietdo, bod, cod,n,p,tss,d0,ph,coliform, doduc) VALUES('$tentram_thang[$x]','$toadox[$x]','$toadoy[$x]','$thoigian_thang[$x]','$nhietdo_tbthang[$x]','$bod_tbthang[$x]','$cod_tbthang[$x]','$n_tbthang[$x]','$p_tbthang[$x]','$tss_tbthang[$x]','$d0_tbthang[$x]','$ph_tbthang[$x]','$coliform_tbthang[$x]','$doduc_tbthang[$x]')";
 			pg_query($conn,"$update_wqi_thang");
 		
 		} //-> ket thuc for

 	} // Ket thuc  if 1
 	require("tinhtoanwqithang.php");
 }
}
 	
 ?>
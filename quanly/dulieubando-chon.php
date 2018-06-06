<?php
	if(isset($_GET['filename'])){
		$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
		$filename = $_GET['filename'];
		$check = "SELECT * from chon_dulieufilebando";
		$result_check = pg_query($conn,"$check");
		$sodong = pg_num_rows ($result_check);
		if($sodong > 2 ){
			echo "<h3>Chọn dữ liệu thất bại, bấm vào <a href=\"http://localhost/khoaluan/quanly/dashboard.php?username=&active=dulieubando\"> đây </a> để quay lại</h3>";
		}else{	
			$select = "SELECT * from dulieufilebando where tenfile = '$filename' ";
			$result = pg_query($conn,"$select");
			if($result == true){
			while($row = pg_fetch_array($result)){
				$insert = "INSERT INTO chon_dulieufilebando(tieude,chiso,tenfile,top,bottom,leftt,rightt) VALUES('$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]')";
				$resut_insert = pg_query($conn,"$insert");
				if($resut_insert==true){
					echo "<h3>Chọn dữ liệu thành công, bấm vào <a href=\"http://localhost/khoaluan/quanly/dashboard.php?username=&active=dulieubando\"> đây </a> để quay lại</h3>";
				}
			}
			}
		}		
	} 
?>
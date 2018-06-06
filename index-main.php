<?php
	if(isset($_POST['dangnhap']) && isset($_POST['taikhoan']) && isset($_POST['matkhau'])) {
		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
		$slc_taikhoan = "SELECT tentaikhoan,matkhau from taikhoan";
		$query_taikhoan = pg_query($conn,"$slc_taikhoan");
		$tentaikhoan = $_POST['taikhoan'];
		$matkhau =$_POST['matkhau'];
		if($tentaikhoan == 'admin'){
			require("index-quanly.php");
		}else{
			if($query_taikhoan==true){
				$stt = 0;
			while ($row = pg_fetch_array($query_taikhoan)) {
				if( $tentaikhoan==$row[0] && $matkhau ==$row[1]){
					$stt ++ ;
				}// ->end if kiem tra
			}
			if($stt==1){
				require("index-user.php");
			}else{
				require("index-error.php");
			}
		}
	}
	}else{
		require("index-user1.php");
	}
?>
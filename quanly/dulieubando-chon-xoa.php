<?php
	if(isset($_GET['filename'])){
		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
		$tenfile = $_GET['filename'];
		$xoa = "DELETE from chon_dulieufilebando where tenfile='$tenfile'";
		$result = pg_query($conn,"$xoa");
		if($result==true){
			echo "<h3>Xóa dữ liệu thành công, bấm vào <a href=\"http://khoa-luan.local/quanly/dashboard.php?username=&active=dulieubando\"> đây </a> để quay lại</h3>";
		}
	}
 ?>
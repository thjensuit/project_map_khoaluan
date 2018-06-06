<?php
	if(isset($_POST['them'])){
		$tieude = $_POST['tieude'];
		$chiso = $_POST['chiso'];
		$top = $_POST['top'];
		$bottom = $_POST['bottom'];
		$left = $_POST['left'];
		$right = $_POST['right'];

		if(isset($_FILES['filebando'])){
			$ten  = $_FILES['filebando']['name'];
			$name = explode('.', $_FILES['filebando']['name']);
			$tmp_name  = $_FILES['filebando']['tmp_name'];
			$link = "../img/";
			$uploaded = move_uploaded_file( $_FILES['filebando']['tmp_name'] ,$link.$ten);
			if($uploaded==true){
				$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
				$insert_tenhinh = "INSERT INTO dulieufilebando (tenfile) VALUES ('$name[0]') ";
				$result_inserttenhinh = pg_query($conn,"$insert_tenhinh");
				if($result_inserttenhinh== true){
					$them = "UPDATE dulieufilebando SET tieude= '$tieude' , chiso ='$chiso', top =$top, bottom = $bottom, leftt =$left,rightt = $right where tenfile = '$name[0]'";
					$result = pg_query($conn,"$them");
					if($result==true){
						echo "<h3>Thêm dữ liệu thành công, bấm vào <a href=\"http://localhost/khoaluan/quanly/dashboard.php?username=&active=dulieubando\"> đây </a> để quay lại</h3>";
					}
					
				}else{
					echo "<h3>Thêm dữ liệu thất bại, bấm vào <a href=\"http://localhost/khoaluan/quanly/dulieubando-them.php?username=admin\"> đây </a> để thêm lại</h3>";
				}
			}
		}//-> end file ban do
	} 
?>
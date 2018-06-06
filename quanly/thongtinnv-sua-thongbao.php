<?php
	$tennguoidung = '';
	$taikhoan = '';
	$matkhau = '';
	$email = '';
	$id = '';
	$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
	if(isset($_POST['sua'])){
		$tennguoidung = $_POST['tennguoidung'];
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		$email = $_POST['email'];
	}

	if(isset($_GET['username'])){
		$id  = $_GET['id'];
	}

	$update = "UPDATE taikhoan set tentaikhoan = '$taikhoan', tennguoidung = '$tennguoidung', matkhau = '$matkhau', mail ='$email' where id = $id";
	$result = pg_query($conn ,"$update");
	if($result ==true){
		echo "<h3>Sửa dữ liệu thành công, bấm vào <a href=\"http://khoa-luan.local/quanly/dashboard.php?username=admin&active=thongtinnv\"> đây </a> để quay lại</h3>";
	}
 ?>
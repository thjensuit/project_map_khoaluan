<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method = "POST" enctype="multipart/form-data" action="http://khoa-luan.local/quanly/dulieubando-them-thongbao.php?username=admin">
	<input type="file" name="filebando">
	<input type="submit" name="them" value="test">
</form>
<?php
	if(isset($_POST['them'])){
		if(isset($_FILES['filebando'])){
			$ten  = $_FILES['filebando']['name'];
			$name = explode('.', $_FILES['filebando']['name']);
			$tmp_name  = $_FILES['filebando']['tmp_name'];

		}
	}
 ?>
</body>
</html>
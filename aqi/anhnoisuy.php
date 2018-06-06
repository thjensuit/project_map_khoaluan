<!DOCTYPE html>
<html>
<head>
	<title>lay anh noi suy</title>
</head>
<body>
	<div>
		<form method="POST" enctype="multipart/form-data">
			<h4>ảnh nội suy</h4>
			<input type="file" name="anhnoisuy">
			<input type="submit" name="them" value="test">
		</form>

		<?php
		// if(isset($_POST['them'])){
		// 	
		// }
		if(isset($_POST['them'])){
			$tenanh = $_FILES["anhnoisuy"]["name"];
			// move_uploaded_file($_FILES["anhnoisuy"]["name"],"img/");
			// echo "thanh cong";
			// unlink("img/backgr.jpg");
			echo "$tenanh";
			$dich = 'img/';
			move_uploaded_file($_FILES["anhnoisuy"]["name"],"$dich/");
		}
		?>
	</div>
</body>
</html>
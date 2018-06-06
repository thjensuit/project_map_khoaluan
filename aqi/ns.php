<?php
		if(isset($_POST['bandonoisuy'])){
			$ten  = $_FILES['file']['name'];
			$tmp_name  = $_FILES['file']['tmp_name'];
			$link = "img/";

			echo $tmp_name;
			$uploaded = move_uploaded_file( $_FILES['file']['tmp_name'] ,$link.$ten);

			if($uploaded==true){
				echo "uploaded success";
			}else{
				echo "that bai";
			}
		} 
?>
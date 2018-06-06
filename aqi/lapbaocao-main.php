<?php

	$tentaikhoan = '';
  	if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  	}

	if(isset($_GET['filename'])){
		if($_GET['filename']!=''){
			require("baocao.php");
		}else{
			require("baocao-error.php");
		}
	} 
 ?>
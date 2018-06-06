<?php
 $tentaikhoan = '';
  if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  }
	if(isset($_GET['filename'])){
		if($_GET['filename'] ==""){
		require("lapbaocao_error.php");
		}else{
			require("report/test1.php");
		}
	} 
 ?>
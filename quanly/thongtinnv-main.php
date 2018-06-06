<?php
	if(isset($_GET['action'])=='xoa'){
		require("thongtinnv-xoa.php");
	}else{
		require("thongtinnv-them.php");
	}
?>
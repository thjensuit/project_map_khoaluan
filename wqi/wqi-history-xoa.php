<?php
$tentk = '';
$tenfile ='';
$tenfile_thang='';


if(isset($_GET['username'])){
	$tentk =  $_GET['username'];
	$tenfile = $_GET['tenfile'];
	$tenfile_thang = $_GET['tenfile']."_thang";

}
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
$delete_data= " DELETE from dulieufilewqi where tentaikhoan='$tentk' and tenfile='$tenfile'";
$drop_tbl = "DROP TABLE $tenfile";
$drop_tbl_thang = "DROP TABLE $tenfile_thang";
pg_query($conn,"$drop_tbl");
pg_query($conn,"$drop_tbl_thang");

$result =pg_query($conn,"$delete_data");
if($result== true){
	echo "<h3>Bạn đã xóa dữ liệu thành công, bấm vào"."<a href=\"http://localhost/khoaluan/wqi/dashboard.php?username=$tentk&active=dulieudauvao\"> đây </a>". "để quay lại !</h3>";
}
 
?>
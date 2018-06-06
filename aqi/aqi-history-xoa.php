<?php
$tentk = '';
$tenfile ='';
$tenfile_ngay='';


if(isset($_GET['username'])){
	$tentk = $_GET['username'];
	$tenfile = $_GET['tenfile'];
	$tenfile_ngay = $_GET['tenfile']."_ngay";
}
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
$delete_data= " DELETE from dulieufileaqi where tentaikhoan='$tentk' and tenfile='$tenfile'";
$drop_tbl = "DROP TABLE $tenfile";
$drop_tbl_ngay = "DROP TABLE $tenfile_ngay";
pg_query($conn,"$delete_data");
pg_query($conn,"$drop_tbl");
pg_query($conn,"$drop_tbl_ngay");

$result =pg_query($conn,"$delete_data");
if($result== true){
	echo "<h3>Bạn đã xóa dữ liệu thành công, bấm vào"."<a href=\"http://khoa-luan.local/aqi/dashboard-aqi.php?username=$tentk&active=dulieudauvao\"> đây </a>". "để quay lại !</h3>";
}

?>
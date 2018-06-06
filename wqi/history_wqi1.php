<div class="card" style="height:500px">
	<div class="header">
		<form action="" method="POST" role="form" enctype="multipart/form-data"> 
			<input type="file" name="excelfile"><br><input class="btn btn-primary" type="submit" value="Thêm mới dữ liệu" name="btn-import">
		</form>
		<div class="tieude" style="text-align: center;" >
			<h3>Lịch sử lưu trữ dữ liệu</h3>
		</div>
	</div>
	<?php
    $tentaikhoan = '';
    if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
    }
	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison"); 
	$name[0]="";
	if (isset($_POST['btn-import'])) {
		if (!empty($_FILES["excelfile"]["name"])) {
			$name = explode('.', $_FILES['excelfile']['name']);
			if($name[1] == "csv" && $name[0]!="") {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$thoigian = date('d/m/Y H:i:s');
				$check = "SELECT * FROM dulieufilewqi where tenfile = '$name[0]' ";
				$result_check = pg_query($conn, "$check");
				if($result_check  == true){
					$count_rows = pg_num_rows($result_check);
					if($count_rows==0){
						// $history = "INSERT INTO history_wqi(tenfile,thoigian) VALUES('$name[0]','$thoigian')";
      //       $insert_history = pg_query($conn,"$history");

            $quanly_filewqi = "INSERT INTO dulieufilewqi(tentaikhoan,tenfile,thoigian) VALUES('$tentaikhoan','$name[0]','$thoigian')";
						$insert_filewqi = pg_query($conn,"$quanly_filewqi");

						if ($insert_filewqi==true) {

              //->Tao database du lieu ngay
							$create_tblwqi_ngay = "CREATE TABLE $name[0] (
							id serial PRIMARY KEY,
							tentram varchar(50),
              x float,
              y float,
              thoigian date,
              nhietdo float,
							bod float,
							cod float,
							n float,
							p float,
							tss float,
							d0 float,
							ph float,
							coliform float,
							doduc float,
							wqi_bod float,
							wqi_cod float,
							wqi_n float,
							wqi_p float,
							wqi_tss float,
							wqi_do float,
							wqi_ph float,
							wqi_coliform float,
							wqi_doduc float,
							wqi_tram float
							)";
							$tbl_wqi_ngay = pg_query($conn,"$create_tblwqi_ngay");

              //->Tao database du lieu thang
               $create_tblwqi_thang=" CREATE TABLE $name[0]_thang(
              id serial PRIMARY KEY,
              tentram varchar(50),
              x float,
              y float,
              thoigian varchar(50),
              nhietdo float,
              bod float,
              cod float,
              n float,
              p float,
              tss float,
              d0 float,
              ph float,
              coliform float,
              doduc float,
              wqi_bod float,
              wqi_cod float,
              wqi_n float,
              wqi_p float,
              wqi_tss float,
              wqi_do float,
              wqi_ph float,
              wqi_coliform float,
              wqi_doduc float,
              wqi_tram float
               )";
              $tbl_wqi_thang = pg_query($conn,"$create_tblwqi_thang");

							if ($tbl_wqi_ngay==true && $tbl_wqi_thang==true) {
								$file = $_FILES["excelfile"]["tmp_name"];
								$openfile  = fopen($file,'r');
								$data = fgetcsv($openfile,3000,',');
								$number =0;
								while ( $data = fgetcsv($openfile,3000,',')) {
									$number ++ ;
									$tentram = $data[0];
                  $x = $data[1];
                  $y = $data[2];
                  $thoigian = $data[3];
                  $nhietdo = $data[4];
									$bod= $data[5];
									$cod= $data[6];
									$nh4= $data[7];
									$po3= $data[8];
									$tss= $data[9];
									$do= $data[10];
									$ph= $data[11];
									$coliform = $data[12];
									$doduc = $data[13];
                  if($number >= 1){
                    $data_wqi = " INSERT INTO $name[0](tentram, x, y, thoigian,nhietdo,bod, cod,n ,p, tss,d0,ph,coliform,doduc)
                  VALUES ('$tentram', '$x','$y','$thoigian','$nhietdo', '$bod', '$cod','$nh4','$po3','$tss','$do','$ph','$coliform','$doduc')";
                  pg_query($conn,"$data_wqi");
                  }
								}
								?>
                <script type="text/javascript">
                  alert("Thêm dữ liệu thành công");
                </script>
              <?php
							}
						}

            require("tinhtoanwqi.php");
            require("tinhtoanwqi_tbthang.php");
            //-> goi file tinh toan wqi

					}else{
					?>
            <script type="text/javascript">
              alert("Tên file này đã tồn tại");
            </script>
          <?php
					}
				}else{
					echo "khong thanh cong";
				}
        
			}
		}
    } //->end import
    ?>

    <div class="content table-responsive" style="background-color :white ">
    	<table class="table table-bordered" style="margin-top:15px">
    		<thead>
    			<tr class="warning">
    				<th>Tên File</th>
    				<th>Thời gian</th>
            <th>Chức năng</th>
    			</tr>
    			<?php
    			$tenfile = "SELECT * FROM dulieufilewqi where tentaikhoan = '$tentaikhoan'";
    			$result_tenfile = pg_query($conn, "$tenfile");
    			if($result_tenfile==true){
    				$count_rows_tenfile = pg_num_rows($result_tenfile);
    				if($count_rows_tenfile==0){
    					?>
    					<tr><td colspan="3" style="text-align: center;"><h4>Không có file lưu trữ...</h4></td></tr>
    					<?php 
    				}else{
    					while($row = pg_fetch_array($result_tenfile)) {
    						?>
    						<tbody>
    							<tr>
    								<td> <a style="color:#0000cc" href="dashboard.php?username=<?php echo $tentaikhoan ?>&active=dulieuuser&&filename=<?php echo $row[2];?>" > <?php  echo $row[2];?></a></td>
    								<td><?php echo $row[3]; ?></td>
                    <td><a href="http://localhost/khoaluan/wqi/wqi-history-xoa.php?username=<?php echo $tentaikhoan ?>&tenfile=<?php echo $row[2] ?>" class="btn" style="color:white;background: red; margin-left:20px">Xóa</a></td>   
    							</tr>
    						</tbody>
    						<?php
    					}
              ?>
              <?php
    				} 
    			} ?>
    		</thead>
    	</table>
    </div><!-- End tbl-history -->

    <div>
    	
    </div> <!-- tinhtoanwqi theo ngay -->

    <div>
     
    </div> <!-- tinh toan wqi theo thang -->
</div>

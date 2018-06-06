
<?php 
if(isset($_GET['filename'])){
	$filename= $_GET['filename'];
	$filename_thang = $_GET['filename'].'_thang';
	$filename_hinh = $_GET['filename'].'_hinh';

	// echo $filename_thang;
	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
}
	?>
	<div class="card" style="padding-right: 10px">
		<div class="header">
			<div class="row">
				<div class="col-md-5 pull-right" style="background: #f2f2f2; height: 500px;padding-top:50px">
				<form method="post">
					<div class="row">
						<div class="col-md-8 col-md-offset-4"><h5><b><i>Thời Gian</i></b></h5></div>
						<div class="col-md-4">
							<select class="form-control" id="sel1" name="ngay_option">
								<option selected value="chonngay">- Ngày -</option>
								<?php
								$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
								$select_ngay= "SELECT distinct extract(day from thoigian)as ngay  from $filename order by ngay asc ";
								$result_ngay = pg_query($conn,"$select_ngay");
								if($result_ngay ==true){
									while($row =pg_fetch_array($result_ngay)){
										?>
										<option value="<?php echo $row[0]; ?>"><?php echo "Ngày $row[0]"; ?></option>
										<?php
									}
								} 
								?>
							</select>
						</div> <!-- ngay -->

						<div class="col-md-4">
							<select class="form-control" id="sel1" name="thang_option">
								<option selected value="chonthang">- Tháng -</option>
								
								<?php
								$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
								$select_thang= "SELECT distinct extract(month from thoigian)as thang  from $filename order by thang asc ";
								$result_thang = pg_query($conn,"$select_thang");
								if($result_thang ==true){
									while($row =pg_fetch_array($result_thang)){
										?>
										<option value="<?php echo $row[0]; ?>"><?php echo "Tháng $row[0]"; ?></option>
										<?php
									}
								} 
								?>
							</select>
						</div> <!-- thang -->

						<div class="col-md-4">
							<select class="form-control" id="sel1" name="nam_option">
								<option selected value="chonnam">- Năm -</option>
								<?php
								$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
								$select_nam= "SELECT distinct extract(year from thoigian)as nam  from $filename order by nam asc ";
								$result_nam = pg_query($conn,"$select_nam");
								if($result_nam ==true){
									while($row =pg_fetch_array($result_nam)){
										?>
										<option value="<?php echo $row[0]; ?>"><?php echo "Năm $row[0]"; ?></option>
										<?php
									}
								} 
								?>
							</select>
						</div> <!-- nam -->



						<div class="col-md-5 col-md-offset-3" style="padding-top: 20px; padding-bottom: 30px">
							<button  class="btn btn-primary" name="xembandowqi" type="submit">Bản đồ Wqi trạm</button>
						</div>	 
					</div>
					</form>
					

				</div><!-- option -->

				<div class="col-md-7 pull-left">
					<div id='map' class='map' style="height: 500px"></div>
					<?php
					if(isset($_POST['xembandowqi'])){

						$ngay = $_POST['ngay_option'];
						$thang = $_POST['thang_option'];
						$nam = $_POST['nam_option'];
					
						if($ngay <=10){
							$ngay1 =  "0".$ngay;
						}else{
							$ngay1 = $ngay;
						}
						if($thang <=10){
							$thang1 =  "0".$thang;
						}
						$date = $nam."/".$thang1."/".$ngay1;
						
						$thang_tb = $nam."/".$thang1;

						if($ngay =='chonngay'&&$thang =='chonthang'){
							require("bando_empty.php");
							
						}else if($ngay !='chonngay'&&$thang !='chonthang'&&$nam !='chonnam'){
							require("map_ngay.php");
							
						}else{
							require("map_thang.php");
							
						}
						
				
					}elseif(isset($_POST['bandonoisuy'])){
						require("map_noisuy.php");
					}
					else{
						require("bando_empty.php");
					}
					 ?>
					}
				</div> <!-- map -->
						
				

			</div>
		</div> <!-- content -->
	</div>
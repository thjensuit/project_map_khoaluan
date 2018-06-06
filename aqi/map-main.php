
<?php 
         if(isset($_GET['filename'])){
            $filename_h = $_GET['filename'];
			$filename_ngay = $_GET['filename'].'_ngay';
		}
         $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
 ?>
 <style type="text/css">
    .map { position:absolute; top:0; bottom:0; width:100%; }
      .my-icon {
        border-radius: 100%;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 20px;
        color: white;
      }

      .icon-dc {
        background: #ff8533;
      }

      .icon-sf {
        background: #63b6e5;
      }
       .icon-tot {
      background: #006699;
  }
  .icon-trungbinh {
      background: #ffff00;
  }
  .icon-kem {
      background: #ffa31a;
  }
  .icon-xau {
      background: red;
  }
  .icon-nguyhai {
      background: #996600;
  }
</style>

<div class="card" style="padding-right: 10px">
	<div class="header">
		<div class="row">
		<form method="Post">
			<div class="col-md-5 pull-right" style="background: #f2f2f2; height: 500px;padding-top: 30px">
				<div class="row">
					<div class="col-md-8 col-md-offset-4"><h5><b><i>Thời Gian</i></b></h5></div>

					<div class="col-md-4">
							<select class="form-control" id="sel1" name="ngay_option">
								<option selected value="chonngay">- Ngày -</option>
								<?php
								$select_ngay= "SELECT distinct extract(day from thoigian)as ngay  from $filename_h order by ngay asc ";
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
					</div> <!-- option ngay -->

					<div class="col-md-4">
						<select class="form-control" id="sel1" name="thang_option">
							<option selected value="chonthang">- Tháng -</option>
							<?php
							$select_thang= "SELECT distinct extract(month from thoigian)as thang  from $filename_h order by thang asc ";
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
					</div> <!-- option thang -->

					<div class="col-md-4">
						<select class="form-control" id="sel1" name="nam_option">
							<option selected value="chonnam" style="">-Năm-</option>
							<?php
							$select_nam= "SELECT distinct extract(year from thoigian)as nam  from $filename_h order by nam asc ";
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
					</div><!-- option nam -->
					<div class="col-md-4 col-md-offset-4" >
					    <button class="btn btn-warning" style="background: #e65c00;margin-top: 30px" name="xembando">Xem bản đồ</button>
					</div>
				</div>
			</div> <!-- option -->
			

			<div class="col-md-7 pull-left">
				<?php
			if(isset($_POST['xembando'])){
			$ngay = $_POST['ngay_option'];
			$thang = $_POST['thang_option'];
			$nam = $_POST['nam_option'];

			if($ngay<=10){
				$ngay1 ="0".$_POST['ngay_option'];
			}else{
				$ngay1 =$ngay;
			}
			if($thang<=10){
				$thang1 ="0".$_POST['thang_option'];
			}else{
				$thang1  =$thang;
			}
			$date =$nam."/".$thang1."/".$ngay1;
			$thang_tb = $nam."/".$thang1;
			
			if($ngay!='chonngay'&& $thang!='chonthang'&& $nam!='chonnam'){
				require("map-thoigian.php");
			}else{
				require("map_empty.php");
			}
		}else{
			require("map_empty.php");
		}
		 ?>
			</div> <!-- map -->
			

		</form>
		</div>
	</div>
</div>
<?php 
         if(isset($_GET['filename'])){
               $filename = $_GET['filename'];
               $filename_thang = $_GET['filename']."_thang";
            }
 ?>
<div class="card">
<div class="header">
    <form method="post">
         <?php
         $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
          ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-2"><h5><b>Thời Gian</b></h5></div>
            <div class="col-md-5 col-md-offset-1"><h5><b>Tên Trạm</b></h5></div>
            <div class="col-md-2">
                <select class="form-control" id="sel1" name="ngay_option">
                    <option selected value="chonngay">- Chọn Ngày -</option>
                    <?php

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

            <div class="col-md-2">
                    <select class="form-control" id="sel1" name="thang_option">
                        <option selected value="chonthang">- Chọn Tháng -</option>
                        <?php
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

            <div class="col-md-2">
               <select class="form-control" id="sel1" name="nam_option">
                  <option selected value="chonnam" style="">-Năm-</option>
                  <?php
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
             
             <div class="col-md-2 col-md-offset-1">
               <select class="form-control" id="sel1" name="tentram_option">
                  <option selected value="chontram" style="">-Tên trạm-</option>
                  <?php
                  $select_tentram= "SELECT distinct tentram  from $filename order by tentram asc ";
                  $result_tentram = pg_query($conn,"$select_tentram");
                  if($result_tentram ==true){
                     while($row =pg_fetch_array($result_tentram)){
                  ?>
                  <option value="<?php echo $row[0]; ?>"><?php echo "Trạm $row[0]"; ?></option>
                  <?php
                     }
                  } 
                   ?>
               </select>
            </div>

            <div class="col-md-2 col-md-offset-1"><button class="btn btn-primary" type="submit" name="xembieudo">Xem biểu đồ</button></div>

        </div>
    </form>
</div>
<div style="padding-right: 10px; height: 500px">
   
   <?php
   if(isset($_POST['xembieudo'])){
      $ngay = $_POST['ngay_option'];
      $thang = $_POST['thang_option'];
      $nam = $_POST['nam_option'];
      $tentram = $_POST['tentram_option'];
      
      if($ngay<=10){
        $ngay1 ="0".$_POST['ngay_option'];
      }else{
        $ngay1 =$ngay;
      }
      if($thang<=10){
        $thang1 ="0".$_POST['thang_option'];
      }
      $date =$nam."/".$thang1."/".$ngay1;
      $thang_tb = $nam."/".$thang1;
      
      if($ngay!='chonngay' && $thang !='chonthang'&& $nam != 'chonnam' &&$tentram =='chontram'){
        require("bieudo_ngay.php");
      }else{
        ?>
          <script type="text/javascript">
           alert("Không tìm thấy kết quả"); 
        </script>

        <?php      
      }

      
     
      
   }
      
    ?>
</div>
</div>
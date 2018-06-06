
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
<div class="card"  style="height: 500px">
    <?php
        if(isset($_GET['filename'])){
        $filename_h = $_GET['filename'];
        $filename_ngay = $_GET['filename'].'_ngay';
        $filename_hinh = $_GET['filename'].'_hinh';

        echo $filename_ngay;

    ?>
    <div class="row">
        <form method="post" enctype="multipart/form-data">
        <div class="col-md-2 pull-right" style="margin-right: 60px">
                <div class="form-group">
                    <label for="sel1"><b>Thời gian</b></label>
                    <select class="form-control" id="sel1" name="thoigian_option">
                                <option selected value="chonthoigian">- Chọn thời gian-</option>
                                <?php
                                $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                                $select_thoigian = "SELECT distinct to_char(\"thoigian\", 'DD/MM/YYYY') FROM $filename_ngay order by to_char(\"thoigian\", 'DD/MM/YYYY') asc";
                                $result_thoigian = pg_query($conn,"$select_thoigian");
                                if($result_thoigian==true){
                                    while($row_thoigian = pg_fetch_array($result_thoigian)){
                                        ?>
                                <option value="<?php echo "$row_thoigian[0]"?>"><?php echo $row_thoigian[0]; ?></option>
                                        <?php }} ?>
                    </select> <!-- option thoigian -->

                    <button type="submit" class="btn btn-primary" name="xembandoaqi">Bản đồ aqi trạm</button>

                    	<input type="file" name="anhnoisuy">

                     <label for="sel1"><b>Lớp nội suy</b></label>
                    	<select class="form-control" id="sel1" name="tenlayer">
                        <option selected value="chontenbando">- Chọn Tên-</option>
                        <?php
                        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                        $select_tenhinh = "SELECT tenhinh FROM $filename_hinh order by tenhinh asc";
                        $result_tenhinh = pg_query($conn,"$select_tenhinh");
                        if($result_tenhinh==true){
                            while($row_tenhinh = pg_fetch_array($result_tenhinh)){
                                ?>
                                <option value="<?php echo "$row_tenhinh[0]"?>"><?php echo $row_tenhinh[0]; ?></option>
                                <?php }} ?>
                     </select><!-- option tenhinh -->

                     <button type="submit" class="btn btn-primary" name="bandonoisuy">Bản đồ nội suy</button>
                     <?php
                     if(isset($_FILES['anhnoisuy'])&& isset($_POST['bandonoisuy'])){
                        $ten  = $_FILES['anhnoisuy']['name'];
                        $name = explode('.', $_FILES['anhnoisuy']['name']);
                        $tmp_name  = $_FILES['anhnoisuy']['tmp_name'];
                        $link = "img/";
                        echo $tmp_name;
                        $uploaded = move_uploaded_file( $_FILES['anhnoisuy']['tmp_name'] ,$link.$ten);

                        if($uploaded==true){
                            echo "uploaded success";
                            $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                            $insert_tenhinh = "INSERT INTO $filename_hinh (tenhinh) VALUES ('$name[0]') ";
                            $result_inserttenhinh = pg_query($conn,"$insert_tenhinh");
                            if( $result_inserttenhinh==true){
                                echo "thanhcong";
                            }
                        }else{
                            echo "that bai";
                        }
                    }else{
                        echo "ko dc";
                    }
                    ?>
            </div>
           </form>
            <?php

             ?>
        </div> <!-- option - right -->
        <div class="col-md-9 pull-left">
        <?php
        if(isset($_POST['xembandoaqi'])){
                    $thoigian = $_POST['thoigian_option'];
                    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                    $select_aqitram = "SELECT * FROM $filename_ngay WHERE to_char(\"thoigian\", 'DD/MM/YYYY')='$thoigian'" ;
                $result = pg_query($conn,"$select_aqitram");
                if($result==true){
                    while($row = pg_fetch_array($result)){
                        $tentram  = $row ['tentram'];
                        $aqingay = $row['aqi_ngay_tram'];
                        echo "$tentram";
                        $x= $row['x'];
                        $y = $row['y'];
                        echo "$x";
                    }
                }else{echo "lổii";}

                ?>

            <div id='map' class='map' style="height: 500px">
                <script type="text/javascript">
                L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
                var map = L.mapbox.map('map', 'mapbox.streets')
                .setView([10.6,106.9], 10);

                var myLayer = L.mapbox.featureLayer().addTo(map);
                var geojson = [
                <?php
                if(isset($_POST['xembandoaqi'])){
                    $thoigian = $_POST['thoigian_option'];
                    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                    $select_aqitram = "SELECT * FROM $filename_ngay WHERE to_char(\"thoigian\", 'DD/MM/YYYY')='$thoigian'" ;
                $result = pg_query($conn,"$select_aqitram");
                if($result==true){
                    while($row = pg_fetch_array($result)){
                        $tentram  = $row ['tentram'];
                        $aqingay = $row['aqi_ngay_tram'];
                        $mau='';
                        if($aqingay>=0 && $aqingay <=50){
                            $mau = 'icon-tot';
                            $mau_tooltip = '#006699';
                        }else if($aqingay>=51 && $aqingay <=100){
                            $mau = 'icon-trungbinh';
                            $mau_tooltip = '#ffff00';
                        }else if($aqingay>=101 && $aqingay <=200){
                            $mau = 'icon-kem';
                            $mau_tooltip = '#ffa31a';
                        }else if($aqingay>=201 && $aqingay <=300){
                            $mau = 'icon-xau';
                            $mau_tooltip = 'red';
                        }else{$mau = 'icon-nguyhai';
                            $mau_tooltip = '#996600';}
                        $x= $row['x'];
                        $y = $row['y'];



                        echo"{
                            type: 'Feature',
                            geometry:{
                                type: 'Point',
                                coordinates: [$x, $y]
                            },
                            properties:{
                                icon : {
                                    className: 'my-icon $mau',
                                    html: '$aqingay', // add content inside the marker,
                                    iconSize: null // size of icon, use null to set the size in CSS
                                },
                                description:'<div style=\"text-align:center\"><h6><b>Trạm $tentram</b></h6><h1>Tọa độ X :$x</h1><h2>Tọa độ Y  :$y</h2><h4 style=\"background: $mau_tooltip\"><b>Chỉ số AQI : $aqingay</b></h4><h2 style=\"border: 2px solid $mau_tooltip;border-radius: 5px;\"> <span class=\"glyphicon glyphicon-hand-right\" aria-hidden=\"true\"></span><b> Cảnh báo</b>: Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài</h2></div>'
                            },

                        },";

                    }
                }else{echo"lổii";}
                }else{
                    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
                    $select_aqitram = "SELECT distinct tentram,x,y FROM $filename_ngay" ;
                    $result = pg_query($conn,"$select_aqitram");
                    if($result==true){
                        while($row = pg_fetch_array($result)){
                            $tentram = $row[0];
                            $x = $row[1];
                            $y = $row[2];
                            echo"{
                                type: 'Feature',
                                geometry:{
                                    type: 'Point',
                                    coordinates: [$x, $y]
                                },
                                properties:{
                                    icon : {
                                        className: 'my-icon icon-dc',
                                        html: '&#9733;', // add content inside the marker,
                                        iconSize: null // size of icon, use null to set the size in CSS
                                    },
                                    description:'<div style=\"text-align:center\"><h3><b>Trạm $tentram</b></h3><h5>Tọa độ X :$x</h5><h5>Tọa độ Y :$y</h5></div>'
                                }
                            },
                                ";
                        }
                    }else{
                        echo "k dung";
                    }
            }//->k bam nut
                ?>


                ];


                myLayer.on('layeradd', function(e) {
                    var marker = e.layer,
                        feature = marker.feature;
                    marker.setIcon(L.divIcon(feature.properties.icon));
                });
                myLayer.setGeoJSON(geojson);
map.featureLayer.on('click', function(e) {
        map.panTo(e.layer.getLatLng());
    });

            </script> <!-- js map -->
            </div>
            <?php
            }else{
            	?>
            	<div id='map1' style="height: 500px">
            		ok
            	</div>
               <script>
                L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
                var imageUrl = <?php
                if(isset($_POST['bandonoisuy'])){
                $tenhinh = $_POST['tenlayer'];
                 echo "'img/$tenhinh.png'";
                }

                ?>;
    // This is the trickiest part - you'll need accurate coordinates for the
    // corners of the image. You can find and create appropriate values at
    // http://maps.nypl.org/warper/ or
    // http://www.georeferencer.org/
    imageBounds = L.latLngBounds([
        [ 10.373897,106.679344],
        [10.743694,107.070708]
        ]);
    var map1 = L.mapbox.map('map1', 'mapbox.streets')
    .fitBounds(imageBounds);
    var overlay = L.imageOverlay(imageUrl, imageBounds)
    .addTo(map1);
</script>
            	<?php
            }
         ?>

        </div> <!-- content map - left -->
    </div>
    <?php
        }//-> Lay ten file
     ?>
</div>
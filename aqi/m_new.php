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
        echo $filename_ngay;

    ?>
    <div class="row">
        <form method="post">
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
                    </select>
                    <button type="submit" class="btn btn-primary" name="xembandoaqi">Xem bản đồ</button>
            </div>
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
            }
             ?>
        </div> <!-- option - right -->
        </form>
        <div class="col-md-9 pull-left">
            <div id='map' class='map' style="height: 500px">

            </div>
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
                        }else if($aqingay>=51 && $aqingay <=100){
                            $mau = 'icon-trungbinh';
                        }else if($aqingay>=101 && $aqingay <=200){
                            $mau = 'icon-kem';
                        }else if($aqingay>=201 && $aqingay <=300){
                            $mau = 'icon-xau';
                        }else{$mau = 'icon-nguyhai';}
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
                                description:'<div style=\"text-align:center\"><h3><b>Trạm $tentram</b></h3><h5>Tọa độ X :$x</h5><h5>Tọa độ Y  :$y</h5></div>'
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
        </div> <!-- content map - left -->
    </div>
    <?php
        }//-> Lay ten file
     ?>
</div>
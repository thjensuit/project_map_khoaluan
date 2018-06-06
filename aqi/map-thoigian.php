
<div id='map' style="height: 500px;">
</div>
<script type="text/javascript">
                L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
                var map = L.mapbox.map('map', 'mapbox.streets')
                .setView([10.770141,106.689444], 10);

                var myLayer = L.mapbox.featureLayer().addTo(map);
                var geojson = [
                <?php
                if(isset($_POST['xembando'])){
                    $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
                    $select_aqitram = "SELECT * FROM $filename_ngay WHERE thoigian ='$date'" ; 
                $result = pg_query($conn,"$select_aqitram");
                if($result==true){
                    while($row = pg_fetch_array($result)){
                        $tentram  = str_replace(" ","-",$row['tentram']);
                        $aqingay = $row['aqi_ngay_tram'];
                        $thongso_max = $row['thongso_ngay_max'];
                        $tentb = '';
                        $thoigian =$row['thoigian'];
                        $link = "http://localhost/khoaluan/aqi/map-dulieu.php?filename=$filename_ngay&tentram=$tentram&thoigian=$thoigian";
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
                                description:'<div style=\"text-align:center\"><h6><b><a href=\"$link\">Trạm $row[1]</a></b></h6><h1>Tọa độ X :$x</h1><h2>Tọa độ Y  :$y</h2><h4 style=\"background: $mau_tooltip\"><b>Chỉ số AQI : $aqingay</b><br><b>Thông số ô nhiễm nhất : $thongso_max</b></h4><h2 style=\"border: 2px solid $mau_tooltip;border-radius: 5px;\"> <span class=\"glyphicon glyphicon-hand-right\" aria-hidden=\"true\"></span><b> Cảnh báo</b>: Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài</h2></div>'
                            },
                            
                        },";
                
                    }
                }else{echo"lổii";}
                }else{
                    $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
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
       
    
 

<!DOCTYPE html>
<html>
<head>
   <title></title>
   <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
</head>
<body>
   <div id = "map" style="height:500px"></div>
   <script type="text/javascript">
   L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
   var map = L.mapbox.map('map', 'mapbox.streets')
   .setView([10.6,106.9], 10);
   var myLayer = L.mapbox.featureLayer().addTo(map);
   var geojson = [
   <?php
   $select = "SELECT * FROM wqi_hcm_thang3_2017_thang WHERE thoigian ='2017/02'";
   $result = pg_query($conn, "$select");
   if($result== true){
      while($row= pg_fetch_array($result)){
         $wqi =$row[24] ;
         $x = $row['x'];
         $y =$row ['y'];
         $tentram = $row['tentram'];
         $mau = ''; 
         if($wqi >=0 && $wqi <= 25){
            $mucdo = "Nước ô nhiễm nặng, cần các biện pháp xử lý trong tương lai";
            $mau = "#ff0000";
         }elseif ($wqi >=26 && $wqi <= 50) {

            $mucdo = "Sử dụng cho giao thông thủy và các mục đích tương đương khác";
            $mau = "#ffcc00";
         }elseif ($wqi >=51 && $wqi <= 75) {
            $mucdo = "Sử dụng cho mục đích tưới tiêu và các mục đích tương đương khác";
            $mau = "#ffff00";
         }elseif ($wqi >=76 && $wqi <= 90) {
            $mucdo = "Sử dụng cho mục đích cấp nước sinh hoạt nhưng cần các biện pháp xử lý phù hợp";
            $mau = "#008000";
         }else{
            $mucdo = "Sử dụng tốt cho mục đích cấp nước sinh hoạt";
            $mau = "#0000ff";
         }              
         echo "
         {
            type: 'Feature',
            geometry: {
               type: 'Point',
               coordinates: [$row[2], $row[3]]
            },
            properties: {
               title: '<div style=\"text-align: center\"><h6><b>Trạm $tentram</b></h6></div>',
               description: '<div style=\"text-align: center\" ><h1>Tọa độ X :$x</h1><h2>Tọa độ Y  :$y</h2><h4 style=\"background: $mau\"><b>Chỉ số WQI : $wqi</b></h4><h2 style=\"border: 2px solid $mau;border-radius: 5px;\" > <b> Cảnh báo</b>: Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài</h2></div>',
               'marker-color': '$mau',
               'marker-size': 'large',
               'marker-symbol': '$row[24]',
            }
         },";
      }
   }
   ?>

   ];
   myLayer.setGeoJSON(geojson);
</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        if(isset($_GET['filename'])){
        $filename_ngay = $_GET['filename'];
        $filename  = str_replace("_ngay","",$filename_ngay);
        $tentram = $_GET['tentram'];
        $tentram1  = str_replace("-"," ",$tentram);
        $thoigian = $_GET['thoigian'];
        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    }
     ?>
     <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-md-9">
                <div id="container" style="width: 700px; height: 400px;margin: 0 auto">

                </div>
            </div>
            <div class="col-md-3" style="margin-top: 60px">
                <div class="col-md-5 col-md-offset-4"><h5><b><i>Chú thích</i><b></h5></div>
                <table class="table table-bordered">
                <tr>
                    <td style="background:#fff2e6">Khoảng giá trị</td>
                    <td style="background:#fff2e6" >Chất lượng không khí</td>
                </tr>
                <tr>
                    <td style="background-color:#f2f2f2" >0-50</td>
                    <td style="background-color:#66ccff">Tốt</td>
                </tr>
                <tr>
                    <td style="background-color:#f2f2f2" >51-100</td>
                    <td style="background-color:#ffff00">Trung bình</td>
                </tr>

                <tr>
                    <td style="background-color:#f2f2f2">101-200</td>
                    <td style="background-color:#ffa31a " >Kém</td>
                </tr>

                <tr>
                    <td style="background-color:#f2f2f2">201-300</td>
                    <td style="background-color:red">Xấu</td>
                </tr>

                <tr>
                    <td style="background-color:#f2f2f2" >Trên 300</td>
                    <td style="background-color:#996600" >Nguy hại</td>
                </tr>

            </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ AQI trạm <?php echo $tentram1." ".$thoigian ?>'
            },

            xAxis: {
                type: 'category',
        // crosshair: true --> hover qua cot
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Chỉ số AQI'
        }
    },
    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,

            }
        }
    },
    series: [{
        colorByPoint: true,
        data: [<?php
        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
        $select = "SELECT *  from $filename_ngay where thoigian='$thoigian' and tentram ='$tentram1'";
        $result = pg_query($conn,"$select");

        if ($result == true){
            while($row = pg_fetch_array($result)){

                $mau_so2="";
                if($row['aqi_ngay_so2']>=0 && $row['aqi_ngay_so2']<=50){
                    $mau_so2= '#66ccff';
                }elseif($row['aqi_ngay_so2']>=51 && $row['aqi_ngay_so2']<=100){
                    $mau_so2 = '#ffff00';
                }elseif($row['aqi_ngay_so2']>=101 && $row['aqi_ngay_so2']<=200){
                    $mau_so2 = '#ffa31a';
                }elseif($row['aqi_ngay_so2']>=201 && $row['aqi_ngay_so2']<=300){
                    $mau_so2 = 'red';
                }else{
                    $mau_so2 = '#996600';
                }

                $mau_co="";
                if($row['aqi_ngay_co']>=0 && $row['aqi_ngay_co']<=50){
                    $mau_co= '#66ccff';
                }elseif($row['aqi_ngay_co']>=51 && $row['aqi_ngay_co']<=100){
                    $mau_co = '#ffff00';
                }elseif($row['aqi_ngay_co']>=101 && $row['aqi_ngay_co']<=200){
                    $mau_co = '#ffa31a';
                }elseif($row['aqi_ngay_co']>=201 && $row['aqi_ngay_co']<=300){
                    $mau_co = 'red';
                }else{
                    $mau_co = '#996600';
                }

                $mau_no2="";
                if($row['aqi_ngay_no2']>=0 && $row['aqi_ngay_no2']<=50){
                    $mau_no2= '#66ccff';
                }elseif($row['aqi_ngay_no2']>=51 && $row['aqi_ngay_no2']<=100){
                    $mau_no2 = '#ffff00';
                }elseif($row['aqi_ngay_no2']>=101 && $row['aqi_ngay_no2']<=200){
                    $mau_no2 = '#ffa31a';
                }elseif($row['aqi_ngay_no2']>=201 && $row['aqi_ngay_no2']<=300){
                    $mau_no2 = 'red';
                }else{
                    $mau_no2 = '#996600';
                }

                $mau_o3="";
                if($row['aqi_ngay_o3']>=0 && $row['aqi_ngay_o3']<=50){
                    $mau_o3= '#66ccff';
                }elseif($row['aqi_ngay_o3']>=51 && $row['aqi_ngay_o3']<=100){
                    $mau_o3 = '#ffff00';
                }elseif($row['aqi_ngay_o3']>=101 && $row['aqi_ngay_o3']<=200){
                    $mau_o3 = '#ffa31a';
                }elseif($row['aqi_ngay_o3']>=201 && $row['aqi_ngay_o3']<=300){
                    $mau_o3 = 'red';
                }else{
                    $mau_o3 = '#996600';
                }

                $mau_tsp="";
                if($row['aqi_ngay_tsp']>=0 && $row['aqi_ngay_tsp']<=50){
                    $mau_tsp= '#66ccff';
                }elseif($row['aqi_ngay_tsp']>=51 && $row['aqi_ngay_tsp']<=100){
                    $mau_tsp = '#ffff00';
                }elseif($row['aqi_ngay_tsp']>=101 && $row['aqi_ngay_tsp']<=200){
                    $mau_tsp = '#ffa31a';
                }elseif($row['aqi_ngay_tsp']>=201 && $row['aqi_ngay_tsp']<=300){
                    $mau_tsp = 'red';
                }else{
                    $mau_tsp = '#996600';
                }

                $mau_pm10="";
                if($row['aqi_ngay_pm10']>=0 && $row['aqi_ngay_pm10']<=50){
                    $mau_pm10= '#66ccff';
                }elseif($row['aqi_ngay_pm10']>=51 && $row['aqi_ngay_pm10']<=100){
                    $mau_pm10 = '#ffff00';
                }elseif($row['aqi_ngay_pm10']>=101 && $row['aqi_ngay_pm10']<=200){
                    $mau_pm10 = '#ffa31a';
                }elseif($row['aqi_ngay_pm10']>=201 && $row['aqi_ngay_pm10']<=300){
                    $mau_pm10 = 'red';
                }else{$mau_pm10 = '#996600';}

                $mau_pm25="";
                if($row['aqi_ngay_pm25']>=0 && $row['aqi_ngay_pm25']<=50){
                    $mau_pm25= '#66ccff';
                }elseif($row['aqi_ngay_pm25']>=51 && $row['aqi_ngay_pm25']<=100){
                    $mau_pm25 = '#ffff00';
                }elseif($row['aqi_ngay_pm25']>=101 && $row['aqi_ngay_pm25']<=200){
                    $mau_pm25 = '#ffa31a';
                }elseif($row['aqi_ngay_pm25']>=201 && $row['aqi_ngay_pm25']<=300){
                    $mau_pm25 = 'red';
                }else{$mau_pm25 = '#996600';}

                $mau_pb="";
                if($row['aqi_ngay_pm25']>=0 && $row['aqi_ngay_pm25']<=50){
                    $mau_pb= '#66ccff';
                }elseif($row['aqi_ngay_pm25']>=51 && $row['aqi_ngay_pm25']<=100){
                    $mau_pb = '#ffff00';
                }elseif($row['aqi_ngay_pm25']>=101 && $row['aqi_ngay_pm25']<=200){
                    $mau_pb = '#ffa31a';
                }elseif($row['aqi_ngay_pm25']>=201 && $row['aqi_ngay_pm25']<=300){
                    $mau_pb = 'red';
                }else{$mau_pb = '#996600';}


                echo "{
                    name:'AQI_SO2',
                    y:$row[5],
                    color: '$mau_so2',
                },
                {
                    name:'AQI_CO',
                    y:$row[6],
                    color: '$mau_co',
                },
                {
                    name:'AQI_NO2',
                    y:$row[7],
                    color: '$mau_no2',
                },
                {
                    name:'AQI_O3',
                    y:$row[8],
                    color: '$mau_o3',
                },
                {
                    name:'AQI_TSP',
                    y:$row[9],
                    color: '$mau_tsp',
                },
                {
                    name:'AQI_PM10',
                    y:$row[10],
                    color: '$mau_pm10',
                },
                {
                    name:'AQI_PM2.5',
                    y:$row[11],
                    color: '$mau_pm25',
                },
                {
                    name:'AQI_Pb',
                    y:$row[12],
                    color: '$mau_pb',
                },
                ";
            }
        }

        ?>]
    }]
});
</script>
</body>
</html>
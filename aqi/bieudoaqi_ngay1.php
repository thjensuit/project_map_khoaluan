
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


    <div class="row" style="margin-right: 20px; margin-top: 70px">
        <div class="col-md-9">
            <div id="container" style="margin: 0 auto;"></div>
        </div>
    <div class="col-md-3" style="margin-top: 20px">
    <div class="col-md-6 col-md-offset-4"><h5><b><i>Chú Thích</i><b></h5></div>
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
            <div class="col-md-12">-1 : không có dữ liệu</div>
    </div>
</div>


<script type="text/javascript">
        $(function () {    
            var defaultTitle = "Biểu đồ AQI các trạm quan trắc TP.HCM <?php echo $date ?>" ;
            var drilldownTitle = "Biểu đồ AQI thông số trạm ";

    // Create the chart
    var chart = new Highcharts.Chart({
        chart: {
            type: 'column',
            renderTo: 'container',
            events: {
                drilldown: function(e) {
                    chart.setTitle({ text: drilldownTitle + e.point.name });
                },
                drillup: function(e) {
                    chart.setTitle({ text: defaultTitle });
                }
            }
        },
        title: {
            text: defaultTitle
        },
        xAxis: {
            type: 'category',
        },
        yAxis: {
            lineWidth: 1,
            tickWidth: 1,
            title:{
                text : 'Giá trị AQI ngày',
                margin: 35
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

            data: [<?php
            $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
            $select_databieudo = "SELECT * FROM $filename_ngay WHERE thoigian='$date'" ; 
            $result = pg_query($conn,"$select_databieudo");
            if($result==true){
                while($row = pg_fetch_array($result)){
                    $mau="";
                if($row['aqi_ngay_tram']>=0 && $row['aqi_ngay_tram']<=50){
                    $mau= '#66ccff';
                }elseif($row['aqi_ngay_tram']>=51 && $row['aqi_ngay_tram']<=100){
                    $mau = '#ffff00';
                }elseif($row['aqi_ngay_tram']>=101 && $row['aqi_ngay_tram']<=200){
                    $mau = '#ffa31a';
                }elseif($row['aqi_ngay_tram']>=201 && $row['aqi_ngay_tram']<=300){
                    $mau = '#ff4d4d';
                }else{
                    $mau = '#996600';
                }
                        echo "{
                            name:'$row[1]',
                            y:$row[13],
                            color: '$mau',
                            drilldown:'$row[1]',
                        },
                        ";
                    }
                }
                ?>]
            }],
            drilldown: {
                title: {
                    text: 'Biểu đồ AQI thông số tp.HCM',
                },
                series: [
                <?php 
                $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
                $select_data= "SELECT * from $filename_ngay WHERE thoigian='$date'";
                $result = pg_query($conn,"$select_data");
                if ($result == true){
                    while ($row = pg_fetch_array($result)) {
                     $mau_so2="red";
                     if($row['aqi_ngay_so2']>=0 && $row['aqi_ngay_so2']<=50){
                        $mau_so2= '#66ccff';
                    }elseif($row['aqi_ngay_so2']>=51 && $row['aqi_ngay_so2']<=100){
                        $mau_so2 = '#ffff00';
                    }elseif($row['aqi_ngay_so2']>=101 && $row['aqi_ngay_so2']<=200){
                        $mau_so2 = '#ffa31a';
                    }elseif($row['aqi_ngay_so2']>=201 && $row['aqi_ngay_so2']<=300){
                        $mau_so2 = '#ff4d4d';
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
                        $mau_co = '#ff4d4d';
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
                        $mau_no2 = '#ff4d4d';
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
                        $mau_o3 = '#ff4d4d';
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
                        $mau_tsp = '#ff4d4d';
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
                        $mau_pm10 = '#ff4d4d';
                    }else{$mau_pm10 = '#996600';}

                    $mau_pm25="";
                    if($row['aqi_ngay_pm25']>=0 && $row['aqi_ngay_pm25']<=50){
                        $mau_pm25= '#66ccff';
                    }elseif($row['aqi_ngay_pm25']>=51 && $row['aqi_ngay_pm25']<=100){
                        $mau_pm25 = '#ffff00';
                    }elseif($row['aqi_ngay_pm25']>=101 && $row['aqi_ngay_pm25']<=200){
                        $mau_pm25 = '#ffa31a';
                    }elseif($row['aqi_ngay_pm25']>=201 && $row['aqi_ngay_pm25']<=300){
                        $mau_pm25 = '#ff4d4d';
                    }else{$mau_pm25 = '#996600';}

                    $mau_pb="";
                    if($row['aqi_ngay_pb']>=0 && $row['aqi_ngay_pb']<=50){
                        $mau_pb= '#66ccff';
                    }elseif($row['aqi_ngay_pb']>=51 && $row['aqi_ngay_pb']<=100){
                        $mau_pb = '#ffff00';
                    }elseif($row['aqi_ngay_pb']>=101 && $row['aqi_ngay_pb']<=200){
                        $mau_pb = '#ffa31a';
                    }elseif($row['aqi_ngay_pb']>=201 && $row['aqi_ngay_pb']<=300){
                        $mau_pb = '#ff4d4d';
                    }else{$mau_pb = '#996600';}

                        echo "
                        {
                            id: '$row[1]',
                            name: '$row[1]',
                            data:[
                            {
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
                            }
                            ]

                        },";
                    }
                }else{
                    echo "khong thanh cong";
                }
                ?>   
                ]   
            }

        })
});
</script>
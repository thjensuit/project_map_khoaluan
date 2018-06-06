
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


	<div class="row" style="margin-right: 20px; margin-top: 70px">
        <div class="col-md-9">
            <div id="container" style="margin: 0 auto;">ok</div>
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
                text : 'Giá trị AQI',
                margin: 35
            }
        },

        legend: {
            enabled: false
        },

        tooltip: {
            headerFormat: '<div style="font-size:13px; margin-left:10px">{series.name}</div><br>',
            pointFormat: '<div style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
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
                    $mau = 'red';
                }else{
                    $mau = '#996600';
                }
                        echo "{
                            name:'$row[1]',
                            y:$row[13],
                            color: '$mau',
                            drilldown:'$row[1]'
                        },
                        ";
                    }
                }
                ?>]
            }],
            drilldown: {
                title: {
                    text: 'Biểu đồ AQI thông sôtp.HCM',
                },
                series: [
                <?php 
                $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
                $select_data= "SELECT * from $filename_ngay";
                $result = pg_query($conn,"$select_data");
                if ($result == true){
                    while ($row = pg_fetch_row($result)) {
                        echo "
                        {
                            id: '$row[1]',
                            name: '$row[1]',
                            color: 'yellow',
                            data:[
                            ['AQI_SO2',$row[5]],
                            ['AQI_NO2',$row[7]],
                            ['AQI_TSP',$row[9]]
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
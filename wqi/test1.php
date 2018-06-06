<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">ok</div>


<script type="text/javascript">
            $(function () {    
    var defaultTitle = "Biểu đồ AQI giờ trạm " ; 
    var drilldownTitle = "Biểu đồ AQI thông số trạm";
    // Create the chart
    var chart = new Highcharts.Chart({
        chart: {
            
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
                text : 'Giá trị WQI',
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
            color : 'red',
            data: [<?php
            $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
            $select_databieudo = "SELECT * FROM $filename WHERE tentram = '$tentram'and  to_char(\"thoigian\",'yyyy/mm') ='2017/02'" ; 
            $result = pg_query($conn,"$select_databieudo");
            if($result==true){
                while($row = pg_fetch_array($result)){
                    $mau="";
                    if($row['wqi_tram']>=0 && $row['wqi_tram']<=50){
                        $mau= '#7cb5ec';
                    }elseif ($row['wqi_tram']>=51 && $row['wqi_tram']<=100) {
                        $mau= '#ffff00';
                    }elseif($row['wqi_tram']>=101 && $row['wqi_tram']<=200){
                        $mau = '#ffa31a';}else{$mau = '#996600';}
                        echo "{
                            name:'$row[4]',
                            y:$row[24],
                            type: 'line',
                            color: '$mau',
                            drilldown:'$row[4]'
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
                $select_data= "SELECT * FROM $filename WHERE tentram = '$tentram'and  to_char(\"thoigian\",'yyyy/mm') ='2017/02'";
                $result = pg_query($conn,"$select_data");
                if ($result == true){
                    while ($row = pg_fetch_row($result)) {
                        echo "
                        {
                            type: 'column',
                            id: '$row[4]',
                            name: '$row[4]',
                            data:[
                            ['WQI_BO2',$row[15]],
                            ['AQI_CO2',$row[16]],
                            ['AQI_N',$row[17]]
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
 Highcharts.chart('container', {
    xAxis: {
        min: -0.5,
        max: 5.5
    },
    yAxis: {
        min: 0
    },
    title: {
        text: 'Scatter plot with regression line'
    },

    tooltip: {
        shared: true,
        useHTML: true,
        headerFormat: '<small>{point.key}</small><table>',
        pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' +
            '<td style="text-align: right"><b>{point.y} EUR</b></td></tr>',
     },
    series: [{
        type: 'line',
        name: 'Regression Line',
        data: [[0, 1.11], [5, 4.51]],
        marker: {
            enabled: false,
        },
        states: {
            hover: {
                lineWidth: 0
            }
        },
        enableMouseTracking: false
    }, {
        type: 'scatter',
        name: 'Observations',
        data: [1, 1.5, 2.8, 3.5, 3.9, 4.2],
        marker: {
            radius: 4
        }
    }]
});
 </script>

<div style="height: 500px" id='map'></div>
<script type="text/javascript">
	L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
	var map = L.mapbox.map('map', 'mapbox.streets')
	.setView([10.6,106.9], 10);
	var myLayer = L.mapbox.featureLayer().addTo(map);
</script>
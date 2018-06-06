<div class="card">
<?php
	if(isset($_GET['filename'])){
		$filename_h = $_GET['filename'];
		$filename_ngay = $_GET['filename'].'_ngay';
		?>
	<form method="POST">
	<div class="row" style="margin-right: 15px">
		<div class="col-md-2 pull-right">
			<div class="form-group">
				<label for="sel1"><b>Thời gian</b></label>
				<select class="form-control" id="sel1" name="thoigian1">
					<option selected value="chonthoigian" name="demo">- Chọn thời gian-</option>
					<?php
					$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
					$select_thoigian = "SELECT distinct to_char(\"thoigian\", 'DD/MM/YYYY') FROM $filename_ngay order by to_char(\"thoigian\", 'DD/MM/YYYY') asc";
					$result_thoigian = pg_query($conn,"$select_thoigian");
					if($result_thoigian==true){
						while($row_thoigian = pg_fetch_array($result_thoigian)){
							?>
                  <option value="<?php echo "$row_thoigian[0]"?>"><?php echo $row_thoigian[0]; ?></option>
                  <?php }}else{echo "that bai";} ?>
				</select>
				<button type="submit" class="btn btn-primary btn-md" name="xembando">Xem</button>
				<input type="file" name="">
			</div>
		</div>
		<div class="col-md-9 pull-right">
			<div id='map-two' class='map' style="height: 500px;">
				<script>
					L.mapbox.accessToken = 'pk.eyJ1Ijoia3ViaW4yNCIsImEiOiJjajA5ajNrZTAwMDNmMnFucnczb3R6dnc3In0.qB1t4HllwMKFsyUvcb-5LA';
					var mapTwo = L.mapbox.map('map-two', 'mapbox://styles/mapbox/satellite')
					.setView([10.6,106.9], 10);

					var myLayer = L.mapbox.featureLayer().addTo(mapTwo);

					var geojson = [

					<?php
						if(isset($_POST['xembando'])){
							$thoigian = $_POST['thoigian1'];
							$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin");
    						$select_aqi = "SELECT * FROM $filename_ngay WHERE to_char(\"thoigian\", 'DD/MM/YYYY')='$thoigian'" ;
    						$result = pg_query($conn,"$select_aqi");
    						$test = 0;
    						if($result == true){
    							while($row = pg_fetch_array($result)){
    								$test = $row['aqi_ngay_tram'] ;
						echo"{
								type:'Feature',
								geometry:{
									type:'Point',
									coordinates: [106.7740225, 10.67234316]
								},
								properties: {
									icon: {
        								className: 'my-icon icon-tot', // class name to style
        								html: '<b><h3>$test</h3></b>', // add content inside the marker
        								iconSize: null // size of icon, use null to set the size in CSS
   									}
								}
							},";
						}
					 ?>

					// {
					// 	type: 'Feature',
					// 	geometry: {
					// 		type: 'Point',
					// 		coordinates: [106.7740225
					// 		, 10.67234316
					// 		]
					// 	},
					// 	properties: {
					// 		icon: {
     //    						className: 'my-icon icon-tot', // class name to style
     //    						html: '<b><h3>2</h3></b>', // add content inside the marker
     //    						iconSize: null // size of icon, use null to set the size in CSS
   		// 					}
					// 	}
					// },
					];
<?php }} ?>
myLayer.on('layeradd', function(e) {
	var marker = e.layer,
	feature = marker.feature;
	marker.setIcon(L.divIcon(feature.properties.icon));
});
myLayer.setGeoJSON(geojson);

var imageUrl = 'img/son.png',
    // This is the trickiest part - you'll need accurate coordinates for the
    // corners of the image. You can find and create appropriate values at
    // http://maps.nypl.org/warper/ or
    // http://www.georeferencer.org/
    imageBounds = L.latLngBounds([
         [
       [ 10.373897,
   106.679344

    ],

    ],
        [
      10.743694,
      107.070708
    ]
    ]);
    var mapTwo = L.mapbox.map('map-two', 'mapbox.streets')
					.fitBounds(imageBounds);
					var overlay = L.imageOverlay(imageUrl, imageBounds)
    .addTo(mapTwo);
</script>
			</div>
		</div>
	</div>
	</form>
	<?php } ?>
</div>
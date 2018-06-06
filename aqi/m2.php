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
					$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
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
			<div id='map' style="height: 500px;">
				<script>
					L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
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
    var map = L.mapbox.map('map', 'mapbox.streets')
    .fitBounds(imageBounds);
    var overlay = L.imageOverlay(imageUrl, imageBounds)
    .addTo(map);
    var layerList = document.getElementById('menu');
var inputs = layerList.getElementsByTagName('input');

function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/mapbox/' + layerId + '-v9');
}

for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
}
</script>
			</div>
		</div>
	</div>
	</form>
	<?php } ?>
</div>

<?php
        $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
        $select ="SELECT * from chon_dulieufilebando where chiso ='WQI'";
        $resut=pg_query($conn,"$select");
        $tieude = '';
        $top = '';
        $bottom = '';
        $left = '';
        $right = '';
        $tenfile = '';
        if($resut==true){
            while($row=pg_fetch_array($resut)){
                $tieude =$row['tieude'];
                $top =$row['top'];
                $bottom = $row['bottom'];
                $left = $row['leftt'];
                $right =  $row['rightt'];
                $tenfile = $row['tenfile'];
            }
        }
    ?>

 <div class="col-md-offset-1" style="margin-bottom: 15px;"><h4><?php echo "$tieude "; ?></h4></div>
 <div id="map" class="col-md-7;" style="height: 500px;margin-bottom: 20px;"></div>
<script type="text/javascript">
	L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
     var imageUrl ="img/<?php echo $tenfile.".png" ?>";             
    // This is the trickiest part - you'll need accurate coordinates for the
    // corners of the image. You can find and create appropriate values at
    // http://maps.nypl.org/warper/ or
    // http://www.georeferencer.org/
    
    imageBounds = L.latLngBounds([
        <?php echo"[ $left,$bottom],
        [$right,$top]"; ?>
        ]);
    var map = L.mapbox.map('map', 'mapbox.streets')
    .fitBounds(imageBounds).setView([10.590488,106.858045], 10);
    var overlay = L.imageOverlay(imageUrl, imageBounds)
    .addTo(map);
</script>
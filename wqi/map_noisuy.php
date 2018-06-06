<script type="text/javascript">
	L.mapbox.accessToken = 'pk.eyJ1Ijoid2ViZ2lzIiwiYSI6ImNqMW9qcGFseDAxM3gyd3BpeXI5Z2t4dnoifQ.eupIYbTkAg8_0xqMmXgCJw';
                var imageUrl = <?php
                if(isset($_POST['bandonoisuy'])){
                $tenhinh = $_POST['tenlayer']; 
                 echo "'img/$tenhinh.png'";    
                }
                
                ?>;
    // This is the trickiest part - you'll need accurate coordinates for the
    // corners of the image. You can find and create appropriate values at
    // http://maps.nypl.org/warper/ or
    // http://www.georeferencer.org/
    imageBounds = L.latLngBounds([
        [ 10.373897,106.679344],
        [10.743694,107.070708]
        ]);
    var map = L.mapbox.map('map', 'mapbox.streets')
    .fitBounds(imageBounds);
    var overlay = L.imageOverlay(imageUrl, imageBounds)
    .addTo(map);
</script>
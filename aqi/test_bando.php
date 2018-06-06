<div class=" card">
  <div class="row">
  <div class="col-md-2 pull-right" style="margin-right: 30px">
      
        <label for="sel1"><b>Thời gian</b></label>
        <select class="form-control" id="sel1" name="thoigian_option">
          <option selected value="chonthoigian">- Chọn thời gian-</option>
          <?php 
              $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
              $select_thoigian = "SELECT distinct to_char(\"thoigian\", 'DD/MM/YYYY') FROM $filename_ngay order by to_char(\"thoigian\", 'DD/MM/YYYY') asc"; 
              $result_thoigian = pg_query($conn,"$select_thoigian");
              if($result_thoigian==true){
                while($row_thoigian = pg_fetch_array($result_thoigian)){
                  ?>
                  <option value="<?php echo "$row_thoigian[0]"?>"><?php echo $row_thoigian[0]; ?></option>
                  <?php }} ?>
        </select>
        <input type="text" class="form-control" id="tiem kiem" placeholder="dd/mm/yyyy..." name="txtthoigian">
        <button type="submit" class="btn btn-primary btn-md" name="xembando">Xem</button>
      
      <?php
      if(isset($_POST['xembando'])){
        echo "ok";
      }  
      ?>
    </div> <!-- truy van -->
    <div class="col-md-9 pull-left">
      <div id='map-two' class='map' style="height: 500px;"></div>
      <script>
        L.mapbox.accessToken = 'pk.eyJ1Ijoia3ViaW4yNCIsImEiOiJjajA5ajNrZTAwMDNmMnFucnczb3R6dnc3In0.qB1t4HllwMKFsyUvcb-5LA';
        var mapTwo = L.mapbox.map('map-two', 'mapbox.streets')
        .setView([10.6,106.9], 10);

        var myLayer = L.mapbox.featureLayer().addTo(mapTwo);

        var geojson = [

        {
          type: 'Feature',
          geometry: {
            type: 'Point',
            coordinates: [106.7740225
            , 10.67234316
            ]
          },
          properties: {
            icon: {
        className: 'my-icon icon-tot', // class name to style
        html: '<b><h3>2</h3></b>', // add content inside the marker
        iconSize: null // size of icon, use null to set the size in CSS
      }
    }
  },
  ];
  myLayer.on('layeradd', function(e) {
    var marker = e.layer,
    feature = marker.feature;
    marker.setIcon(L.divIcon(feature.properties.icon));
  });
  myLayer.setGeoJSON(geojson);
</script>
</div> <!-- map -->

</div> <!-- content -->
</div>
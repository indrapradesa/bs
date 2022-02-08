<!DOCTYPE html>
<html>
<head>
  <style >
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Tutorial Google Map - Petani Kode</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrQ2BH7xnRCUao7mnUR2cvCNsXuNjEFp0&callback=initMap"></script>
    <script src="https://maps.googleapis.com/maps/api/streetview?size=600x300&location=46.414382,10.013988&heading=151.78&pitch=-0.76&key=AIzaSyDrQ2BH7xnRCUao7mnUR2cvCNsXuNjEFp0"></script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var peta = {
    center:new google.maps.LatLng(-7.9784695,112.5617418),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), peta);
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(peta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
  var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        peta.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        peta.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: peta,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          peta.fitBounds(bounds);
        });
      }
              
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVsRAmsrLve_kXqQNpzzQr_bIUxmQi7-U&libraries=places&callback=initAutocomplete"
         async defer></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Login CodeIgniter & Bootstrap</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>
              <a href="http://[::1]/dinasci/c_gmap" class="list-group-item"><i class="fa fa-map"></i> Map</a>
              <a href="http://[::1]/dinasci/c_status" class="list-group-item"><i class="fa fa-list-alt"></i> Status</a>
              <a href="http://[::1]/dinasci/user" class="list-group-item"><i class="fa fa-users"></i> Master User</a>
              <a href="http://[::1]/dinasci/c_userad" class="list-group-item"><i class="fa fa-user-circle"></i> Master User Android</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>
              <input id="pac-input" class="controls" type="text" placeholder="Search Box">
              <div id="googleMap" style="width:100%;height:380px;"></div>
                <?php echo form_open('c_aa/simpan') ?>
                <input type="hidden" name="id_status" value="" />
                <div>
                 <div class="form-group">
                <label for="text">Nama BS</label>
                <input type="text" name="namabs" class="form-control" placeholder="Masukkan Nama Bank Sampah">
              </div>

                <input type="hidden" id="lat" name="lat" class="form-control">
                <input type="hidden" id="lng" name="lng" class="form-control" >

              <div class="form-group">
                <label for="text">Tanggal</label>
                <input type="date" name="tgl" class="form-control" >
              </div>

              <div class="form-group">
                <label for="text">Sampah</label>
                <input type="text" name="sampah" class="form-control" placeholder="Masukkan Jumlah Sampah">
              </div>

              <button type="submit" class="btn btn-md btn-success">Simpan</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button>
            <?php echo form_close() ?>
          </div>
        </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
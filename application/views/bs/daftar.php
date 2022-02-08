<!DOCTYPE html>
<html>
<head>
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
  var propertiPeta = {
    center:new google.maps.LatLng(-7.982954,112.63267),
    zoom:10,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVsRAmsrLve_kXqQNpzzQr_bIUxmQi7-U&libraries=places&callback=initAutocomplete"async defer></script>
</head>
<body>
  <?php echo form_open_multipart('c_bs/c_daftar/add_image') ?>
               <div class="form-group">
                 <label>Nama Penggurus</label>
                   <input type="text" class="form-control" id="n_penggurus" name="n_penggurus">
                 </div>
                 <label>Alamat</label>
                   <input type="text" class="form-control" id="alamat" name="alamat">
                 </div>
                 <label>Email</label>
                   <input type="text" class="form-control" id="email" name="email">
                 </div>
                 <label>Username</label>
                   <input type="text" class="form-control" id="username" name="username">
                 </div>
                 <label>Password</label>
                   <input type="Password" class="form-control" id="password" name="password">
                 </div>
                 <label>Nama BS</label>
                   <input type="text" class="form-control" id="nama_bs" name="nama_bs">
                 </div>
               <div class="form-group">
                 <label>Foto KTP</label>
                   <input type="file" class="form-control" id="userfile" name="userfile">
                 </div>
                 <div class="form-group">
                 <label>Foto SK</label>
                   <input type="file" class="form-control" id="sk" name="sk">
                 </div>
               <input type="submit" class="btn btn-primary" value="Upload">
             <?php form_close() ?> 
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
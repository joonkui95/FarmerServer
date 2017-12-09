@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div id="map-container">
        <div id="map"></div>
      </div>
      <script src="markerclusterer.js"></script>
      <script>
      function initialize() {
        var center = new google.maps.LatLng(51.5074, 0.1278);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(51.5074, 0.1278)
        });
        markers.push(marker);

        var options = {
          imagePath: 'images/m'
        };

        var markerCluster = new MarkerClusterer(map, markers, options);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
      </script>
    </div>
  </div>
</div>
@endsection
@extends('admin.users.template')

@section('body')

<h1 class="page-title">Vehicles Tracking

</h1>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i>Manage Vehicles </div>
            </div>


            <div class="portlet-body flip-scroll">


                <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>


            </div>
        </div>
    </div>
</div>
<style>
    #map_wrapper {
        height: 700px;
    }

    #map_canvas {
        width: 100%;
        height: 100%;
    }

</style>
<script>
    jQuery(function ($) {
        var script = document.createElement('script');
        script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
        document.body.appendChild(script);
    });

    var map;
    function initialize() {
        
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);
        var markers = <?= json_encode($marker) ?>
  
  
        var infoWindow = new google.maps.InfoWindow(), marker, i;

        // Loop through our array of markers & place each one on the map  
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window    
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent(markers[i][3]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
            this.setZoom(20);
            google.maps.event.removeListener(boundsListener);
        });

    }

</script>



<script>


function generateMarkers(locations) {
    for (var i = 0; i < locations.length; i++) {  
      new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        title: locations[i][0]
      });
    }
  }





</script>

@endsection

@extends('admin.users.template')

@section('body')

<h1 class="page-title">Vehicles Tracking
 <small></small>
     @include('common.newBooking')
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
        script.src = "//maps.googleapis.com/maps/api/js?sensor=false&key={{ env('GOOGLE_API_KEY') }}";
        document.body.appendChild(script);
    });

    var map;
    var bounds;
    var markersPush = [];
    function initialize() {
        bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);

    }
    function generateMarkers(markers) {
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        
        var image = {          
          url: '<?= URL::to('images/car.png') ?>',         
         
        };
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: image,
                title: markers[i][0]
            });
            markersPush.push(marker);
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent(markers[i][3]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
            this.setZoom(10);
            google.maps.event.removeListener(boundsListener);
        });

    }
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markersPush[i].setMap(map);
        }
        markersPush=[];
      }

</script>



<script>




    window.onload = function () {
        markers = <?= json_encode($marker) ?>;
        initialize();
        generateMarkers(markers);
        setInterval(function () {
            $.ajax({
                url: "{{ route('vehicles-tracking-ajax') }}",
                type: "GET",
                dataType:"JSON",
                success: function (data) {
                    if(data.status){
                        setMapOnAll(null);
                        generateMarkers(data.data);
                    }
                }
            });
        }, 100000);
    }


</script>

@endsection

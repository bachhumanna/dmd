@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw"></script>
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;        
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            
            new google.maps.places.SearchBox(document.getElementById('txtSource1'));
            new google.maps.places.SearchBox(document.getElementById('txtSource2'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                //unitSystem: google.maps.UnitSystem.MITER,
                unitSystem: google.maps.UnitSystem.IMPERIAL,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;

                    var distancee = response.rows[0].elements[0].distance.value;
                    var durationn = response.rows[0].elements[0].duration.value;
                    var distanceecost = Math.round((distancee*0.00062)*<?= $allprice->cost_per_mile ?>);
                    var durationncost = Math.round((durationn/3600)*<?= $allprice->driver_cost ?>);
                    var companionshipcost = Math.round((durationn/900)*<?= $allprice->companionship_cost ?>);
                    var totalcost =(distanceecost+durationncost+companionshipcost);

                    var dvDistance = document.getElementById("dvDistance");


                    //distancek = document.getElementById("distance").value;
                    //durationk = document.getElementById("duration").value;

                    //alert(companionshipcost);
                    //exit();

                    $("#distance").val(distance)
                    $("#duration").val(duration)
                    $("#totalcost").val(totalcost)



                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "<h4><b>"+"Distance: " + distance + "</b></h4>";
                    dvDistance.innerHTML += "<h4><b>"+"Duration:" + duration + "</b></h4>";
                    dvDistance.innerHTML += "<h4><b>"+"Fare:" + totalcost +".00"+"</b></h4>";


                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
    
    



<h1 class="page-title">Booking
    <small></small>
</h1>

    
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Create 
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'booking.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">


<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Driver</label>
                        <div class="col-md-9">
                            {!! Form::select('driver_id',$alluser, null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('driver_id'); ?></span>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name</label>
                        <div class="col-md-9">
                            {!! Form::text('username', null, array('placeholder' => 'User Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('username'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Note</label>
                        <div class="col-md-9">
                            {!! Form::textarea('note', null, array('placeholder' => 'Note','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('note'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Booking Date</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_time', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'autofill'=>"false")) !!}
                            <span class="bg-danger"><?= $errors->first('booking_time'); ?></span>
                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Booking Location</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_location', null, array('placeholder' => 'Booking Location','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('booking_location'); ?></span>
                        </div>
                    </div>-->
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Source</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_location', null, array('placeholder' => 'Source','class' => 'form-control','id' => 'txtSource')) !!}
                            <span class="bg-danger"><?= $errors->first('booking_location'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Source1</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_location_one', null, array('placeholder' => 'Source 1','class' => 'form-control','id' => 'txtSource1')) !!}
                            <span class="bg-danger"><?= $errors->first('booking_location_one'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Source2</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_location_two', null, array('placeholder' => 'Source 2','class' => 'form-control','id' => 'txtSource2')) !!}
                            <span class="bg-danger"><?= $errors->first('booking_location_two'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Destination</label>
                        <div class="col-md-9">
                            {!! Form::text('destination', null, array('placeholder' => 'Destination','class' => 'form-control','id' => 'txtDestination')) !!}
                            <span class="bg-danger"><?= $errors->first('destination'); ?></span>
                        </div>
                    </div>
                    <input type="button" value="Get Route" onclick="GetRoute()" />
                    <table border="0" cellpadding="0" cellspacing="3">
                <!--        <tr>
                            <td colspan="2">
                                Source:
                                <input type="text" id="txtSource" value="Bandra, Mumbai, India" style="width: 200px" />
                                &nbsp; Destination:
                                <input type="text" id="txtDestination" value="Andheri, Mumbai, India" style="width: 200px" />
                                <br />
                                <input type="button" value="Get Route" onclick="GetRoute()" />
                                <hr />
                            </td>
                        </tr>-->
                        <tr>
                            <td colspan="2">
                                <div id="dvDistance">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div id="dvMap" style="width: 500px; height: 500px;">
                                    
                                </div>
                            </td>           
                        </tr>
                    </table>
                    
                    {!! Form::hidden('distance', null, array('id' => 'distance')) !!}
                    {!! Form::hidden('duration', null, array('id' => 'duration')) !!}
                    {!! Form::hidden('totalcost', null, array('id' => 'totalcost')) !!}
                    


                    <div class="form-actions right1">
                        <button type="submit" class="btn green submitForm">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

    

    
    
    
    
 
<!--    <script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

    <script>
        $('.date-picker').datepicker({
        dateFormat: 'YY-mm-dd'
        });
        //    $('.date-picker').datepicker({
        //            orientation: "left",
        //            autoclose: true
        //    });

    </script>-->
    
<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
<script>
    $('.date-picker').datetimepicker({
         //dateFormat: 'yyyy-MM-dd HH:mm'
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//            autoclose: true
//    });

</script>
<!--<script>
function submitForm() {
  return confirm('Do you really want to submit the form?');
  
}
</script>-->

<script>
    $('.submitForm').on('click', function(e){

        e.preventDefault();
        var form = $(this).parents('form');
        swal({
        title: "Are you sure?",
                text: "Do you really want to submit the form?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes",
                closeOnConfirm: false
        },
                function (isConfirm) {
                if (isConfirm) {
                form.submit();
                }
                });
        });
</script>
@endsection

@extends('admin.home.template')
@section('body')
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
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['booking.update', $model->id], 'class'=>'form-horizontal booking_form','id'=>'booking_form']) !!}
                <div class="form-body">
                    <?php //pr($model->toArray()); 
                    //die();
                    ?>
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', $model->client->firstname, array('placeholder' => 'Client Name','class' => 'form-control','id'=>'search_text','disabled' => 'true')) !!}
                            {!! Form::hidden('franchisees_id', null) !!}
                            {!! Form::hidden('custom_price', null,['id'=>'custom_price']) !!}
                            <span class="bg-danger validation_error error_name"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Surname</label>
                        <div class="col-md-9">
                            {!! Form::text('surname', $model->client->surname, array('placeholder' => 'Surname','class' => 'form-control surname','disabled' => 'true')) !!}
                            <span class="bg-danger validation_error error_surname"><?= $errors->first('surname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', $model->client->email, array('placeholder' => 'Client Email','class' => 'form-control email','disabled' => 'true')) !!}
                            <span class="bg-danger validation_error error_email"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Mobile Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phone_number', $model->client->phone, array('placeholder' => 'Client Mobile Number','class' => 'form-control phone_number','disabled' => 'true')) !!}
                            <span class="bg-danger validation_error error_phone_number"><?= $errors->first('phone_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Client Home Number</label>
                        <div class="col-md-9">
                            {!! Form::text('home_number', $model->client->home_number, array('placeholder' => 'Client Home Number','class' => 'form-control home_number','disabled' => 'true')) !!}
                            <span class="bg-danger validation_error error_home_number"><?= $errors->first('home_number'); ?></span>
                        </div>
                    </div>
                    
                    <!--                    <div class="form-group">
                                            <label class="col-md-3 control-label">Address</label>
                                            <div class="col-md-9">
                                                {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control address')) !!}
                                                <span class="bg-danger validation_error error_address"><? = $errors->first('address'); ?></span>
                                            </div>
                                        </div>-->

                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">
                            {!! Form::text('house_number', $model->client->house_number, array('placeholder' => 'Locality','class' => 'form-control house_number','disabled' => 'true')) !!}
                            <span class="bg-danger"><?= $errors->first('house_number'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', $model->client->street, array('placeholder' => 'Street','class' => 'form-control street','disabled' => 'true')) !!}
                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('city', $model->client->city, array('placeholder' => 'City','class' => 'form-control city','disabled' => 'true')) !!}
                            <span class="bg-danger"><?= $errors->first('city'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), null ,array('placeholder' => 'Please Select','class' => 'form-control','disabled' => 'true')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', $model->client->postcode, array('placeholder' => 'postcode','class' => 'form-control postcode','disabled' => 'true')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Note</label>
                        <div class="col-md-9">
                            {!! Form::textarea('note', null, array('placeholder' => 'Note','class' => 'form-control','cols'=>0,'rows'=>0)) !!}
                            <span class="bg-danger validation_error error_note"><?= $errors->first('note'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Booking Date Time</label>
                        <div class="col-md-9">
                            {!! Form::text('booking_time', date("Y-m-d H:i",strtotime($model->booking_time)), array('placeholder' => 'Booking Date Time','class' => 'form-control date-picker', "autocomplete"=>"off")) !!}
                            <span class="bg-danger validation_error error_booking_time"><?= $errors->first('booking_time'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Base Location</label>
                        <div class="col-md-9">
                            {!! Form::text('base_location', null, array('placeholder' => 'Base Location','class' => 'form-control','readonly'=>'readonly','id'=>'base_location')) !!}
                            <span class="bg-danger validation_error error_base_location"><?= $errors->first('base_location'); ?></span>
                        </div>
                    </div>


                    <?php foreach ($model->pickupLocation as $pickupLocation) { ?>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Pickup Location A</label>
                            <div class="col-md-5">
                                {!! Form::text('pickup_location[1]', $pickupLocation->location_name, array('placeholder' => 'Pickup Location','class' => 'form-control','id' => 'pickup_location1','onfocus'=>'allowForLocation(1)', 'onblur'=>"distanceCalculator(1)")) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::text('pickup_distance[1]', $pickupLocation->distance, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_1')) !!}

                            </div>
                            <div class="col-md-2">
                                {!! Form::text('travel_time[1]', $pickupLocation->travel_time, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_1')) !!}

                            </div>
                            <div class="col-md-5 col-md-offset-3">
                                <span class="bg-danger validation_error error_pickup_location_1"><?= $errors->first('pickup_location.1'); ?></span>
                            </div>
                            <div class="col-md-2">
                                <span class="bg-danger validation_error error_pickup_distance_1"><?= $errors->first('pickup_location.2'); ?></span>
                            </div>
                        </div>

                    <?php } ?>



                    <div class="form-group">
                        <label class="col-md-3 control-label">Drop Location</label>
                        <div class="col-md-5">
                            {!! Form::text('drop_location', $model->dropLocation->location_name, array('placeholder' => 'Drop Location','class' => 'form-control ','id' => 'drop_location',  'onblur'=>"distanceCalculator(4)" )) !!}
                            <span class="bg-danger validation_error error_drop_location"><?= $errors->first('drop_location'); ?></span>
                        </div>
                        <div class="col-md-2">
                            {!! Form::text('drop_location_distance', $model->dropLocation->distance, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_4')) !!}
                            <span class="bg-danger validation_error error_drop_location_distance"><?= $errors->first('drop_location_distance'); ?></span>
                        </div>
                        <div class="col-md-2">
                            {!! Form::text('drop_location_travel_time', $model->dropLocation->travel_time, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_4')) !!}
                            <span class="bg-danger validation_error error_drop_location_travel_time"><?= $errors->first('drop_location_travel_time'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Outward Companion</label>
                        <div class="col-md-3">
                            {!! Form::text('outward_companion', null, array('placeholder' => 'Outward Companion','class' => 'form-control' )) !!}
                            <span class="bg-danger validation_error error_outward_companion"><?= $errors->first('outward_companion'); ?></span>
                        </div>
                        <label class="col-md-3 control-label">Outward 	Waiting</label>
                        <div class="col-md-3">
                            {!! Form::text('outward_waiting', null, array('placeholder' => 'Outward Waiting time','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_outward_waiting"><?= $errors->first('outward_waiting'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Comfort Break</label>
                        <div class="col-md-9">
                            {!! Form::select('comfort_break',[0,1,2,3,4,5,6,7,8,9,10], null ,array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('comfort_break'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Who is paying bill</label>
                        <div class="col-md-9">
                            {!! Form::select('paying_bill',payingBill(false), null ,array('placeholder' => 'Please Select','class' => 'form-control paying_bill')) !!}
                            <?php 
                            if($model->paying_bill == 'other'){
                                echo Form::text('who_paying_bill', null ,array('class' => 'form-control who_paying_bill'));
                            }else{
                                echo Form::text('who_paying_bill', null ,array('class' => 'form-control who_paying_bill','style'=>"display:none"));
                            }
                            ?>
                            <span class="bg-danger"><?= $errors->first('paying_bill'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Payment Mode</label>
                        <div class="col-md-9">
                            {!! Form::select('payment_mode',paymentMode(), null ,array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('payment_mode'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Journey Type</label>
                        <div class="col-md-9">
                            {!! Form::select('journey_type',[1=>'One way',2=>"Return"], null ,array('class' => 'form-control journeyType','onchange'=>'journeyType(this.value)')) !!}
                            <span class="bg-danger"><?= $errors->first('journey_type'); ?></span>
                        </div>

                    </div>


                    <div class="form-group return_journy_container">
                        <label class="col-md-3 control-label">Return Companion</label>
                        <div class="col-md-3">
                            {!! Form::text('return_companion', null, array('placeholder' => 'Return Companion','class' => 'form-control','id' => 'txtDestination')) !!}
                            <span class="bg-danger"><?= $errors->first('return_companion'); ?></span>
                        </div>
                        <label class="col-md-3 control-label">Return 	Waiting</label>
                        <div class="col-md-3">
                            {!! Form::text('return_waiting', null, array('placeholder' => 'Return Waiting time','class' => 'form-control','id' => 'txtDestination')) !!}
                            <span class="bg-danger"><?= $errors->first('return_waiting'); ?></span>
                        </div>
                    </div>
                    <div class="form-group return_journy_container">
                        <label class="col-md-3 control-label">Is this a long return</label>
                        <div class="col-md-3">
                            {!! Form::select('long_return',[0=>"No", 1=>'Yes'], null ,array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('long_return'); ?></span>
                        </div>
                        <label class="col-md-3 control-label"> Drop off point to base distance</label>
                        <div class="col-md-3">
                            {!! Form::text('drop_off_to_base', null ,array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('drop_off_to_base'); ?></span>
                        </div>
                    </div>


                    <div class="form-actions right1">
                        <a  class="btn green submitForm">Submit</a>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

</div>

@endsection
@section('pagescript')
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>






<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $("#search_text").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('searchajax') }}",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        response(data);
                    },

                });
            },
            select(event, ui) {
                $(".surname").val(ui.item.surname);
                $(".email").val(ui.item.email);
                $(".phone_number").val(ui.item.phone_number);
                $(".house_number").val(ui.item.house_number);
                $(".street").val(ui.item.street);
                $(".city").val(ui.item.city);
                $(".county").val(ui.item.county);
                $(".postcode").val(ui.item.postcode);
                $(".home_number").val(ui.item.home_number);
            },
            minLength: 1,

        });
    });
</script>
<script>
    $('.date-picker').datetimepicker({
        autoclose: true
    });
</script>
<script>
    function calculatePricing() {
        $.ajax({
            url: "{{ route('booking-price') }}",
            data: $(".booking_form").serialize(),
            type: "POST",
            async: false,
        }).done(function (response) {

            if (response.response == 0) {
                $.each(response.errors, function (key, value) {
                    key = key.replace(".", "_");
                    $(".error_" + key).html(value);
                });
            } else {
                var form = $(this).parents('form');
                var form = $("#booking_form");

                var span = document.createElement("span");
                span.innerHTML = response.html;

                swal({
                    content: span,
                    buttons: {
                        cancel: "Cancel",
                        pricechange: {
                            text: "Change Price",
                            value: "changeprice",
                        },
                        confirm: "Confirm",

                    },
                }).then((value) => {
                    switch (value) {
                        case true:
                            swal("Success!", "Please Wait!", "success");
                            form.submit();
                            break;
                        case "changeprice":
                            manualPriceing();
                            break;
                        case null:
                            swal.close();
                            break
                        default:
                            form.submit();

                    }
                });
            }
        });
    }
    function journeyType(id) {
        if (id == 1) {
            $('.return_journy_container').hide();
        } else {
            $('.return_journy_container').show();
        }
    }

    $('.submitForm').on('click', function (e) {
        e.preventDefault();
        $(".validation_error").html("");
        calculatePricing();





    });
    function manualPriceing() {
        var form = $(".booking_form");
        swal("Please Enter your Price:", {
            content: "input",
            buttons: {
                cancel: "Cancel",
                confirm: {
                    text: "Submit",
                    closeModal: false
                }
            }
        }).then((value) => {
            switch (value) {
                case null:
                    swal.close();
                    break
                default:
                    if (value == "") {
                        manualPriceing();
                    } else {
                        var regexp = /^\d+(\.\d{1,2})?$/;
                        if (regexp.test(value)) {
                            $('#custom_price').val(value);
                            calculatePricing()
                            //form.submit();
                        } else {
                            manualPriceing();
                        }
                    }
            }
        });
    }


    $(document).ready(function () {
        journeyType($('.journeyType').val());
    })
</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw"></script>
<script>

    google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('drop_location'), options);
        google.maps.event.addListener(dropAutocomplete, 'place_changed', function () {
            //distanceCalculator(4);
        });
        dropAutocompleteL1 = new google.maps.places.Autocomplete(document.getElementById('pickup_location1'), options);
        google.maps.event.addListener(dropAutocompleteL1, 'place_changed', function () {
            //distanceCalculator(1);
        });
        dropAutocompleteL2 = new google.maps.places.Autocomplete(document.getElementById('pickup_location2'), options);
        google.maps.event.addListener(dropAutocompleteL2, 'place_changed', function () {
            //distanceCalculator(2);
        });
        dropAutocompleteL3 = new google.maps.places.Autocomplete(document.getElementById('pickup_location3'), options);
        google.maps.event.addListener(dropAutocompleteL3, 'place_changed', function () {
            // distanceCalculator(3);
        });
    });

    var notAllow = false;
    function allowForLocation(id, _this) {
        $(".form-control").removeClass('error');
        notAllow = false;
        pickup_location = ['pickup_location1', 'pickup_location2', 'pickup_location3'];
        currentLocation = pickup_location[id - 1];
        console.log(currentLocation);
        focusElement = "";
        if (currentLocation == 'pickup_location2') {
            console.log("Insile Id");
            if ($("#pickup_location1").val() == "") {
                console.log("Location 1 is empty");
                notAllow = true;
            }
            focusElement = "pickup_location1";
        }

        if (currentLocation == 'pickup_location3') {
            if ($("#pickup_location1").val() == "") {
                notAllow = true;
                focusElement = "pickup_location1";
            } else if ($("#pickup_location2").val() == "") {
                notAllow = true;
                focusElement = "pickup_location2";
            }

        }
        if (notAllow) {
            $("#" + focusElement).addClass("error");
        }

    }


    function distanceCalculator(id) {

        console.log("distanceCalculator Function");
        if (notAllow) {
            console.log("distanceCalculator Function");
            //  return false;
        }

        locations = ['base_location', 'pickup_location1', 'pickup_location2', 'pickup_location3', 'drop_location'];
        console.log(id);
        if (id == 4) {
            $(".form-control").removeClass('error');
            pickup_location = ['pickup_location3', 'pickup_location2', 'pickup_location1'];
            source = "";
            $.each(pickup_location, function (key, value) {
                source = $("#" + value).val();
                if (source) {
                    return false;
                }
            });
            if (source == "") {
                swal(
                        {
                            title: "Please select pickup location",
                            type: "info",
                            //text: "Please select pickup first",

                        });
                return false;
            }

            destination = $("#drop_location").val();
        } else {
            sourcePosition = (id - 1);
            source_id = locations[sourcePosition];
            source = $("#" + source_id).val();

            destination_id = locations[id];
            destination = $("#" + destination_id).val();
        }

        console.log("Source " + source);
        console.log("Destination " + destination);

        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.IMPERIAL,
            avoidHighways: false,
            avoidTolls: false
        }, function (response, status) {
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {

                //console.log(response);
                var distance = response.rows[0].elements[0].distance.value;
                var duration = response.rows[0].elements[0].duration.value;
                distanceinMile = distance * 0.00062137;
                distanceinMile = distanceinMile.toFixed(2);
                //distanceinMile = parseFloat(distance);
                //distanceinMile  = Math.round(distanceinMile * 100) / 10
                travelTime = Math.round(duration / 60);

                console.log("#pickup_distance_" + id);

                $(".pickup_distance_" + id).val(distanceinMile)
                $(".travel_time_" + id).val(travelTime)

            } else {
                alert("Unable to find the distance via road.");
            }
        });
    }










$(".paying_bill").on('change',function(){
        if(this.value == "other"){
            $('.who_paying_bill').show();
        }else{
            $('.who_paying_bill').hide();
            $('.who_paying_bill').val("");
        }
    })

</script>


@endsection


@section('pagestyle')
<style>
    .error{
        border: 1px solid red;
    }
</style>
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
@endsection
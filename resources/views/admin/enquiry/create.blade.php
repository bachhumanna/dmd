@extends('admin.home.template')
@section('body')


<?php 

$days = [
    'Sunday' => 'Sunday',
    'Monday' => 'Monday',
    'Tuesday' => 'Tuesday',
    'Wednesday' => 'Wednesday',
    'Thursday' => 'Thursday',
    'Friday' => 'Friday',
    'Saturday' => 'Saturday'
];
   
?>




<h1 class="page-title">Quotes
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
                {!! Form::open(array('route' => 'enquiry.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal booking_form','id'=>'booking_form')) !!}
                <div class="form-body">




                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Client Details</legend>                    

                            <div class="form-group">
                                <label class="col-md-3 control-label">First name</label>
                                <div class="col-md-9">
                                    {!! Form::text('name', null, array('placeholder' => 'First Name','class' => 'form-control','id'=>'search_text')) !!}
                                    {!! Form::hidden('custom_price', null,['id'=>'custom_price']) !!}


                                    <span class="bg-danger validation_error error_name"><?= $errors->first('name'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Surname</label>
                                <div class="col-md-9">
                                    {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control surname')) !!}
                                    <span class="bg-danger validation_error error_surname"><?= $errors->first('surname'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control email')) !!}
                                    <span class="bg-danger validation_error error_email"><?= $errors->first('email'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile</label>
                                <div class="col-md-9">
                                    {!! Form::text('phone_number', null, array('placeholder' => 'Mobile','class' => 'form-control phone_number')) !!}
                                    <span class="bg-danger validation_error error_phone_number"><?= $errors->first('phone_number'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Landline</label>
                                <div class="col-md-9">
                                    {!! Form::text('home_number', null, array('placeholder' => 'Landline','class' => 'form-control home_number')) !!}
                                    <span class="bg-danger validation_error error_home_number"><?= $errors->first('home_number'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Address 1</label>
                                <div class="col-md-9">
                                    {!! Form::text('address', null, array('placeholder' => 'Enter postcode or address','class' => 'form-control address','id'=>'client_addres')) !!}
                                    <span class="bg-danger validation_error error_address">
<?= $errors->first('address'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address 2</label>
                                <div class="col-md-9">
                                    {!! Form::text('house_number', null, array('placeholder' => 'Enter house name or number','class' => 'form-control house_number')) !!}
                                    <span class="bg-danger validation_error error_house_number"><?= $errors->first('house_number'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Notes</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('note', null, array('placeholder' => 'Notes','class' => 'form-control','cols'=>0,'rows'=>0)) !!}
                                    <span class="bg-danger validation_error error_note"><?= $errors->first('note'); ?></span>
                                </div>
                            </div>

                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Companion Drivers & Vehicle</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Companion Drivers</label>
                                <div class="col-md-3">
                                    <!--                                {!! Form::select('driver_id', $drivers, @$model->driver->user_id,['placeholder'=>'Select Driver','class'=>'form-control']) !!}-->

                                    <select class="form-control" name="driver_id" id="driver_id">
                                        <option value="">Select Companion Drivers</option>
<?php foreach ($drivers as $driver) { ?>

                                            <option value="{{ $driver['driver'] }}" rel='{{ $driver['id'] }}' >{{ $driver['name'] }}</option>
<?php } ?>
                                    </select>
                                    <span class="bg-danger validation_error error_name"><?= $errors->first('vehicle_id'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Vehicles</label>
                                <div class="col-md-3">
                                    {!! Form::select('vehicle_id', $vehicles, @$model->driver->vehicle_id,['placeholder'=>'Select Vehicle','class'=>'form-control vehicle_id']) !!}
                                    <span class="bg-danger validation_error error_name"><?= $errors->first('vehicle_id'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Booking</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Journey Date</label>
                                <div class="col-md-9">
                                    {!! Form::text('booking_time', null, array('placeholder' => 'Booking Date Time','class' => 'form-control date-picker', "autocomplete"=>"off")) !!}
                                    <span class="bg-danger validation_error error_booking_time"><?= $errors->first('booking_time'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Base Location</label>
                                <div class="col-md-9">
                                    {!! Form::text('base_location', $franchiseeModel->base_location, array('placeholder' => 'Base Location','class' => 'form-control','readonly'=>'readonly','id'=>'base_location')) !!}
                                    <span class="bg-danger validation_error error_base_location"><?= $errors->first('base_location'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pickup 1</label>
                                <div class="col-md-5">
                                    {!! Form::text('pickup_location[1]', null, array('placeholder' => 'Pickup 1','class' => 'form-control','id' => 'pickup_location1','onfocus'=>'allowForLocation(1)', 'onblur'=>"distanceCalculator(1)")) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('pickup_distance[1]', null, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_1')) !!}

                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('travel_time[1]', null, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_1')) !!}

                                </div>
                                <div class="col-md-5 col-md-offset-3">
                                    <span class="bg-danger validation_error error_pickup_location_1"><?= $errors->first('pickup_location.1'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    <span class="bg-danger validation_error error_pickup_distance_1"><?= $errors->first('pickup_location.2'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pickup 2</label>
                                <div class="col-md-5">
                                    {!! Form::text('pickup_location[2]', null, array('placeholder' => 'Pickup 2','class' => 'form-control','id' => 'pickup_location2','onfocus'=>'allowForLocation(2)', 'onblur'=>"distanceCalculator(2)")) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('pickup_distance[2]', null, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_2')) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('travel_time[2]', null, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_2')) !!}
                                </div>
                                <div class="col-md-5 col-md-offset-3">
                                    <span class="bg-danger validation_error error_pickup_location_2"><?= $errors->first('pickup_location.2'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    <span class="bg-danger validation_error error_pickup_distance_2"><?= $errors->first('pickup_location.2'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pickup 3</label>
                                <div class="col-md-5">
                                    {!! Form::text('pickup_location[3]', null, array('placeholder' => 'Pickup 3','class' => 'form-control','id' => 'pickup_location3','onfocus'=>'allowForLocation(3)'  ,'onblur'=>"distanceCalculator(3)")) !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('pickup_distance[3]', null, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_3')) !!}

                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('travel_time[3]', null, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_3')) !!}
                                </div>
                                <div class="col-md-5 col-md-offset-3">
                                    <span class="bg-danger validation_error error_pickup_location_3"><?= $errors->first('pickup_location.3'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    <span class="bg-danger validation_error error_pickup_distance_3"><?= $errors->first('pickup_location.2'); ?></span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-3 control-label">Destination</label>
                                <div class="col-md-5">
                                    {!! Form::text('drop_location', null, array('placeholder' => 'Destination','class' => 'form-control ','id' => 'drop_location',  'onblur'=>"distanceCalculator(4)" )) !!}
                                    <span class="bg-danger validation_error error_drop_location"><?= $errors->first('drop_location'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('drop_location_distance', null, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_4')) !!}
                                    <span class="bg-danger validation_error error_drop_location_distance"><?= $errors->first('drop_location_distance'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('drop_location_travel_time', null, array('placeholder' => 'Travel Time','class' => 'form-control travel_time_4')) !!}
                                    <span class="bg-danger validation_error error_drop_location_travel_time"><?= $errors->first('drop_location_travel_time'); ?></span>
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Journey Type</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {!! Form::select('journey_type',[1=>'One way',2=>"Return"], null ,array('class' => 'form-control journeyType','onchange'=>'journeyType(this.value)')) !!}
                                                    <span class="bg-danger"><?= $errors->first('journey_type'); ?></span>
                                                </div>


                                                <label class="col-md-2 control-label">Invoice to</label>
                                                <div class="col-md-2">
                                                    {!! Form::select('paying_bill',payingBill(false), null ,array('placeholder' => 'Please Select','class' => 'form-control paying_bill')) !!}
                                                    {!! Form::text('who_paying_bill', null ,array('class' => 'form-control who_paying_bill','style'=>'display:none')) !!}
                                                    <div class="row payment_clientid" style='display:none'>
                                                        <div class="col-md-10">
                                                            {!! Form::select('payment_clientid', $client ,null ,array('class' => 'form-control payment_clientid_element', 'placeholder' => 'Please Select')) !!}

                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="btn btn-success" data-fancybox data-type="ajax" data-src="{{ route('client-addpopup') }}">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <span class="bg-danger validation_error error_paying_bill"><?= $errors->first('payment_clientid'); ?></span>
                                                </div>

                                                <label class="col-md-2 control-label">Payment Mode</label>
                                                <div class="col-md-3">
                                                    {!! Form::select('payment_mode',paymentMode(), null ,array('class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('payment_mode'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>


                            <div class="form-group return_journy_container">
                                <label class="col-md-3 control-label">Is this a long return</label>
                                <div class="col-md-3">
                                    {!! Form::select('long_return',[0=>"No", 1=>'Yes'], null ,array('class' => 'form-control long_return_element','onchange'=>'longReturnBase(this.value)')) !!}
                                    <span class="bg-danger"><?= $errors->first('long_return'); ?></span>
                                </div>

                                <label class="col-md-3 control-label journey_return_date">RTN Journey Date</label>
                                <div class="col-md-3 journey_return_date">
                                    {!! Form::text('journey_return_date', null ,array('class' => 'form-control   date-picker ')) !!}
                                    <span class="bg-danger"><?= $errors->first('journey_return_date'); ?></span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Base Return</label>
                                <div class="col-md-3">
                                    {!! Form::select('base_return',[ 1=>'Yes',0=>"No"], null ,array('class' => 'form-control','onchange'=>'longReturn(this.value)')) !!}
                                    <span class="bg-danger"><?= $errors->first('base_return'); ?></span>
                                </div>
                                <!--                                <label class="col-md-3 control-label"> Distance</label>-->
                                <div class="col-md-3">
                                    {!! Form::text('drop_off_to_base', null ,array('class' => 'form-control drop_off_to_base','placeholder'=>'Distance')) !!}
                                    <span class="bg-danger"><?= $errors->first('drop_off_to_base'); ?></span>
                                </div>                                
                                <div class="col-md-3">
                                    {!! Form::text('drop_off_to_base_time', null ,array('class' => 'form-control drop_off_to_base_time','placeholder'=>"Time")) !!}
                                    <span class="bg-danger"><?= $errors->first('drop_off_to_base_time'); ?></span>
                                </div>                                
                            </div>


                            <div class="form-group">

                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Assistance</legend>
                            <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                                <legend class="scheduler-border label label-sm label-info">Outward Journey</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Out Assist</label>
                                    <div class="col-md-2">
                                        {!! Form::text('outward_companion', null, array('placeholder' => 'Time (mins)','class' => 'form-control' )) !!}
                                        <span class="bg-danger validation_error error_outward_companion"><?= $errors->first('outward_companion'); ?></span>
                                    </div>
                                    <label class="col-md-2 control-label">Out Wait</label>
                                    <div class="col-md-2">
                                        {!! Form::text('outward_waiting', null, array('placeholder' => 'Time (mins)','class' => 'form-control')) !!}
                                        <span class="bg-danger validation_error error_outward_waiting"><?= $errors->first('outward_waiting'); ?></span>
                                    </div>


                                    <label class="col-md-2 control-label">Breaks</label>
                                    <div class="col-md-2">
                                        {!! Form::select('comfort_break',[0,1,2,3,4,5,6,7,8,9,10], null ,array('class' => 'form-control')) !!}
                                        <span class="bg-danger"><?= $errors->first('comfort_break'); ?></span>
                                    </div>


                                </div>

                            </fieldset>

                            <fieldset class="scheduler-border col-md-9 col-md-offset-3 return_journy_container">
                                <legend class="scheduler-border label label-sm label-info">Return Journey</legend>
                                <div class="form-group ">
                                    <label class="col-md-2 control-label">RTN Assist</label>
                                    <div class="col-md-2">
                                        {!! Form::text('return_companion', null, array('placeholder' => 'Time (mins)','class' => 'form-control','id' => 'txtDestination')) !!}
                                        <span class="bg-danger"><?= $errors->first('return_companion'); ?></span>
                                    </div>
                                    <label class="col-md-2 control-label">RTN Wait</label>
                                    <div class="col-md-2">
                                        {!! Form::text('return_waiting', null, array('placeholder' => 'Time (mins)','class' => 'form-control','id' => 'txtDestination')) !!}
                                        <span class="bg-danger"><?= $errors->first('return_waiting'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Breaks</label>
                                        <div class="col-md-2">
                                            {!! Form::select('return_comfort_break',[0,1,2,3,4,5,6,7,8,9,10], null ,array('class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('return_comfort_break'); ?></span>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                        </fieldset>
                    </div>























 

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3 miscellaneous_charge">
                            <legend class="scheduler-border label label-sm label-success">Miscellaneous Charges</legend>




                            <div class="form-group m_charge">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Description" name="misc_description[]" type="text">
                                            <span class="bg-danger"></span>  
                                        </div>
                                         
                                        <div class="col-md-4">
                                            <input class="form-control  calculation customfee" placeholder="Amount" name="misc_amount[]" type="text">
                                            <span class="bg-danger"></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>










                        </fieldset>
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
<script>
    $(document).ready(function () {
        //$('.time-picker').mdtimepicker({format: 'hh:mm'});
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
                event.preventDefault();
                $(".surname").val(ui.item.surname);
                $(".email").val(ui.item.email);
                $(".phone_number").val(ui.item.phone_number);
                $(".house_number").val(ui.item.house_number);
                $(".home_number").val(ui.item.home_number);
                $("#client_addres").val(ui.item.address);
                $("#search_text").val(ui.item.firstname);
                $("#client_health_notes").val(ui.item.client_health_notes);
            },
            minLength: 1,

        });
    });
</script>
<script>
    function longReturn(value) {
        if (value == 1) {
            source = "{{ $franchiseeModel->base_location }}";
            destination = $("#drop_location").val()
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

                    //console.log("#pickup_distance_" + id);

                    $(".drop_off_to_base").val(distanceinMile)
                    $(".drop_off_to_base_time").val(travelTime)
                    //$(".travel_time_" + id).val(travelTime)

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        } else {
            $('.drop_off_to_base').val(0);
            $('.drop_off_to_base_time').val(0);
        }

    }
    $('.date-picker').datetimepicker({
        autoclose: true
    });
</script>
<script>
    

    $("#driver_id").on('change', function () {
        $this = $(this);
        if ($this.val() != "") {
            vehicle_id = $this.find('option:selected').attr('rel');
            if (vehicle_id > 0) {
                $(".vehicle_id").val(vehicle_id);
            } else {
                $(".vehicle_id").val("");
            }
        }

    });
    function calculatePricing() {
        $.ajax({
            url: "{{ route('enquery-price') }}",
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

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
 
<script>
     google.maps.event.addDomListener(window, 'load', function () {
        var options = {
          componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
         
    });
</script>
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
        if (notAllow) {
            //  return false;
        }

        locations = ['base_location', 'pickup_location1', 'pickup_location2', 'pickup_location3', 'drop_location'];

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

        console.log("Source -> " + source);
        console.log("Destination -> " + destination);

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

                //console.log("#pickup_distance_" + id);

                $(".pickup_distance_" + id).val(distanceinMile)
                $(".travel_time_" + id).val(travelTime)

            } else {
                alert("Unable to find the distance via road.");
            }
        });
    }



  $(".paying_bill").on('change', function () {
        $(".payment_clientid").hide();
//        if (this.value == "other") {
//            $('.who_paying_bill').show();
//        } else {
        $('.who_paying_bill').hide();
        $('.who_paying_bill').val("");
        if (this.value == "other") {
            //$('select.payment_clientid').select2()
            $(".payment_clientid").show();
        }
        // }
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
@endsection
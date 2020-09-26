@extends('admin.home.template')
@section('body')
<h1 class="page-title">Bookings
    <small></small>
</h1>

<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Edit
                </div>
            </div>
            <?php
            //pr($errors->all());

           // pr($model->toarray());exit;
            ?>
            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['booking.update', $model->id], 'class'=>'form-horizontal booking_form','id'=>'booking_form']) !!}

                <div class="form-body">
                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success"> </legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Booking Was Made</label>
                                <div class="col-md-9">

                                    {!! Form::select('booking_source',bookingWasMade(), null ,array('class' => 'form-control')) !!}
                                    <span class="bg-danger validation_error error_companion_driver_companion"><?= $errors->first('booking_source'); ?></span>
                                </div>
                            </div>

                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Companion Drivers or Companion</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Companion Drivers</label>
                                <div class="col-md-9">
                                    {!! Form::select('companion_driver_companion',[1=>'Companion Driver only',2=>"Companion Driver and Companion"], $model->companion_driver_companion ,array('class' => 'form-control companion_driver_companion','onchange'=>'companionType(this.value)')) !!}
                                    <span class="bg-danger validation_error error_companion_driver_companion"><?= $errors->first('companion_driver_companion'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Booking Or Quote</label>
                                <div class="col-md-9">
                                    {!! Form::select('booking_or_quotes',[1=>'Booking',2=>"Quote"], null ,array('class' => 'form-control')) !!}
                                    <span class="bg-danger validation_error error_booking_or_quotes"><?= $errors->first('booking_or_quotes'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Client Details</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Client</label>
                                <div class="col-md-4">
                                    {!! Form::text('name', $model->client->firstname, array('placeholder' => 'Name','class' => 'form-control','id'=>'search_text','disabled' => 'true')) !!}
                                    {!! Form::hidden('franchisees_id', null) !!}
                                    {!! Form::hidden('custom_price', null,['id'=>'custom_price']) !!}
                                    <span class="bg-danger validation_error error_name"><?= $errors->first('name'); ?></span>
                                </div>
                                <div class="col-md-5">
                                    {!! Form::text('surname', $model->client->surname, array('placeholder' => 'Surname','class' => 'form-control surname','disabled' => 'true')) !!}
                                    <span class="bg-danger validation_error error_surname"><?= $errors->first('surname'); ?></span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact Details</label>
                                <div class="col-md-3">
                                    {!! Form::text('phone_number', $model->client->phone, array('placeholder' => 'Mobile','class' => 'form-control phone_number','disabled' => 'true')) !!}
                                    <span class="bg-danger validation_error error_phone_number"><?= $errors->first('phone_number'); ?></span>
                                </div>

                                <div class="col-md-3">
                                    {!! Form::text('home_number', $model->client->home_number, array('placeholder' => 'Landline','class' => 'form-control home_number','disabled' => 'true')) !!}
                                    <span class="bg-danger validation_error error_home_number"><?= $errors->first('home_number'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('email', $model->client->email, array('placeholder' => 'Email','class' => 'form-control email','disabled' => 'true')) !!}
                                    <span class="bg-danger validation_error error_email"><?= $errors->first('email'); ?></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-3">
                                    {!! Form::text('address', $model->client->address, array('placeholder' => 'Enter postcode or address','class' => 'form-control address','disabled' => 'true')) !!}
                                    <span class="bg-danger validation_error error_address"><?= $errors->first('address'); ?></span>
                                </div>


                                <label class="col-md-3 control-label">Mobility</label>
                                <div class="col-md-3">
                                    {!! Form::text('mobility', mobilityLevel($model->client->mobility_level), array('readonly'=>"readonly",'placeholder' => 'Mobility','class' => 'form-control address','id'=>'client_mobility')) !!}
                                    <span class="bg-danger validation_error error_address">
                                        <?= $errors->first('mobility'); ?></span>
                                </div>
                            </div>


                            <?php /* ?>
                              <div class="form-group">
                              <label class="col-md-3 control-label">Address 2</label>
                              <div class="col-md-9">
                              {!! Form::text('house_number', $model->client->house_number, array('placeholder' => 'Enter house name or number','class' => 'form-control house_number','disabled' => 'true')) !!}
                              <span class="bg-danger"><?= $errors->first('house_number'); ?></span>
                              </div>
                              </div>
                              <?php */ ?>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Notes</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('note', null, array('placeholder' => 'Notes','class' => 'form-control','cols'=>0,'rows'=>0)) !!}
                                    <span class="bg-danger validation_error error_note"><?= $errors->first('note'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Permanent Notes</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('Client Notes', $model->client->client_health_notes, array('cols'=>0,'rows'=>0,'placeholder' => '','class' => 'form-control house_number','disabled' => 'true')) !!}
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Companion Driver & Vehicle</legend>
                            <?php /*
                              <div class="form-group">
                              <label class="col-md-3 control-label">Companion Driver</label>
                              <div class="col-md-3">
                              {!! Form::select('driver_id', $drivers, @$model->driver->user_id,['placeholder'=>'Select Companion Driver','class'=>'form-control']) !!}
                              <span class="bg-danger validation_error error_driver_id"><?= $errors->first('vehicle_id'); ?></span>
                              </div>

                              <label class="col-md-3 control-label">Vehicles</label>
                              <div class="col-md-3">
                              {!! Form::select('vehicle_id', $vehicles, @$model->driver->vehicle_id,['placeholder'=>'Select Vehicle','class'=>'form-control']) !!}
                              <span class="bg-danger validation_error error_vehicle_id"><?= $errors->first('vehicle_id'); ?></span>
                              </div>
                              </div>
                             */ ?>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Companion Drivers</label>
                                <div class="col-md-3">
                                    <!--                                {!! Form::select('driver_id', $drivers, @$model->driver->user_id,['placeholder'=>'Select Driver','class'=>'form-control']) !!}-->

                                    <select class="form-control" name="driver_id" id="driver_id">
                                        <option value="">Select Companion Drivers</option>
                                        <?php foreach ($drivers as $driver) { ?>

                                            <option value="{{ $driver['driver'] }}" <?php if (isset($driver['driver'])) { ?> selected="selected" <?php } ?>  address="{{ $driver['address'] }}" rel='{{ $driver['id'] }}' >{{ $driver['name'] }}</option>
                                        <?php } ?>
                                    </select>
                                    <span class="bg-danger validation_error error_driver_id"><?= $errors->first('driver_id'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Vehicles</label>
                                <div class="col-md-3">
                                    {!! Form::select('vehicle_id', $vehicles, @$model->driver->vehicle_id,['placeholder'=>'Select Vehicle','class'=>'form-control vehicle_id']) !!}
                                    <span class="bg-danger validation_error error_vehicle_id"><?= $errors->first('vehicle_id'); ?></span>
                                </div>
                            </div>



                            <div class="form-group companiontypecompanion"
                            <?php if ($model->companion_driver_companion == 2) { ?>
                                     style="display:block;"
                                 <?php } else { ?>
                                     style="display:none;"
                                 <?php } ?>
                                 >
                                <label class="col-md-3 control-label">Companion</label>
                                <div class="col-md-3">
                                    {!! Form::select('companion_id', $companionsdrivers, null, array('placeholder' => 'Select Companion','class' => 'form-control')) !!}
                                    <span class="bg-danger validation_error error_companion_id"><?= $errors->first('companion_id'); ?></span>
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
                                    @php $journey_date = ($model->booking_time) ? showStandardDate($model->booking_time) : null; @endphp
                                   
                                    {!! Form::text('booking_time', $journey_date, array('placeholder' => 'Booking Date Time','class' => 'form-control update-details date-picker-booking_time', "autocomplete"=>"off", 'id' => 'booking_time')) !!}
                                    <span class="bg-danger validation_error error_booking_time"><?= $errors->first('booking_time'); ?></span>
                                </div>

                            </div>

                            <div class="form-group late_booking_container">
                                <label class="col-md-3 control-label">Booking Date</label>

                                <div class="col-md-3">
                                    @php $booking_date = ($model->created_at) ? showStandardDate($model->created_at) : null; @endphp

                                    {!! Form::text('created_at', $booking_date, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', "autocomplete"=>"off", 'id' => 'booking_time')) !!}
                                    <span class="bg-danger validation_error error_create_time"><?= $errors->first('create_time'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('late_booking_reason', null, array('placeholder' => 'Reason for late booking','class' => 'form-control', "autocomplete"=>"off", 'id' => 'booking_time')) !!}
                                    <span class="bg-danger validation_error error_late_booking_reason"><?= $errors->first('late_booking_reason'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Select Driver or Franchise address</label>
                                <div class="col-md-9">
                                    {!! Form::select('franchise_driver_address',[1=>'Franchise address',2=>"Driver address",3=>"New address",4=>"None"], null ,array('class' => 'form-control','id' => 'franchise_driver_address','onchange'=>'selectAddressType(this.value)')) !!}
                                    <span class="bg-danger validation_error error_companion_driver_companion"><?= $errors->first('franchise_driver_address'); ?></span>
                                </div>
                            </div>

                            <?php /*
                              <div class="form-group">
                              <label class="col-md-3 control-label">Base Location</label>
                              <div class="col-md-9">
                              {!! Form::text('base_location', null, array('placeholder' => 'Base Location','class' => 'form-control','readonly'=>'readonly','id'=>'base_location')) !!}
                              <span class="bg-danger validation_error error_base_location"><?= $errors->first('base_location'); ?></span>
                              </div>
                              </div>
                             */ ?>
                            <div class="form-group franchiseaddress">
                                <label class="col-md-3 control-label">Base Location</label>
                                <div class="col-md-9">
                                    {!! Form::text('base_location', $franchiseeModel->base_location, array('placeholder' => 'Base Location','class' => 'form-control update-details','id'=>'base_location')) !!}
                                    <span class="bg-danger validation_error error_base_location"><?= $errors->first('base_location'); ?></span>
                                </div>
                            </div>
                            <?php
                            foreach ($model->pickupLocation as $key => $pickupLocation) {
                                $count = $key + 1;
                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address <?= $count ?></label>
                                    <div class="col-md-5">
                                        {!! Form::text("pickup_location[$count]", $pickupLocation->location_name, array('placeholder' => 'Address Location','class' => 'form-control update-details','id' => "pickup_location$count",'onfocus'=>'allowForLocation(1)', 'onblur'=>"distanceCalculator(1)")) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::text("pickup_distance[$count]", $pickupLocation->distance, array('placeholder' => 'Distance','class' => "form-control pickup_distance_$count")) !!}

                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::text("travel_time[$count]", $pickupLocation->travel_time, array('placeholder' => 'Travel Time','class' => "form-control travel_time travel_time_$count")) !!}

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
                                <label class="col-md-3 control-label">Destination</label>
                                <div class="col-md-5">
                                    {!! Form::text('drop_location', $model->dropLocation->location_name, array('placeholder' => 'Drop Location','class' => 'form-control update-details','id' => 'drop_location',  'onblur'=>"distanceCalculator(4)" )) !!}
                                    <span class="bg-danger validation_error error_drop_location"><?= $errors->first('drop_location'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('drop_location_distance', $model->dropLocation->distance, array('placeholder' => 'Distance','class' => 'form-control pickup_distance_4')) !!}
                                    <span class="bg-danger validation_error error_drop_location_distance"><?= $errors->first('drop_location_distance'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('drop_location_travel_time', $model->dropLocation->travel_time, array('placeholder' => 'Travel Time','class' => 'form-control travel_time travel_time_4')) !!}
                                    <span class="bg-danger validation_error error_drop_location_travel_time"><?= $errors->first('drop_location_travel_time'); ?></span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Journey Type</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    {!! Form::select('journey_type',[1=>'One way',2=>"Return"], null ,array('class' => 'form-control journeyType','onchange'=>'journeyType(this.value)')) !!}
                                                    <span class="bg-danger"><?= $errors->first('journey_type'); ?></span>
                                                </div>


                                                <label class="col-md-4 control-label">Invoice to</label>
                                                <div class="col-md-4">
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
                                                <div style="display:none">
                                                    <label class="col-md-4 control-label">Payment Mode</label>
                                                    <div class="col-md-4">
                                                        {!! Form::select('payment_mode',paymentMode(), null ,array('class' => 'form-control')) !!}
                                                        <span class="bg-danger"><?= $errors->first('payment_mode'); ?></span>
                                                    </div>
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
                                    {!! Form::text('journey_return_date', null ,array('class' => 'form-control   date-picker-journey_return_date ')) !!}
                                    <span class="bg-danger"><?= $errors->first('journey_return_date'); ?></span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Base Return</label>
                                <div class="col-md-3">
                                    {!! Form::select('base_return',[ 1=>'Yes',0=>"No"], null ,array('class' => 'form-control base_return','onchange'=>'longReturn(this.value)')) !!}
                                    <span class="bg-danger"><?= $errors->first('base_return'); ?></span>
                                </div>
                                <!--                                <label class="col-md-3 control-label"> Distance</label>-->
                                <div class="col-md-3">
                                    {!! Form::text('drop_off_to_base', null ,array('class' => 'form-control drop_off_to_base','placeholder'=>'Distance')) !!}
                                    <span class="bg-danger"><?= $errors->first('drop_off_to_base'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('drop_off_to_base_time', null ,array('class' => 'form-control travel_time drop_off_to_base_time','placeholder'=>"Time")) !!}
                                    <span class="bg-danger"><?= $errors->first('drop_off_to_base_time'); ?></span>
                                </div>
                            </div>

                            <div class="form-group companiontypecompanion" style="display:<?= $model->companion_driver_companion ? "block" : "none" ?>">
                                <label class="col-md-3 control-label">Companion Time</label>
                                <div class="col-md-3">
                                    {!! Form::text('companion_time', null ,array('class' => 'form-control companion_time','placeholder'=>"Time")) !!}
                                    <span class="bg-danger"><?= $errors->first('companion_time'); ?></span>
                                </div>
                            </div>





                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Assistance</legend>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Out Assist</label>
                                <div class="col-md-2">
                                    {!! Form::text('outward_companion', null, array('placeholder' => 'Outward Companion','class' => 'form-control' )) !!}
                                    <span class="bg-danger validation_error error_outward_companion"><?= $errors->first('outward_companion'); ?></span>
                                </div>
                                <label class="col-md-2 control-label">Out Wait</label>
                                <div class="col-md-2">
                                    {!! Form::text('outward_waiting', null, array('placeholder' => 'Outward Waiting time','class' => 'form-control')) !!}
                                    <span class="bg-danger validation_error error_outward_waiting"><?= $errors->first('outward_waiting'); ?></span>
                                </div>

                                <label class="col-md-2 control-label">Breaks</label>
                                <div class="col-md-2">
                                    {!! Form::select('comfort_break',[0,1,2,3,4,5,6,7,8,9,10], null ,array('class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('comfort_break'); ?></span>
                                </div>


                            </div>

                            <div class="form-group return_journy_container">
                                <label class="col-md-2 control-label">RTN Assist</label>
                                <div class="col-md-2">
                                    {!! Form::text('return_companion', null, array('placeholder' => 'Return Companion','class' => 'form-control','id' => 'txtDestination')) !!}
                                    <span class="bg-danger"><?= $errors->first('return_companion'); ?></span>
                                </div>
                                <label class="col-md-2 control-label">RTN Wait  </label>
                                <div class="col-md-2">
                                    {!! Form::text('return_waiting', null, array('placeholder' => 'Return Waiting time','class' => 'form-control','id' => 'txtDestination')) !!}
                                    <span class="bg-danger"><?= $errors->first('return_waiting'); ?></span>
                                </div>


                                <label class="col-md-2 control-label">Breaks</label>
                                <div class="col-md-2">
                                    {!! Form::select('return_comfort_break',[0,1,2,3,4,5,6,7,8,9,10], null ,array('class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('return_comfort_break'); ?></span>

                                </div>



                            </div>
                        </fieldset>
                    </div>


















                    <div class="form-group" style="display: none">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Repeat</legend>





                            <div class="form-group">
                                <label class="col-md-3 control-label">Repeat</label>
                                <div class="col-md-9">
                                    {!! Form::select('repeat_type',repetType() , null, ['class'=>'form-control repeattype','onchange'=>'repeattype(this.value)']) !!}
                                    <span class="bg-danger validation_error error_booking_date"><?= $errors->first('repeat_type'); ?></span>
                                </div>
                            </div>
                            <div class="repeat-type-all">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Start Date Time</label>
                                    <div class="col-md-9">
                                        {!! Form::text('repeat_booking_time', null, array('placeholder' => 'Date Time','class' => 'form-control date-picker', "autocomplete"=>"off")) !!}
                                        <span class="bg-danger validation_error error_booking_date"><?= $errors->first('repeat_booking_time'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">End Date Time</label>
                                    <div class="col-md-9">
                                        {!! Form::text('repeat_booking_endtime', null, array('placeholder' => 'End Date Time','class' => 'form-control date-picker', "autocomplete"=>"off")) !!}
                                        <span class="bg-danger validation_error error_booking_date"><?= $errors->first('repeat_booking_endtime'); ?></span>
                                    </div>
                                </div>
                            </div>



                        </fieldset>
                    </div>

                      <?php if ($model->advance_payment_amount) { ?>
                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3 miscellaneous_charge">
                            <legend class="scheduler-border label label-sm label-success">Advance Payment</legend>

                            <div class="form-group m_charge">
                                 <label class="col-md-3 control-label">Amount</label>
                                <div class="col-md-9">
                                    {!! Form::text('advance_payment_amount', null, array('placeholder' => '','class' => 'form-control', 'autocomplete' => 'off')) !!}
                                    <span class="bg-danger validation_error error_booking_date"><?= $errors->first('advance_payment_amount'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                     <?php } ?>

                    <?php if (count($model->invoice)) { ?>
                        <div class="form-group">
                            <fieldset class="scheduler-border col-md-9 col-md-offset-3 miscellaneous_charge">
                                <legend class="scheduler-border label label-sm label-success">Miscellaneous Charges</legend>


                                <?php foreach ($model->invoice as $miscellaneous) { ?>

                                    <div class="form-group m_charge">
                                        <label class="col-md-3 control-label"> </label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input class="form-control" placeholder="Description" name="misc_description[]"  value="{{ $miscellaneous->comment }}"  type="text">
                                                    <span class="bg-danger"></span>
                                                </div>

                                                <div class="col-md-4">
                                                    <input class="form-control  calculation customfee" placeholder="Amount" name="misc_amount[]"  value="{{ $miscellaneous->amount }}"  type="text">
                                                    <span class="bg-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>





                            </fieldset>
                        </div>
                    <?php } ?>
                    <div class="form-actions right1">
                        <a  class="btn green submitForm">Submit</a>
                        <a href="{{route('booking.index')}}" class="btn btn-danger">Cancel</a>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>






<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />



<!--<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>-->
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
        //autoclose: true,
        //format: 'YYYY-MM-DD HH:mm',
        format: 'MM/DD/YYYY HH:mm',

        sideBySide: true

    });
    $('.only-date-picker').datetimepicker({
        //format: 'YYYY-MM-DD HH:mm',
        format: 'MM/DD/YYYY HH:mm',

        sideBySide: true
    });



    $('.date-picker-booking_time').datetimepicker({
        //format: 'YYYY-MM-DD HH:mm',
        format: 'MM/DD/YYYY HH:mm',
        sideBySide: true
    });
    $('.date-picker-journey_return_date').datetimepicker({
        //format: 'YYYY-MM-DD HH:mm',

        format: 'MM/DD/YYYY HH:mm',

        sideBySide: true,
        useCurrent: false //Important! See issue #1075
    });
    $(".date-picker-booking_time").on("dp.change", function (e) {
        updateDistanceAndTime();
        $('.date-picker-journey_return_date').data("DateTimePicker").minDate(e.date);
    });
    $(".date-picker-journey_return_date").on("dp.change", function (e) {
        $('.date-picker-booking_time').data("DateTimePicker").maxDate(e.date);
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
        calculateCompanionTime();
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
        longReturnBase(0);
        repeattype($('.repeattype').val());
    })
    function repeattype(id) {

        if (id == 1) {
            $('.repeat-type-all').hide();
        } else {
            $('.repeat-type-all').show();
        }
    }
</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key={{ env('GOOGLE_API_KEY') }}"></script>
<script>

    google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        new google.maps.places.Autocomplete(document.getElementById('base_location'), options);

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
        //console.log(currentLocation);
        focusElement = "";
        if (currentLocation == 'pickup_location2') {
            //console.log("Insile Id");
            if ($("#pickup_location1").val() == "") {
                //console.log("Location 1 is empty");
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
            longReturn(1);
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
                swal({
                            title: "Please select pickup location",
                            type: "info",


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
        console.log('Destination Length'+destination.length + "Source Length "+source.length);
        if((source.length < 3) || (destination.length < 3)){
            return false;
        }
        console.log("I am Calling");

        var service = new google.maps.DistanceMatrixService();

        var booking_time = $("#booking_time").val();
        if(booking_time){
            var now = new Date();
            var d = new Date(Date.parse(booking_time)); // pass all the parameters you need to create the time
            if (now.getTime() > d.getTime()) {
                booking_time = null;
            }
        }
        travelDateAndTime = new Date(Date.parse(booking_time));
        console.log(travelDateAndTime);
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false,
            drivingOptions: {
                departureTime: travelDateAndTime,
                trafficModel: 'bestguess', // pessimistic , optimistic, bestguess
            },

        }, function (response, status) {
            if ((status == google.maps.DistanceMatrixStatus.OK) && (response.rows[0].elements[0].status != "NOT_FOUND")) {
                var distance = response.rows[0].elements[0].distance.value;
                var duration = response.rows[0].elements[0].duration.value;
                if(response.rows[0].elements[0].duration_in_traffic != undefined ){
                    var duration = response.rows[0].elements[0].duration_in_traffic.value;
                }


                console.log(response.rows[0].elements[0].duration.value);
                distanceinMile = distance * 0.00062137;
                distanceinMile = distanceinMile.toFixed(2);

                travelTime = Math.round(duration / 60);



                calculateCompanionTime();
                $(".pickup_distance_" + id).val(distanceinMile)
                $(".travel_time_" + id).val(travelTime)

            } else {
                console.log("Unable to find the distance via road.");
                console.log(response.error_message);
            }
        });

        calculateCompanionTime();

    }


    function distanceCalculator_OLD(id) {

        //console.log("distanceCalculator Function");
        if (notAllow) {
            console.log("distanceCalculator Function");
            //  return false;
        }

        locations = ['base_location', 'pickup_location1', 'pickup_location2', 'pickup_location3', 'drop_location'];
        //console.log(id);
        if (id == 4) {
            longReturn(1);
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
                            title: "Please select address location",
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

        //console.log("Source " + source);
        //console.log("Destination " + destination);

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
                calculateCompanionTime();
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


    function companionType(id) {
        if (id == 1) {
            $('.companiontypecompanion').hide();
        } else {
            $('.companiontypecompanion').show();
        }
    }

</script>

<script>
    $(".journey_return_date").hide();
    function longReturnBase(value) {
        value = $(".long_return_element").val();
        if (value == 1) {
            $(".journey_return_date").show();
        } else {
            $(".journey_return_date").hide();
        }
    }
    function longReturn(value) {
        if (value == 1) {
            source = "{{ $franchiseeModel->base_location }}";
            source = $("#base_location").val();
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
//    $('.date-picker').datetimepicker({
//        autoclose: true
//    });


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


    function companionType(id) {
        if (id == 1) {
            $('.companiontypecompanion').hide();
        } else {
            $('.companiontypecompanion').show();
        }

        calculateCompanionTime();
    }

    function selectAddressType(id) {
        var base_location_address = '{{ $franchiseeModel->base_location }}';
        if (id == 2) {

            address = $("#driver_id").find('option:selected').attr('address');
            //alert(address);
            $("#base_location").val(address);
        } else if (id == 3 || id == 4) {
            $("#base_location").val("");
        } else {
            $("#base_location").val(base_location_address);
        }
    }


    $("#pickup_location1").change(function () {
        var franchise_driver_address = $('#franchise_driver_address').val();
        var pickup_location1 = $('#pickup_location1').val();
        if (franchise_driver_address == 4) {

            $('#base_location').val(pickup_location1)
        }

    });
    function calculateCompanionTime() {
        companion_driver_companion = $(".companion_driver_companion").val();
        if (companion_driver_companion == 2) {
            travelTimeElements = ['travel_time_1', 'travel_time_2', 'travel_time_3', 'travel_time_4'];
            setTimeout(function () {
                companion_time = 0;
                $.each(travelTimeElements, function (key, value) {
                    val = $("." + value).val();
                    if (!isNaN(val)) {
                        companion_time = companion_time + (val * 1);
                    }
                });

                if ($('.journeyType').val() == 2) {
                    drop_off_to_base_time = $('.drop_off_to_base_time').val();
                    companion_time = companion_time * 2;
                }

                if ($('.base_return').val() == 1) {
                    drop_off_to_base_time = $('.drop_off_to_base_time').val();
                    companion_time = companion_time + (drop_off_to_base_time * 1);
                }

                $('.companion_time').val(companion_time);
            }, 1000);
        } else {
            $('.companion_time').val(0);
        }
    }
    $(".travel_time").keyup(function () {
        calculateCompanionTime();
    });


    function updateDistanceAndTime() {
        distanceCalculator(1);
        distanceCalculator(2);
        distanceCalculator(3);
        distanceCalculator(4);

    }
    setInterval(function () {
        pickup_location1 = $("#pickup_location1").val();
        if (pickup_location1 != "") {
           // updateDistanceAndTime();
        }
    }, 5000);


    $(document).on("change", "form input.update-details, form select", function () {
        pickup_location1 = $("#pickup_location1").val();
        if (pickup_location1 != "") {
            updateDistanceAndTime();
        }
    });

    $('.late_booking').click(function () {
        if (this.checked == false) {
            $(".late_booking_container").hide();
        } else {
            $(".late_booking_container").show();
        }
    });
    if($(".late_booking").is(":checked")){
         $(".late_booking_container").show();
    }
</script>
@endsection


@section('pagestyle')
<style>
    .error{
        border: 1px solid red;
    }
</style>
<!--<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />-->
@endsection

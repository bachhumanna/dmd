@extends('admin.faq.template')

@section('body')
<h1 class="page-title">Invoice
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Booking Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>ORDER # </th>
                            <td>{{ $model->order_id }}</td>
                        </tr>

                        <tr>
                            <th>Client Name </th>
                            <td>{{ $model->client->name }}</td>
                        </tr>
                        <tr>
                            <th>Client Mobile Number </th>
                            <td>{{ $model->client->phone }}</td>
                        </tr>
                        <tr>
                            <th>Client Email </th>
                            <td>{{ $model->client->email }}</td>
                        </tr>
                        <tr>
                            <th>Client Home Number</th>
                            <td>{{ $model->client->home_number }}</td>
                        </tr>

                        <tr>
                            <th>Client Home Address </th>
                            <td>{{ $model->client->address }}</td>
                        </tr>
                        <tr>
                            <th>Note </th>
                            <td>{{ $model->note}}</td>
                        </tr>
                        <tr>
                            <th>Who paying bill </th>
                            <td>{{ $model->paying_bill}} </br>{{ $model->who_paying_bill}}</td>
                        </tr>
                        <tr>
                            <th>Booking Time </th>
                            <td>{{ $model->booking_time }}</td>
                        </tr>
                        <tr>
                            <th>Base Location </th>
                            <td>{{ $model->base_location }}</td>
                        </tr>
                        <?php foreach ($model->pickupLocation as $key => $pickupLocation) { ?>
                            <tr>
                                <th>Pickup Location {{ $key+1 }}</th>
                                <td>{{ $pickupLocation->location_name }}</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>Drop Location </th>
                            <td>{{ $model->drop_location }}</td>
                        </tr>
                        <tr>
                            <th>Comfort Break </th>
                            <td>{{ $model->comfort_break }}</td>
                        </tr>
                        <tr>
                            <th>Distance </th>
                            <td>{{ $model->total_distance }} miles</td>
                        </tr>
                        <tr>
                            <th>Duration </th>
                            <td>{{ $model->total_duration }} Min</td>
                        </tr>
                        <tr>
                            <th>Quote Cost </th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->total_price }}</td>
                        </tr>
                        <tr>
                            <th>Final Cost </th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                        </tr>
                        <tr>
                            <th>Payment Mode </th>                            
                            <td>{{ $model->payment_mode ===1 ? "Cash" : "Credit" }}</td>
                        </tr>
						<tr>
                            <th>Payment Status </th>                            
                            <td>{{ $model->payment_status ===1 ? "Paid" : "Unpaid" }}</td>
                        </tr>
                        <tr>
                            <th>Booking Request Time </th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                         
                    </tbody>
                </table>
                 <?php if($model->allowDriverChage){ ?>
                    <div class="form-actions">
                        <a class="btn green" href="{{ route('booking.edit',$model->id) }}">Edit</a>

                    </div>
                 <?php } ?>
                

            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
        
     
        
        
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Companion Drivers & Vehicle Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                {!! Form::model($model, ['method' => 'POST', 'route' => ['booking.vehicle', $model->id], 'class'=>'form-horizontal']) !!}
                    <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                       
                        <?php if($model->allowDriverChage){ ?>
                        
                        <tr>
                            <th>Companion Drivers</th>
                            <td>
                                {!! Form::select('driver_id', $drivers, @$model->driver->user_id,['placeholder'=>'Select Driver','class'=>'form-control']) !!}
                                <span class="bg-danger validation_error error_name"><?= $errors->first('vehicle_id'); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Vehicle</th>
                            <td>
                                {!! Form::select('vehicle_id', $vehicles, @$model->driver->vehicle_id,['placeholder'=>'Select Vehicle','class'=>'form-control']) !!}
                                <span class="bg-danger validation_error error_name"><?= $errors->first('vehicle_id'); ?></span>
                            </td>
                        </tr>
                        <?php }else{ ?>
                            <tr>
                                <th>Companion Drivers Name</th>
                                <td>{{ @$model->driver->user->fullName }}</td>
                            </tr>

                            <tr>
                                <th>Contact No</th>
                                <td>{{ @$model->driver->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Vehicle Model</th>
                                <td>{{ @$model->driver->vehicle->vehicles_model }}</td>
                            </tr>

                            <tr>
                                <th>Vehicle Company</th>
                                <td>{{ @$model->driver->vehicle->vehicles_company }}</td>
                            </tr>
                            <tr>
                                <th>Vehicle Number</th>
                                <td>{{ @$model->driver->vehicle->vehicles_number }}</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                 
                {!! Form::close() !!}

            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

 


@endsection

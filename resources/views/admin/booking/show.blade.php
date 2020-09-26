@extends('admin.home.template')

@section('body')
<h1 class="page-title">Booking Request
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">


        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cab"></i>ORDER #  {{ $model->order_id  }}</div>
            </div>


        </div>
        <!-- END SAMPLE TABLE PORTLET-->





        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Companion Drivers</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>                       
                        <tr>
                            <th>Companion Drivers Or Companion</th>                            
                            <td>{{ $model->companion_driver_companion ===1 ? "Companion Driver only" : "Companion Driver and Companion" }}</td>
                        </tr>
                        <tr>
                            <th>Booking Or Quotes</th>                            
                            <td>{{ $model->booking_or_quotes ===1 ? "Booking" : "Quotes" }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>





        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Client Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>



                        <tr>
                            <th style="width: 30%">Client </th>
                            <td>{{ $model->client->name }}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{ $model->client->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->client->email }}</td>
                        </tr>
                        <tr>
                            <th>Landline</th>
                            <td>{{ $model->client->home_number }}</td>
                        </tr>

                        <tr>
                            <th>Address 1 </th>
                            <td>{{ $model->client->address }}</td>
                        </tr>
<!--                        <tr>
                            <th>Address 2</th>
                            <td>{{ $model->client->house_number }}</td>
                        </tr>-->
                        <tr>
                            <th>Notes </th>
                            <td>{{ $model->note}}</td>
                        </tr>
                        <tr>
                            <th>Permanent Notes </th>
                            <td>{{ $model->client->client_health_notes}}</td>
                        </tr>
                        <tr>
                            <th>Invoice to</th>
                            <td>
                                <?php echo whoPayingBill($model); ?>
                            </td>
                        </tr>


                    </tbody>
                </table>



            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->


        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Journey Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>


                        <tr>
                            <th style="width: 30%">	Pickup Time  </th>
                            <td>{{ showDate($model->booking_time) }}</td>
                        </tr>
                        <tr>
                            <th>Return</th>
                            <td>{{  $model->journey_type ==1 ? "NO" : "YES" }}</td>
                        </tr>
                        <?php if ($model->journey_type == 2) { ?>
                            <tr>
                                <th>RTN Journey Date and Time</th>
                                <td>{{ showDate($model->journey_return_date, true) }}</td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <th>Base Location </th>
                            <td>{{ $model->base_location }}</td>
                        </tr>
                        <?php foreach ($model->pickupLocation as $key => $pickupLocation) { ?>
                            <tr>
                                <th>Address {{ $key+1 }}</th>
                                <td>{{ $pickupLocation->location_name }}</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>Destination</th>
                            <td>{{ $model->drop_location }}</td>
                        </tr>

                        <tr>
                            <th>Out Distance </th>
                            <td>{{ $model->total_distance }} miles</td>
                        </tr>
                        <tr>
                            <th>Out Duration </th>
                            <td>{{ $model->total_duration }} Min</td>
                        </tr>                        
                        <?php if ($model->outward_companion) { ?>
                            <tr>
                                <th>Out Companion </th>
                                <td>{{ $model->outward_companion }} Min</td>
                            </tr>
                        <?php } ?>

                        <?php if ($model->outward_waiting) { ?>
                            <tr>
                                <th>Out Waiting </th>
                                <td>{{ $model->outward_waiting }} Min</td>
                            </tr>
                        <?php } ?>
                        <?php if ($model->comfort_break) { ?>
                            <tr>
                                <th>Out Breaks</th>
                                <td>{{ $model->comfort_break }}</td>
                            </tr>
                        <?php } ?>

                        <?php if ($model->journey_type == 2) { ?>


                            <?php if ($model->return_companion) { ?>
                                <tr>
                                    <th>Return Companion </th>
                                    <td>{{ $model->return_companion }} Min</td>
                                </tr>
                            <?php } ?>
                            <?php if ($model->return_waiting) { ?>
                                <tr>
                                    <th>Return Waiting </th>
                                    <td>{{ $model->return_waiting }} Min</td>
                                </tr>
                            <?php } ?>
                            <?php if ($model->return_comfort_break) { ?>
                                <tr>
                                    <th>Return Breaks</th>
                                    <td>{{ $model->return_comfort_break }}</td>
                                </tr>
                            <?php } ?>








                        <?php } ?>


















                    </tbody>
                </table>



            </div>

        </div>





        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Quotation Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>




                        <tr>
                            <th>Quote Cost </th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->total_price }}</td>
                        </tr>
                        <tr>
                            <th>Quoted Journey Cost</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                        </tr>
                        <tr style="display: none">
                            <th>Payment Mode </th>                            
                            <td>{{ paymentMode($model->payment_mode) }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status </th>                            
                            <td>{{ $model->payment_status ===1 ? "Paid" : "Unpaid" }}</td>
                        </tr>
                        <tr>
                            <th>Booking Entered Time</th>
                            <td>{{ showDate($model->created_at) }}</td>
                        </tr>

                    </tbody>
                </table>



            </div>

        </div>




        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Companion Driver & Vehicle Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                {!! Form::model($model, ['method' => 'POST', 'route' => ['booking.vehicle', $model->id], 'class'=>'form-horizontal']) !!}
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>


                        <?php if ($model->allowDriverChage) { ?>

                            <tr>
                                <th>Companion Driver</th>
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
                        <?php } else { ?>
                            <tr>
                                <th>Driver Name</th>
                                <td>{{ @$model->driver->user->fullName }}</td>
                            </tr>
                            <tr>
                                <th>Driver short name</th>
                                <td>{{ @$model->driver->user->username }}</td>
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
                <?php if ($model->allowDriverChage) { ?>
                    <div class="form-actions"></br>
                        <!--                        <a class="btn green" href="{{ route('booking.edit',$model->id) }}">Edit</a>-->
                        <button type="submit" class="btn green">Submit</button>

                    </div>
                <?php } ?>
                {!! Form::close() !!}

            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

		
    <div class="col-lg-12 col-xs-12 col-sm-12"  style="display: none">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-bubbles font-dark hide"></i>
					<span class="caption-subject font-dark bold uppercase">Update History</span>
				</div>
				 
			</div>
			
			<?php $audits = $model->audits()->with('user')->where('event','updated')->get() ;
				foreach($audits as $audit){
			?>
			<div class="portlet-body">
				<div class="tab-content">
					<div class="tab-pane active" id="portlet_comments_1">
						<!-- BEGIN: Comments -->
						<div class="mt-comments">
							<div class="mt-comment">
							<!--
								<div class="mt-comment-img">
									<img src="../assets/pages/media/users/avatar1.jpg"> 
									</div>
							-->
								<div class="mt-comment-body">
									<div class="mt-comment-info">
										<span class="mt-comment-author">{{ @$audit->user->name  }}</span>
										<span class="mt-comment-date">Event Date : <b>{{ showDate($audit->created_at) }}</b></span>
									</div>
									<div class="mt-comment-text">
										<table class='table table-bordered table-striped table-condensed flip-content'>
											<thead>
											<th style='width:33%'></th>
											<th  style='width:33%'>Old Value</th>
											<th style='width:33%'>Old New</th>
											</thead>
										
										<tbody>
											<?php
												$element = $audit->toArray();
												$newValue = $element['new_values'];
												foreach($element['old_values'] as $key=>$ele){ 
											?>
												<tr>
														<td>{{ $key }}</td>
														<td>{{ $ele }}</td>
														<td>{{ isset($newValue[$key]) ? $newValue[$key] : ""  }}</td>
												</tr>
											<?php }?>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
	
</div>

@endsection

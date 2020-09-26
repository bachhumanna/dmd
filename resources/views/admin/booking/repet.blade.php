 
<h1 class="page-title">Booking Request
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Repeat Booking
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                {!! Form::model($model, ['method' => 'POST', 'url'=>'#', 'class'=>'form-horizontal popup_booking_form']) !!}
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
<!--                        <tr>
                            <th>Repeat </th>
                            <td>
                                {!! Form::select('repeat_type',repetType() , null, ['class'=>'form-control']) !!}
                                <span class="bg-danger validation_error error_booking_date"><?= $errors->first('repeat_type'); ?></span>
                            </td>
                        </tr>-->
                        <tr>
                            <th>Booking Date</th>
                            <td>
                                {!! Form::text('booking_date', null, ['class'=>'form-control datepicker_popup']) !!}
                                <span class="bg-danger validation_error error_booking_date"><?= $errors->first('booking_date'); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Name </th>
                            <td>{{ $model->client->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone </th>
                            <td>{{ $model->client->phone }}</td>
                        </tr>
                        
                        
                        <tr>
                            <th>Client Home Number</th>
                            <td><?= $model->client->home_number ?></td>
                        </tr>
                        <tr>
                            <th>House Number</th>
                            <td><?= $model->client->house_number ?></td>
                        </tr>
                        
                        
                        <tr>
                            <th>Email </th>
                            <td>{{ $model->client->email }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $model->client->address }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td><?=  mobilityLevel($model->client->mobility_level) ?></td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $model->client->address }}</td>
                        </tr>
                        <tr>
                            <th>Booking Time </th>
                            <td>{{ showDate($model->booking_time) }}</td>
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
                            <th>Total Cost </th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->total_price }}</td>
                        </tr>
                        <tr>
                            <th>Created At </th>
                            <td>{{ $model->created_at }}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="form-actions">
                    <button type="submit" class="btn green pull-right repet_form_popup">Submit</button>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script>
    $('.datepicker_popup').datetimepicker({
        autoclose: true
    });
</script>
<script>
   $('.repet_form_popup').on('click', function (e) {
        e.preventDefault();
        $(".validation_error").html("");

        $.ajax({
            url: "{{ route('booking.repet-booking',['id'=>$model->id]) }}",
            data: $(".popup_booking_form").serialize(),
            type: "POST",
            async: false,
        }).done(function (response) {

            if (response.response == 0) {
                $.each(response.errors, function (key, value) {
                    key = key.replace(".", "_");
                    $(".error_" + key).html(value);
                });
            }else if(response.response == 2){
                 

            }else if(response.response == 1){
                $.fancybox.close();
                     
                
                swal({
                    title: "Booking Success",
                    text: response.message,
                    icon: "success",
                    button: "OK",
                  }).then((value) => {
                        location.reload();
                });
                  
            }
        });


         


    });
</script>
<div class="portlet-body flip-scroll">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Booking Details
            </div>
            <div class="caption pull-right">
                <a href="{{ route('booking.edit',$model->id) }}" title="Edit" class="event-edit pull-right"><i class="fa fa-edit"></i></a>
                <a class="event-edit pull-right del" data-id="<?php echo $model->id ?>" data-token="{{ csrf_token() }}" title="Cancel"><i class="fa fa-close"  aria-hidden="true"></i></a>    
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>
                    <!--
                    <tr>
                        <th>Order # </th>
                        <td>{{ $model->order_id }}</td>
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
                        <th>Email </th>
                        <td>{{ $model->client->email }}</td>
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
                        <th>Total Cost </th>
                        <td>{{ env('CURRENCY_SYM') }}{{ $model->total_price }}</td>
                    </tr>
                    <tr>
                        <th>Created At </th>
                        <td>{{ showDate($model->created_at) }}</td>
                    </tr> -->
                    
                    <tr>
                        <th>Client Name </th>
                        <td>{{ $model->client->name }}</td>
                    </tr>
                    <tr>
                        <th>Booking Time </th>
                        <td>{{ showDate($model->booking_time) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (isset($model->driver)) { ?>
        <!--<div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Driver & Vehicle Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Driver Name</th>
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
                    </tbody>
                </table>
            </div>
        </div>-->
    <?php } ?>

</div>

<script>
    $(".del").click(function () {

                var recordID = $(this).data('id');
                var token = $(this).data("token");
                bookingURL = "<?= route('booking.index'); ?>/" + recordID;

                $.ajax({
                    url: bookingURL,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (data)
                    {
                        console.log(data);
                        window.location.reload();

                    }
                });
            
    });
</script>

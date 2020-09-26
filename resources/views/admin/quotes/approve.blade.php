
<div class="appPopup">



{!! Form::open(array('route' => 'submit-approve-quote', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'approve-quote')) !!}


    <fieldset class="scheduler-border col-md-12 col-md-offset-3">
        <legend class="scheduler-border label label-sm label-success">Companion Drivers & Vehicle</legend>
        <div class="form-group">
            <label class="col-md-4 control-label">Companion Drivers</label>
            <div class="col-md-8">

                <select class="form-control" name="driver_id" id="driver_id">
                    <option value="">Select Companion Drivers</option>
                    <?php foreach ($drivers as $driver) { ?>

                        <option value="{{ $driver['driver'] }}" address="{{ $driver['address'] }}" rel='{{ $driver['id'] }}' >{{ $driver['name'] }}</option>
                    <?php } ?>
                </select>
                <span class="bg-danger validation_error error_driver_id"><?= $errors->first('driver_id'); ?></span>
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-4 control-label">Vehicles</label>
            <div class="col-md-8">
                {!! Form::select('vehicle_id', $vehicles, @$model->driver->vehicle_id,['placeholder'=>'Select Vehicle','class'=>'form-control vehicle_id']) !!}
                <span class="bg-danger validation_error error_vehicle_id"><?= $errors->first('vehicle_id'); ?></span>
            </div>
            </div>


            <div class="form-group">

            <div class="col-md-4 blnkbox">
            </div>
            <div class="col-md-8 btnWrpnew ">

                <input type='hidden' name='booking_id' value="<?= $booking_id ?>" />

                <input type="submit" value="Submit" class="booking_quote_submit btn green"/>

            </div>
            </div>






    </fieldset>

</div>

{!! Form::close() !!}



<script>

$( document ).ready(function() {
    $('.booking_quote_submit').click(function (e) {
        e.preventDefault();
        $("#customer_register .error").html("");
        $.ajax({
            type: "POST",
            url: "{{ route('submit-approve-quote') }}",
            data: $("#approve-quote").serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.response == 0) {
                    $.each(response.errors, function (key, value) {
                        $(".error_" + key).html(value);
                    });
                }
                else{
                    location.reload();
                }
            }
        });
    });

     });



</script>

<style>

    .btnWrpnew{
        margin-top: 20px;

    }







</style>

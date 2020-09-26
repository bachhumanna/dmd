@extends('admin.home.template')
@section('body')
<h1 class="page-title">Clients
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Client</div>
            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['client.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">



                    <div class="form-group">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('firstname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Surname</label>
                        <div class="col-md-9">
                            {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('surname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Landline</label>
                        <div class="col-md-9">
                            {!! Form::text('home_number', null, array('placeholder' => 'Landline','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('home_number'); ?></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Of Birth</label>
                        <div class="col-md-9">
                            @php 
                                $dob =  ($model->dob) ? \Carbon\Carbon::parse($model->dob)->format('m/d/Y') : null;
                                //echo $dob; 
                            @endphp
                            {!! Form::text('dob', $dob, array('placeholder' => 'DOB','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Enter postcode or address','class' => 'form-control','id' => 'address', "autocomplete"=>"off")) !!}
                            <span class="bg-danger"><?= $errors->first('address'); ?></span>
                        </div>
                    </div>

                    <?php /* ?>
                      <div class="form-group">
                      <label class="col-md-3 control-label">Address 2</label>
                      <div class="col-md-9">
                      {!! Form::text('house_number', null, array('placeholder' => 'Enter house name or number','class' => 'form-control', "autocomplete"=>"off")) !!}
                      <span class="bg-danger"><?= $errors->first('house_number'); ?></span>
                      </div>
                      </div>
                      <?php */ ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Permanent  Notes</label>
                        <div class="col-md-9">
                            {!! Form::textarea('client_health_notes', null, array('placeholder' => 'Notes','class' => 'form-control','cols'=>0,'rows'=>0)) !!}
                            <span class="bg-danger"><?= $errors->first('client_health_notes'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobility</label>
                        <div class="col-md-9">
                            {!! Form::select('mobility_level', mobilityLevel() ,null, array('placeholder' => 'Mobility','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('mobility_level'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Who Paying Bill</label>
                        <?php
                        //pr ($model->payment_clientid);
                        ?>
                        <div class="col-md-9">
                            {!! Form::select('paying_bill',['1'=>'Self','2'=>"Other"], null ,array('class' => 'form-control paying_bill')) !!}

                            <div class="row payment_clientid pt-15" style='display:<?= $model->payment_clientid != $model->id ? "block" : 'none' ?>'>
                                <div class="col-md-11">
                                    {!! Form::select('payment_clientid', $client ,null ,array('class' => 'form-control payment_clientid_element', 'placeholder' => 'Please Select')) !!}

                                </div>

                                <div class="text-right pl-0 col-md-1">
                                    <a class="btn btn-success" data-fancybox data-type="ajax" data-src="{{ route('client-addpopup') }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>


                            <span class="bg-danger validation_error error_paying_bill"><?= $errors->first('payment_clientid'); ?></span>
                        </div>
                    </div>

                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('client.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
google.maps.event.addDomListener(window, 'load', function () {
    var options = {
        //  componentRestrictions: {country: "{{ env('COUNTRY') }}"}
    };
    dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);

});

$('.date-picker').datepicker({
    // dateFormat: 'YY-mm-dd'
    dateFormat: 'mm-dd-YY'
});

$(".paying_bill").on('change', function () {
    $(".payment_clientid").hide();
    if (this.value == "2") {
        $(".payment_clientid").show();
    }
})
</script>


@endsection

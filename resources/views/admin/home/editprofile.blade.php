@extends('admin.home.template')

@section('body')
<h1 class="page-title"> User
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update  User</div>

            </div>
             
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="portlet-body form">
                {!! Form::model($users, ['method' => 'PATCH','files' => true , 'route' => ['profile-update'], 'class'=>'form-horizontal']) !!}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">DOB</label>
                        <div class="col-md-9">
                            {!! Form::text('dob', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date Of Birth','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Home Address','class' => 'form-control places-autocomplete fulladdress','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>
                        </div>
                    </div>
                    
                    
                      




                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>





@endsection
@section('pagescript')

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
        autoclose: true
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//    });

</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
<script>
    google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            //  componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        new google.maps.places.Autocomplete(document.getElementById('baselocation'), options);
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
    });
</script>
@endsection
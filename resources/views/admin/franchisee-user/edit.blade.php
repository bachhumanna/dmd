@extends('admin.home.template')
@section('title')
 Franchisee | Edit
@endsection
@section('body')
<h1 class="page-title"> Franchisee User
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update  Franchisee</div>

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
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisee-user.update', $model->id], 'class'=>'form-horizontal']) !!}
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
                     <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">
                            {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'postcode','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>
                        </div>
                    </div>
                    <fieldset class="address">
                    <?php /* ?>     
                    <div class="form-group">
                        <label class="col-md-3 control-label">Further Details</label>
                        <div class="col-md-9">
                            {!! Form::text('locality', null, array('placeholder' => 'Further Details','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <?php */?>
                    


                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">

                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control','id' => 'City','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">

                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','id' => 'Country','autocomplete'=>"country" )) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>


<!--                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">

                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control','id' => 'PostalCode','autocomplete'=>"postal-code")) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>

                    <?php */?>

                    </fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>

                    @if(franchiseeUser(true))
                    <div class="form-group">
                        <label class="col-md-3 control-label">Super Admin</label>
                        <div class="col-md-9">
                            {!! Form::select('is_super',[0=>"No",1=>'Yes'], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('is_super'); ?></span>
                        </div>
                    </div>
                    @endif

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
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);

    });
</script>


@endsection

@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Driving Request
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
                {!! Form::open(array('route' => 'driving-request.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-9">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            {!! Form::text('surname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('surname'); ?></span>
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
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('password'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">DOB</label>
                        <div class="col-md-9">
                            {!! Form::text('dob', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'dob','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
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
                        <label class="col-md-3 control-label">Locality</label>
                        <div class="col-md-9">
                            {!! Form::text('locality', null, array('placeholder' => 'Locality','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Town</label>
                        <div class="col-md-9">
                            {!! Form::text('town', null, array('placeholder' => 'Town','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'postcode','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Profile Pic</label>
                        <div class="col-md-9">
                            {!! Form::file('profile_pic', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('profile_pic'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Driving Licence Image</label>
                        <div class="col-md-9">
                            {!! Form::file('drivinglicence_image_pdf', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('drivinglicence_image_pdf'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Licence No</label>
                        <div class="col-md-9">
                            {!! Form::text('licence_no', null, array('placeholder' => 'Licence No','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('licence_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Licence Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('licence_expiry_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Licence Expiry Date','class' => 'form-control date-picker')) !!}
<!--                            {!! Form::text('licence_expiry_date', null, array('placeholder' => 'Licence Expiry Date','class' => 'form-control')) !!}-->
                            <span class="bg-danger"><?= $errors->first('licence_expiry_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver Experience</label>
                        <div class="col-md-9">
                            {!! Form::text('driver_experience', null, array('placeholder' => 'Driver Experience','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('driver_experience'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_number', null, array('placeholder' => 'PHL Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_number'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Image</label>
                        <div class="col-md-9">
                            {!! Form::file('phl_image', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_image'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_expiry_date', null, array('placeholder' => 'PHL Expiry Date','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">National Insurance Number</label>
                        <div class="col-md-9">
                            {!! Form::text('national_insurance_no', null, array('placeholder' => 'National Insurance Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('national_insurance_no'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Passport Number</label>
                        <div class="col-md-9">
                            {!! Form::text('passport_number', null, array('placeholder' => 'Passport Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('passport_number'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Passport Image</label>
                        <div class="col-md-9">
                            {!! Form::file('passport_image', null, array('placeholder' => 'Passport Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('passport_image'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Renewal Date</label>
                        <div class="col-md-9">
                            {!! Form::text('renewal_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('renewal_date'); ?></span>
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
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//            autoclose: true
//    });

</script>

@endsection

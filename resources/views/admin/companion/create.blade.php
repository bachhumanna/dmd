@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Companion
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
                {!! Form::open(array('route' => 'companion.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">
                    <?php if (!session()->get('selectedFranchisees')) { ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Franchisee</label>
                            <div class="col-md-9">
                                {!! Form::select('franchisees_id',getFranchisees(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
                        <label class="col-md-3 control-label">Full Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Full Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>


                        </div>
                    </div>

                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Further Details</label>
                        <div class="col-md-9">

                            {!! Form::text('locality', null, array('placeholder' => 'Further Details','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>





                    <div class="form-group">
                        <label class="col-md-3 control-label">Profile Pic</label>
                        <div class="col-md-9">
                            {!! Form::file('profile_pic', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('profile_pic'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <label class="col-md-3 control-label">National Insurance Number</label>
                        <div class="col-md-3">
                            {!! Form::text('national_insurance_no', null, array('placeholder' => 'National Insurance Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('national_insurance_no'); ?></span>
                        </div>
                        
                        <label class="col-md-3 control-label">Driving Licence Image</label>
                        <div class="col-md-3">
                            {!! Form::file('drivinglicence_image_pdf', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('drivinglicence_image_pdf'); ?></span>
                        </div>
                    </div>

                    <!--                    <div class="form-group">
                                            <label class="col-md-3 control-label">licence No</label>
                                            <div class="col-md-9">
                                                {!! Form::text('licence_no', null, array('placeholder' => 'licence No','class' => 'form-control')) !!}
                                                <span class="bg-danger">< ?= $errors->first('licence_no'); ?></span>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Licence Expiry Date</label>
                                            <div class="col-md-9">
                                                {!! Form::text('licence_expiry_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Licence Expiry Date','class' => 'form-control date-picker')) !!}
                                                                            {!! Form::text('licence_expiry_date', null, array('placeholder' => 'Licence Expiry Date','class' => 'form-control')) !!}
                                                <span class="bg-danger">< ?= $errors->first('licence_expiry_date'); ?></span>
                                            </div>
                                        </div>-->

                    <!--                    <div class="form-group">
                                            <label class="col-md-3 control-label">Driver Experience</label>
                                            <div class="col-md-9">
                                                {!! Form::text('driver_experience', null, array('placeholder' => 'Driver Experience','class' => 'form-control')) !!}
                                                <span class="bg-danger">< ?= $errors->first('driver_experience'); ?></span>
                                            </div>
                                        </div>-->

                    
                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Licence Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_number', null, array('placeholder' => 'PHL Licence Number','class' => 'form-control')) !!}
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
                        <label class="col-md-3 control-label">PHL Licence Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_expiry_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'PHL Licence Expiry Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>
                    
                    
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Passport Number</label>
                        <div class="col-md-3">
                            {!! Form::text('passport_number', null, array('placeholder' => 'Passport Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('passport_number'); ?></span>
                        </div>
                        
                        <label class="col-md-3 control-label">Passport Image</label>
                        <div class="col-md-3">
                            {!! Form::file('passport_image', null, array('placeholder' => 'Passport Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('passport_image'); ?></span>
                        </div>
                        
                    </div>
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Training Certificates </label>
                        <div class="col-md-9">
                            {!! Form::file('training_certificates', null, array('placeholder' => 'Training Certificates Image','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('training_certificates'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Certificates expiry dates</label>
                        <div class="col-md-9">
                            {!! Form::text('certificates_exp_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Certificates expiry dates','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('certificates_exp_date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Renewal Date</label>
                        <div class="col-md-9">
                            {!! Form::text('renewal_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('renewal_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Employment Start Date</label>
                        <div class="col-md-9">
                            {!! Form::text('employment_start_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Employment Start Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('employment_start_date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Right to Work in the UK</label>
                        <div class="col-md-9">
                            
                            {!! Form::select('right_work_uk',[1=>'Yes',0=>"No"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('right_work_uk'); ?></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Note</label>
                        <div class="col-md-9">
                            {!! Form::textarea('note', null, array('placeholder' => 'Note','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('note'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicles</label>
                        <div class="col-md-9">
                            {!! Form::select("vehicle_id",$vehiclesModel, null ,array('class' => 'form-control')) !!}
                            <span class="error bg-danger"><?= $errors->first('vehicle_id'); ?></span>
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

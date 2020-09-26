@extends('admin.home.template')
@section('body')
<h1 class="page-title">Companion
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Companion</div>

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
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['companion.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-9">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('disabled'=>'disabled','placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div>

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


                    <fieldset class="address">



                    <div class="form-group">
                        <label class="col-md-3 control-label">Full Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
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



                    <!-- <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">

                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control','id' => 'City','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger">< ?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">

                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','id' => 'Country','autocomplete'=>"country" )) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">

                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control places-autocomplete','id' => 'PostalCode','autocomplete'=>"postal-code")) !!}
                            <span class="bg-danger">< ?= $errors->first('postcode'); ?></span>
                        </div>
                    </div> -->

                    </fieldset>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Profile Pic</label>
                        <div class="col-md-6">
                            {!! Form::file('profile_pic',array('id' => 'profile-img','placeholder' => 'Image','class' => 'form-control')) !!}
                            <span>Upload a file</span>
                            <span class="bg-danger"><?= $errors->first('profile_pic'); ?></span>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview">
<!--                                <a class="closeBtn hideImage" >x</a>-->
                                <img src='{{ asset("images/profilepic/".$model->profile_pic) }}' id="profile-img-tag" class="reg_img" width="200px" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Driving Licence Image</label>
                        <div class="col-md-6">
                            {!! Form::file('drivinglicence_image_pdf',array('id' => 'drivinglicence-img','placeholder' => 'Image','class' => 'form-control')) !!}
                            <span>Upload a file</span>
                            <span class="bg-danger"><?= $errors->first('drivinglicence_image_pdf'); ?></span>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview">
                                <img src='{{ asset("images/drivingrequest/".@$model->userDriverdetails->drivinglicence) }}' id="drivinglicence-img-tag" class="reg_img" width="200px" />
                            </div>
                        </div>
                    </div>
<?php /* ?>
<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Licence No</label>
                        <div class="col-md-9">
                            {!! Form::text('licence_no', $model->userDriverdetails->licence_no, array('placeholder' => 'licence No','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('licence_no'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Licence Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('licence_expiry_date', $model->userDriverdetails->licence_expiry_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Licence Expiry Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger">< ?= $errors->first('licence_expiry_date'); ?></span>

                            {!! Form::text('licence_expiry_date', $model->userDriverdetails->licence_expiry_date, array('placeholder' => 'Licence Expiry Date','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('licence_expiry_date'); ?></span>
                        </div>
                    </div>-->

<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver Experience</label>
                        <div class="col-md-9">
                            {!! Form::text('driver_experience', $model->userDriverdetails->driver_experience, array('placeholder' => 'Driver Experience','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('driver_experience'); ?></span>
                        </div>
                    </div>-->

<?php */?>
                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Licence Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_number', $model->userDriverdetails->phl_number, array('placeholder' => 'PHL Licence Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_number'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Image</label>
                        <div class="col-md-6">
                            {!! Form::file('phl_image',array('id' => 'phlimage-img','placeholder' => 'Image','class' => 'form-control')) !!}
                            <span>Upload a file</span>
                            <span class="bg-danger"><?= $errors->first('phl_image'); ?></span>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview">
                                <img src='{{ asset("images/phlimage/".$model->userDriverdetails->phl_image) }}' id="phlimage-img-tag" class="reg_img" width="200px" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">PHL Licence Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('phl_expiry_date', $model->userDriverdetails->phl_expiry_date, array('data-date-format'=>"yyyy-mm-dd", 'placeholder' => 'PHL Licence Expiry Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                        </div>
                    </div>

                    <?php */ ?>


                    <div class="form-group">
                        <label class="col-md-3 control-label">National Insurance Number</label>
                        <div class="col-md-9">
                            {!! Form::text('national_insurance_no', @$model->userDriverdetails->national_insurance_no, array('placeholder' => 'National Insurance Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('national_insurance_no'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Passport Number</label>
                        <div class="col-md-9">
                            {!! Form::text('passport_number', @$model->userDriverdetails->passport_number, array('placeholder' => 'Passport Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('passport_number'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Passport Image</label>
                        <div class="col-md-6">
                            {!! Form::file('passport_image',array('id' => 'passport-img','placeholder' => 'Image','class' => 'form-control')) !!}
                            <span>Upload a file</span>
                            <span class="bg-danger"><?= $errors->first('passport_image'); ?></span>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview">
                                <img src='{{ asset("images/passportimg/".@$model->userDriverdetails->passport_image) }}' id="passport-img-tag" class="reg_img" width="200px" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Training Certificates</label>
                        <div class="col-md-6">
                            {!! Form::file('training_certificates',array('id' => 'certificates-img','placeholder' => 'Image','class' => 'form-control')) !!}
                            <span>Upload a file</span>
                            <span class="bg-danger"><?= $errors->first('training_certificates'); ?></span>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview">
                                <img src='{{ asset("images/certificates/".@$model->userDriverdetails->training_certificates) }}' id="training-Certificates-img-tag" class="reg_img" width="200px" />
                            </div>
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
                            {!! Form::text('renewal_date', @$model->userDriverdetails->renewal_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('renewal_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Employment Start Date</label>
                        <div class="col-md-9">
                            {!! Form::text('employment_start_date', @$model->userDriverdetails->employment_start_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Employment Start Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('employment_start_date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Right to Work in the UK</label>
                        <div class="col-md-9">


                            {!! Form::select('right_work_uk',[1=>"Yes",0=>"No"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('right_work_uk'); ?></span>

<!--                            <label>
                                {{ Form::radio('right_work_uk', 1,null,array('class' => 'iradio_square-blue')) }} Yes
                            </label>
                            <label>
                                {{ Form::radio('right_work_uk', 0,null,array('class' => 'iradio_square-blue')) }} No
                            </label>
                            <span class="error">< ?= $errors->first('right_work_uk'); ?></span>
                        -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Note</label>
                        <div class="col-md-9">
                            {!! Form::textarea('note', @$model->userDriverdetails->note, array('placeholder' => 'Note','class' => 'form-control')) !!}
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
                            {!! Form::select("driverVehicles[vehicle_id]",$vehiclesModel, null ,array('class' => 'form-control')) !!}
                            <span class="error bg-danger"><?= $errors->first('vehicle_id'); ?></span>
                        </div>
                    </div>


<!--                    <div class="formRow">
                        <div class="formCol upload">
                            <label> Add a photo of your business card </label>
                            <div class="txtFld">
                                <div class="uploadBtn">
                                    {!! Form::file('image', array('id' => 'profile-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span>Upload a file</span>
                                </div>
                                <span class="fileName">No file choosen</span>
                            </div>
                        </div>
                        <div class="formCol">
                            <div class="img-preview">
                                <a class="closeBtn hideImage" >x</a>
                                <img src="{{ asset('images/users/image.jpg')}}" id="profile-img-tag" class="reg_img" width="200px" />
                            </div>
                        </div>
                    </div>-->



                </div>



                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('companion.index')}}" class="btn btn-danger">Cancel</a>
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
        autoclose: true
        // dateFormat: 'YY-mm-dd'
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//            autoclose: true
//    });


function profileImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#profile-img-tag").siblings('.hideImage').show();
        }
    }
$("#profile-img").change(function () {
        profileImage(this);
});

function drivinglicenceImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#drivinglicence-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#drivinglicence-img-tag").siblings('.hideImage').show();
        }
    }
$("#drivinglicence-img").change(function () {
        drivinglicenceImage(this);
});

function phlImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#phlimage-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#phlimage-img-tag").siblings('.hideImage').show();
        }
    }
$("#phlimage-img").change(function () {
        phlImage(this);
});

function passportImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#passport-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#passport-img-tag").siblings('.hideImage').show();
        }
    }
$("#passport-img").change(function () {
        passportImage(this);
});


function TrainingCertificatesImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#training-Certificates-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#training-Certificates-img-tag").siblings('.hideImage').show();
        }
    }
$("#certificates-img").change(function () {
        TrainingCertificatesImage(this);
});


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

@extends('admin.home.template')
@section('body') 

<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Staff
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">

                    <i class="fa fa-gift"></i> Create
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'staff.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'form')) !!}
                <div class="form-body">
                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Personal Details</legend>

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
                                <label class="col-md-3 control-label">Role</label>

                                <?php if (isSuperAdmin()) { ?>
                                    <div class="col-md-3">
                                        {!! Form::select('user_type',[2=>'Administrator',5=>"Companion",3=>"Companion Driver"], null ,array('id' => 'user_type','class' => 'form-control','onchange'=>'userTypedriver(this.value)')) !!}
                                        <span class="error"><?= $errors->first('user_type'); ?></span>
                                    </div>
                                    <label class="col-md-3 control-label">Super Admin</label>
                                    <div class="col-md-3">
                                        {!! Form::select('is_super',[0=>"No",1=>'Yes'], null ,array('class' => 'form-control','id' => 'super_admin')) !!}
                                        <span class="error"><?= $errors->first('is_super'); ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-3">
                                        {!! Form::select('user_type',[5=>"Companion",3=>"Companion Driver"], null ,array('id' => 'user_type','class' => 'form-control','onchange'=>'userTypedriver(this.value)')) !!}
                                        <span class="error"><?= $errors->first('user_type'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">First Name</label>
                                <div class="col-md-2">
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('name'); ?></span>
                                </div>
                                <label class="col-md-2 control-label">Last Name</label>
                                <div class="col-md-2">
                                    {!! Form::text('surname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('surname'); ?></span>
                                </div>
                                <label class="col-md-2 control-label">Username</label>
                                <div class="col-md-2">
                                    {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('username'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-3">
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('email'); ?></span>
                                </div>
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-3">
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('password'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">DOB</label>
                                <div class="col-md-3">
                                    <!-- 'data-date-format'=>"yyyy-mm-dd", -->
                                    {!! Form::text('dob', null, array('placeholder' => 'DOB','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                    <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Phone</label>
                                <div class="col-md-3">
                                    {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Address</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Home Address</label>
                                <div class="col-md-9">
                                    {!! Form::text('address', null, array('placeholder' => 'Home Address','class' => 'form-control places-autocomplete fulladdress','id' => 'address','autocomplete'=>"off" )) !!}
                                    <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Base address</label>
                                <div class="col-md-8">
                                    {!! Form::text('locality', null, array('placeholder' => 'Base Address','class' => 'form-control places-autocomplete','id' => 'baselocation','autocomplete'=>"off" )) !!}
                                    <span class="bg-danger validation_error error_locality"><?= $errors->first('locality'); ?></span>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn green" onclick="changeaddress()" title="Same as full address">Copy</span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Documents</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Profile Pic</label>
                                <div class="col-md-3">
                                    {!! Form::file('profile_pic_file',  array('placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('profile_pic_file'); ?></span>
                                </div>

                           </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Driving Licence</label>
                                <div class="col-md-3">
                                    {!! Form::text('licence_no', null ,array('placeholder' => 'License Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('licence_no'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('licence_expiry_date', null ,array('placeholder' => 'Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                    <span class="bg-danger"><?= $errors->first('licence_expiry_date'); ?></span>
                                </div>


                                <div class="col-md-3">
                                    {!! Form::file('drivinglicence_image_pdf',  array('placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('drivinglicence_image_pdf'); ?></span>
                                </div>
                           </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Passport Number</label>
                                <div class="col-md-3">
                                    {!! Form::text('passport_number', null, array('placeholder' => 'Passport Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('passport_number'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Passport Image</label>
                                <div class="col-md-3">
                                    {!! Form::file('passport_image',  array('placeholder' => 'Passport Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('passport_image'); ?></span>
                                </div>
                            </div>


<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Training Certificates </label>
                                <div class="col-md-3">
                                    {!! Form::file('training_certificates',  array('placeholder' => 'Training Certificates Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('training_certificates'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Certificates expiry dates</label>
                                <div class="col-md-3">
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
                            </div>-->
                        </fieldset>
                    </div>



                    <div class="usertypedrivercontainer">
                        <div class="form-group">
                            <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                                <legend class="scheduler-border label label-sm label-success">PHL License</legend>


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
                                        {!! Form::text('phl_expiry_date', null, array('placeholder' => 'PHL Licence Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                        <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                                    </div>
                                </div>




                            </fieldset>
                        </div>

                    </div>





                    <div class="form-group usertypedrivercontainer_Remove">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Training</legend>





                            <div class="form-group">

                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                        <th>Certificate Name</th>
                                        <th>Expiry Date</th>
                                        <th>File</th>
                                        </thead>
                                        <tbody>
                                            <tr class='clone_element'>
                                                <td>
                                                    {!! Form::text('certificate_name[]', null, array('placeholder' => 'Certificate Name','class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('certificate_name'); ?></span>
                                                </td>
                                                <td>
                                                    {!! Form::text('certificate_expiry_date[]', null, array('placeholder' => 'Certificate Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                                    <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                                                </td>
                                                <td>
                                                    {!! Form::file('certificate_img[]',  array('placeholder' => 'Image','class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('certificate_img'); ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-1 col-md-offset-11">
                                <button class="btn green submit new-row" onclick="addRow()" type="button">+</button>
                            </div>
                        </fieldset>

                    </div>






                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Employment</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Employment Start Date</label>
                                <div class="col-md-3">
                                    {!! Form::text('employment_start_date', null, array('placeholder' => 'Employment Start Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                    <span class="bg-danger"><?= $errors->first('employment_start_date'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Right to Work in the UK</label>


                                <div class="col-md-3">
                                    {!! Form::select('right_work_uk',[1=>'Yes',0=>"No"], null ,array('id' => 'user_type','class' => 'form-control','onchange'=>'userTypedriver(this.value)')) !!}
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
                                <label class="col-md-3 control-label">National Insurance Number</label>
                                <div class="col-md-9">
                                    {!! Form::text('national_insurance_no', null, array('placeholder' => 'National Insurance Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('national_insurance_no'); ?></span>
                                </div>
                            </div>

                        </fieldset>
                    </div>





                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>
                    <div class="form-group usertypedrivercontainer">
                        <label class="col-md-3 control-label ">Vehicles</label>
                        <div class="col-md-9">
                            {!! Form::select("vehicle_id",$vehiclesModel, null ,array('class' => 'form-control')) !!}
                            <span class="error bg-danger"><?= $errors->first('vehicle_id'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('staff.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<script>
    function changeaddress() {
        address = $(".fulladdress").val();
        $("#baselocation").val(address);
    }

    function addRow() {
        var $clone = $("tr.clone_element:first").clone();
        $clone.find(':text').val('');
        $("tr.clone_element:last").after($clone);

        $('.date-picker').datepicker({
            autoclose: true,
            //dateFormat: 'YY-mm-dd'
            dateFormat: 'dd-mm-YY'
        });

    }
//    $('.date-picker').datepicker({
//        autoclose: true
//                //dateFormat: 'dd-mm-yy'
//    });


</script>

<script>
//    $(document).on('click', '.new-row', function () {
//    $('<div class="form-group"><label class="col-md-3 control-label">Certificate Name</label><div class="col-md-8"><input placeholder="Certificate Name" class="form-control" name="certificate_name[]" type="text"></div></div><div class="form-group"><label class="col-md-3 control-label">Certificate Expiry Date</label><div class="col-md-8"><input data-date-format="yyyy-mm-dd" placeholder="Certificate Expiry Date" class="form-control date-picker" name="certificate_expiry_date[]" type="text"></div></div><div class="form-group"><label class="col-md-3 control-label">Certificate Image</label><div class="col-md-8"><input placeholder="Image" class="form-control" name="certificate_img[]" type="file"></div></div>').appendTo('#certificateimgupload').hide().fadeIn(280);
//
//    $('.date-picker').datepicker({
//    autoclose: true,
//            dateFormat: 'YY-mm-dd'
//    });
//
//    });
</script>

<script>
    $(".usertypedrivercontainer").hide();
    function userTypedriver(id) {

        if (id == 3) {
            $('.usertypedrivercontainer').show();
        } else {
            $('.usertypedrivercontainer').hide();
        }
    }


    $(document).ready(function () {
        user_type = $("#user_type").val();
        userTypedriver(user_type);
    });


</script>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
        dateFormat: 'dd-mm-YY'
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
        new google.maps.places.Autocomplete(document.getElementById('baselocation'), options);
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
    });
</script>
<script>
    $(document).ready(function () {
        $("#user_type").on("change", function () {
            var user_type = this.value;
//            if (user_type != 2) {
//                $('#super_admin').attr('disabled', 'disabled').val(0);
//            } else {
//                $('#super_admin').removeAttr("disabled");
//            }
        })
    });
    
    $("#form :input").attr("autocomplete", "off");
</script>

@endsection

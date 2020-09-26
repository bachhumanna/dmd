@extends('admin.home.template')
@section('body')
<h1 class="page-title">Staff
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Staff</div>

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
            <?php
               // pr($model);
            ?>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['staff.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Personal Details</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Franchisee</label>
                                <div class="col-md-9">
                                    {!! Form::select('franchisees_id',getFranchisees(false), null ,array('disabled'=>'disabled','placeholder' => 'Please Select','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Role</label>
                                <div class="col-md-4">
                                    {!! Form::select('user_type',[2=>'Administrator',5=>"Companion",3=>"Companion Driver"], null ,array('class' => 'form-control','onchange'=>'userTypedriver(this.value)')) !!}
                                    <span class="error"><?= $errors->first('user_type'); ?></span>
                                </div>

                                <label class="col-md-2 control-label">Super Admin</label>
                                <div class="col-md-3">
                                    {!! Form::select('is_super',[0=>"No",1=>'Yes'], null ,array('class' => 'form-control','id' => 'test')) !!}
                                    <span class="error"><?= $errors->first('is_super'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-4">
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('name'); ?></span>
                                </div>

                                <label class="col-md-2 control-label">Last Name</label>
                                <div class="col-md-3">
                                    {!! Form::text('surname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('surname'); ?></span>
                                </div>


                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label">Username</label>
                              <div class="col-md-4">

                                  {!! Form::text('username', null, array('placeholder' => 'User Name','class' => 'form-control')) !!}
                                  <span class="bg-danger"><?= $errors->first('username'); ?></span>
                              </div>
                                <label class="col-md-2 control-label">Email</label>
                                <div class="col-md-3">
                                    {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('email'); ?></span>
                                </div>


                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label">DOB</label>
                              <div class="col-md-4">
                                    @php 
                                        $dob =  \Carbon\Carbon::parse($model->dob)->format('d-m-Y');
                                        //echo $dob; 
                                    @endphp
                                    <!-- 'data-date-format'=>"yyyy-mm-dd", -->
                                  {!! Form::text('dob', $dob , array('placeholder' => 'dob','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                  <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                              </div>
                                <label class="col-md-2 control-label">Phone</label>
                                <div class="col-md-3">
                                    {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Address</legend>

                            <fieldset class="address">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Full Address</label>
                                    <div class="col-md-9">
                                        {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete fulladdress','id' => 'address','autocomplete'=>"off" )) !!}
                                        <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group usertypedrivercontainer">
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
                                <div class="col-md-6">
                                    {!! Form::file('profile_pic_file',array('id' => 'profile-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                    <!-- <span>Upload a file</span> -->
                                    <span class="bg-danger"><?= $errors->first('profile_pic_file'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    <div class="img-preview">
                                        <!--                                <a class="closeBtn hideImage" >x</a>-->
                                        <img src='{{ asset("images/profilepic/".@$model->profile_pic) }}' id="profile-img-tag" class="reg_img" width="200px" />
                                    </div>
                                </div>
                            </div>
                            <?php
                              //  pr($model->userDriverdetails);
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Driving Licence</label>
                                <div class="col-md-4">
                                    {!! Form::text('licence_no', $model->userDriverdetails->licence_no ,array('placeholder' => 'License Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('licence_no'); ?></span>
                                </div>
                                <div class="col-md-2">
                                    @php $licence_expiry_date =  \Carbon\Carbon::parse($model->userDriverdetails->licence_expiry_date)->format('d-m-Y'); @endphp

                                    {!! Form::text('licence_expiry_date', $licence_expiry_date ,array('placeholder' => 'Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                    <span class="bg-danger"><?= $errors->first('licence_expiry_date'); ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label">Licence Image</label>
                              <div class="col-md-6">
                                 <!-- <span>Upload a file</span> -->
                                  {!! Form::file('drivinglicence_image_pdf',array('id' => 'drivinglicence-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                  <span class="bg-danger"><?= $errors->first('drivinglicence_image_pdf'); ?></span>
                              </div>
                              <div class="col-md-3">
                                  <div class="img-preview">
                                      <img src='{{ asset("images/drivingrequest/".@$model->userDriverdetails->drivinglicence) }}' id="drivinglicence-img-tag" class="reg_img" width="200px" />
                                  </div>
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Passport Number</label>
                                <div class="col-md-6">
                                    {!! Form::text('passport_number', @$model->userDriverdetails->passport_number, array('placeholder' => 'Passport Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('passport_number'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Passport Image</label>
                                <div class="col-md-6">
                                    {!! Form::file('passport_image',array('id' => 'passport-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                    <!-- <span>Upload a file</span> -->
                                    <span class="bg-danger"><?= $errors->first('passport_image'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    <div class="img-preview">
                                        <img src='{{ asset("images/passportimg/".@$model->userDriverdetails->passport_image) }}' id="passport-img-tag" class="reg_img" width="200px" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>


                    <div class="usertypedrivercontainer"
                    <?php if ($model->user_type == 3) { ?>
                             style="display:block;"
                         <?php } else { ?>
                             style="display:none;"
                         <?php } ?>
                         >

                        <div class="form-group">
                            <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                                <legend class="scheduler-border label label-sm label-success">PHL License</legend>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">PHL Licence Number</label>
                                    <div class="col-md-6">
                                        {!! Form::text('phl_number', @$model->userDriverdetails->phl_number, array('placeholder' => 'PHL Licence Number','class' => 'form-control')) !!}
                                        <span class="bg-danger"><?= $errors->first('phl_number'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">PHL Image</label>
                                    <div class="col-md-6">
                                        {!! Form::file('phl_image',array('id' => 'phlimage-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                        <!-- <span>Upload a file</span> -->
                                        <span class="bg-danger"><?= $errors->first('phl_image'); ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="img-preview">
                                            <img src='{{ asset("images/phlimage/".@$model->userDriverdetails->phl_image) }}' id="phlimage-img-tag" class="reg_img" width="200px" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">PHL Licence Expiry Date</label>
                                    <div class="col-md-6">

                                        @php $phl_expiry_date =  \Carbon\Carbon::parse(@$model->userDriverdetails->phl_expiry_date)->format('d-m-Y'); @endphp

                                        {!! Form::text('phl_expiry_date', $phl_expiry_date, array('placeholder' => 'PHL Licence Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                        <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="usertypedrivercontainer" >

                        <div class="form-group">
                            <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                                <legend class="scheduler-border label label-sm label-success">Training</legend>


                                <div class="form-group">

                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-condensed flip-content botmr0">
                                            <thead class="flip-content">
                                            <th>Certificate Name</th>
                                            <th>Expiry Date</th>
                                            <th>File</th>
                                            <!-- <th></th> -->
                                            </thead>
                                            <tbody>



                                                <?php
                                                foreach ($model->userCertificateDetails as $key => $data) { ?>

                                                <tr>
                                                    <td>{{ @$data->certificate_name}}</td>

                                                    <td>{{ showDate(@$data->certificate_expiry_date,true)}}</td>

                                                    <td>
                                                        <img width="150px" src='{{ asset("images/certificates/".@$data->certificate_img) }}' alt="">
                                                    </td>
                                                    <?php /*?>
                                                    <td>
                                                         <a class="btn btn-primary btn-xs" href="{{ route('certificate-delete',$data->id) }}"title="Delete">Delete</i>
                                                        </a>
                                                    </td>
                                                    <?php */?>
                                                    <td style="text-align: center">
                                                        <a class="btn btn-info btn-xs red del" href="{{ route('certificate-delete',$data->id) }}"  title="Restore">Delete</a>
                                                    </td>
                                                </tr>
                                              <?php } ?>

                                                <tr class='clone_element'>
                                                    <td>
                                                        {!! Form::text('certificate_name[]', null, array('placeholder' => 'Certificate Name','class' => 'form-control')) !!}
                                                        <span class="bg-danger"><?= $errors->first('certificate_name'); ?></span>
                                                    </td>
                                                    <td>
                                                        {!! Form::text('certificate_expiry_date[]', null, array('placeholder' => 'Certificate Expiry Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                                        <span class="bg-danger"><?= $errors->first('phl_expiry_date'); ?></span>
                                                    </td>
                                                    <!-- <td colspan="2"> -->
                                                    <td>
                                                        {!! Form::file('certificate_img[]',  array('placeholder' => 'Image','class' => 'form-control')) !!}
                                                        <span class="bg-danger"><?= $errors->first('certificate_img'); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 textRight">
                                        <button class="btn green submit new-row" onclick="addRow()" type="button">+</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Employment</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Employment Start Date</label>
                                <div class="col-md-4">

                                    @php $employment_start_date =  \Carbon\Carbon::parse(@$model->userDriverdetails->employment_start_date)->format('d-m-Y'); @endphp

                                    {!! Form::text('employment_start_date', $employment_start_date, array('placeholder' => 'Employment Start Date','class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy")) !!}
                                    <span class="bg-danger"><?= $errors->first('employment_start_date'); ?></span>
                                </div>

                                <label class="col-md-3 control-label">Right to Work in the UK</label>
                                <div class="col-md-2 control-label nChk">
                                    <label>
                                        {{ Form::radio('right_work_uk', 1,null,array('class' => 'iradio_square-blue')) }} Yes
                                    </label>
                                    <label>
                                        {{ Form::radio('right_work_uk', 0,null,array('class' => 'iradio_square-blue')) }} No
                                    </label>

                                    <span class="error"><?= $errors->first('right_work_uk'); ?></span>
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
                                <label class="col-md-3 control-label">National Insurance Number</label>
                                <div class="col-md-9">
                                    {!! Form::text('national_insurance_no', @$model->userDriverdetails->national_insurance_no, array('placeholder' => 'National Insurance Number','class' => 'form-control')) !!}
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

                    <div class="form-group usertypedrivercontainer"
                    <?php if ($model->user_type == 3) { ?>
                             style="display:block;"
                         <?php } else { ?>
                             style="display:none;"
                         <?php } ?>
                         >
                        <label class="col-md-3 control-label">Vehicles</label>
                        <div class="col-md-9">
                            {!! Form::select("vehicle_id",$vehiclesModel, @$model->driverVehicles->vehicle_id ,array('class' => 'form-control')) !!}
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
</div>



@endsection
@section('pagescript')

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
                                        function changeaddress() {
                                            address = $(".fulladdress").val();
                                            $("#baselocation").val(address);
                                        }
</script>

<script>

        $(".del").click(function (e) {
               e.preventDefault();
                swal({
                    title: "Are you sure?",
                    //text: "After click submit button this data is parmanently deleted!",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: true,
                    buttons: true,

                }).then((willDelete) => {

                    if (willDelete) {

                        var recordID = $(this).data('id');
                        var token = $(this).data("token");
                        bookingURL = $(this).attr('href');

                        $.ajax({
                            url: bookingURL,
                            success: function (data){
                                console.log(data);
                                window.location.reload();
                            }
                        });

                    }

                });

            });

</script>


<script>
    //$(".usertypedrivercontainer").hide();
    function userTypedriver(id) {

        if (id == 3) {
            $('.usertypedrivercontainer').show();
        } else {
            $('.usertypedrivercontainer').hide();
        }
    }
</script>
<script>
    function addRow() {
        var $clone = $("tr.clone_element:first").clone();
        $clone.find(':text').val('');
        $("tr.clone_element:last").after($clone);

        $('.date-picker').datepicker({
            autoclose: true,
            //dateFormat: 'YY-mm-dd'
            dateFormat: 'mm-dd-YY'
        });

    }
    $('.date-picker').datepicker({
        autoclose: true,
        //dateFormat: 'dd-mm-yyyy'
        dateFormat: 'mm-dd-YY'
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
    });</script>


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

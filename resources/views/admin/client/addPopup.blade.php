<div class="row" id="popup-container" style="width: 800px">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Add Client
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('url' => '#', 'files' => true ,'method'=>'POST','class'=>'form-horizontal clinetadd_form')) !!}
                <div class="form-body">


                    <div class="form-group">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_name"><?= $errors->first('firstname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Surname</label>
                        <div class="col-md-9">
                            {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_surname"><?= $errors->first('surname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_email"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_phone"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Landline</label>
                        <div class="col-md-9">
                            {!! Form::text('home_number', null, array('placeholder' => 'Landline','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_home_number"><?= $errors->first('home_number'); ?></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Of Birth</label>
                        <div class="col-md-9">
                            {!! Form::text('dob', null, array('placeholder' => 'DOB','class' => 'form-control date-picker')) !!}
                            
                            <span class="bg-danger validation_error error_dob"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Enter postcode or address','class' => 'form-control','id' => 'popupaddress', "autocomplete"=>"off")) !!}
                            <span class="bg-danger validation_error error_address"><?= $errors->first('address'); ?></span>
                        </div>
                    </div>

                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address 2</label>
                        <div class="col-md-9">
                            {!! Form::text('house_number', null, array('placeholder' => 'Enter house name or number','class' => 'form-control', "autocomplete"=>"off")) !!}
                            <span class="bg-danger validation_error error_house_number"><?= $errors->first('house_number'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Permanent Notes</label>
                        <div class="col-md-9">
                            {!! Form::textArea('client_health_notes', null, array('placeholder' => 'Notes','class' => 'form-control','col'=>0,'row'=>0,'style'=>"height:100px")) !!}
                            <span class="bg-danger validation_error error_client_health_notes"><?= $errors->first('client_health_notes'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobility</label>
                        <div class="col-md-9">
                            {!! Form::select('mobility_level', mobilityLevel() ,null, array('placeholder' => 'Mobility','class' => 'form-control')) !!}
                            <span class="bg-danger validation_error error_mobility_level"><?= $errors->first('mobility_level'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Who Paying Bill</label>
                        <div class="col-md-9">
                            {!! Form::select('paying_bill',['1'=>'Self','2'=>"Other"], null ,array('class' => 'form-control paying_bill')) !!}
                            <div class="row payment_clientid pt-15" style='display:none'>
                                <div class="col-md-12">
                                    {!! Form::select('payment_clientid', $client ,null ,array('class' => 'form-control payment_clientid_element', 'placeholder' => 'Please Select')) !!}

                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="form-actions right1">
                    <button type="submit" class="btn green clinetadd_form_popup">Submit</button>
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

    var options = {};
    dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('popupaddress'), options);


   $('.clinetadd_form_popup').on('click', function (e) {
        e.preventDefault();
        $(".validation_error").html("");

        $.ajax({
            url: "{{ route('client-addpopup-store') }}",
            data: $(".clinetadd_form").serialize(),
            type: "POST",
            async: false,
        }).done(function (response) {

            if (response.response == 0) {
                $.each(response.errors, function (key, value) {
                    key = key.replace(".", "_");
                    $(".error_" + key).html(value);
                });
            }else if(response.response == 2){


            }else if(response.response == 1){
                $.fancybox.close();
                $(".payment_clientid_element").html(response.data);

                swal({
                    title: "Client Added Successfully Success",
                    text: response.message,
                    icon: "success",
                    button: "OK",
                  }).then((value) => {
                   //     location.reload();
                });

            }
        });
    });

    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
        dateFormat: 'mm/dd/YY'
    });


    $(".paying_bill").on('change', function () {
        $(".payment_clientid").hide();
        //$('.who_paying_bill').hide();
        //$('.who_paying_bill').val("");
        if (this.value == "2") {
            $(".payment_clientid").show();
        }
    })

    $(".clinetadd_form :input").attr("autocomplete", "off");
</script>

</script>

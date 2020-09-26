@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Clients
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
                {!! Form::open(array('route' => 'client.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'form')) !!}
                <div class="form-body">

                    <?php if (!session()->get('selectedFranchisees')){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-6">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div>
                    <?php } ?>

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
                            {!! Form::text('dob', null, array('placeholder' => 'DOB','class' => 'form-control date-picker')) !!}
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


<!--                    <fieldset class="address">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control places-autocomplete','id' => 'Street','autocomplete'=>"address-line1" )) !!}
                            <span class="bg-danger validation_error error_street">< ?= $errors->first('street'); ?></span>

                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('street'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">

                            {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control','id' => 'City','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger">< ?= $errors->first('city'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">

                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','id' => 'Country','autocomplete'=>"country" )) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>


                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">

                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control','id' => 'PostalCode','autocomplete'=>"postal-code")) !!}
                            <span class="bg-danger">< ?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    </fieldset>    -->

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
                        <div class="col-md-9">
                            {!! Form::select('paying_bill',['1'=>'Self','2'=>"Other"], null ,array('class' => 'form-control paying_bill')) !!}
                            <div class="row payment_clientid" style='display:none'>
                                <div class="col-md-10">
                                    {!! Form::select('payment_clientid', $client ,null ,array('class' => 'form-control payment_clientid_element', 'placeholder' => 'Please Select')) !!}

                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-success" data-fancybox data-type="ajax" data-src="{{ route('client-addpopup') }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="bg-danger"><?= $errors->first('paying_bill'); ?></span>
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
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
     google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            //componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);

    });

        $(".paying_bill").on('change', function () {
        $(".payment_clientid").hide();
        //$('.who_paying_bill').hide();
        //$('.who_paying_bill').val("");
        if (this.value == "2") {
            $(".payment_clientid").show();
        }
        })
</script>

<script type="text/javascript">
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
        dateFormat: 'mm-dd-YY'
    });

    /*setTimeout(
        function(){
            document.getElementById( "form" ).reset();
        },
        5
    );*/
    //$(document).ready(function() { $("#form").get(0).reset(); })
    
    $("#form :input").attr("autocomplete", "off");
</script>
@endsection

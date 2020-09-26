@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Vehicles
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
                {!! Form::open(array('route' => 'vehicles.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">
                    
                    
                    <?php if (!session()->get('selectedFranchisees')){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-9">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div> 
                    <?php } ?>
                    
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Body Type</label>
                        <div class="col-md-9">
                            {!! Form::select('body_type', $bodyType, null, array('placeholder' => 'Body Type','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicles Model</label>
                        <div class="col-md-9">
                            {!! Form::text('vehicles_model', null, array('placeholder' => 'Vehicles Model','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_model'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicles Company</label>
                        <div class="col-md-9">
                            {!! Form::text('vehicles_company', null, array('placeholder' => 'Vehicles Company','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_company'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicles Number</label>
                        <div class="col-md-9">
                            {!! Form::text('vehicles_number', null, array('placeholder' => 'Vehicles Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_number'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Max Capacity</label>
                        <div class="col-md-9">
                            {!! Form::text('max_capacity', null, array('placeholder' => 'Max Capacity','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('max_capacity'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Council License Number</label>
                        <div class="col-md-9">
                            {!! Form::text('councile_license_no', null, array('placeholder' => 'Council License Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('councile_license_no'); ?></span>
                        </div>
                    </div>                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Council Date</label>
                        <div class="col-md-9">
                            {!! Form::text('council_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Council Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('council_date'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tax Renewal Date</label>
                        <div class="col-md-9">
                            {!! Form::text('tax_renewal_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Tax Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('tax_renewal_date'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Insurance Renewal Date</label>
                        <div class="col-md-9">
                            {!! Form::text('insurance_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Insurance Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('insurance_date'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">MOT Date</label>
                        <div class="col-md-9">
                            {!! Form::text('mot_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'MOT Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('mot_date'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
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
        autoclose: true
        // dateFormat: 'YY-mm-dd'
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//            autoclose: true
//    });

</script>

@endsection

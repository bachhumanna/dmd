@extends('admin.vehicles.template')
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
                    <i class="fa fa-gift"></i> Update Vehicles</div>

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
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['vehicles.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchisee</label>
                        <div class="col-md-9">
                            {!! Form::select('franchisees_id',getFranchisees(false), null ,array('disabled'=>'disabled','placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                        </div>
                    </div>

                    <div class="form-group" style='display:none'>
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
                        <label class="col-md-3 control-label">Vehicles Make</label>
                        <div class="col-md-9">
                            {!! Form::text('vehicles_company', null, array('placeholder' => 'Vehicles Company','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_company'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Plate Number</label>
                        <div class="col-md-9">
                            {!! Form::text('vehicles_number', null, array('placeholder' => 'Vehicles Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_number'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Licenced Capacity (to carry set number of passengers) </label>
                        <div class="col-md-9">
                            {!! Form::selectRange('max_capacity', 2,10, null,array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('max_capacity'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">PHV License Number</label>
                        <div class="col-md-9">
                            {!! Form::text('phv_licence_number', null, array('placeholder' => 'PHV License Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phv_licence_number'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">PHV Issue Date</label>
                        <div class="col-md-9">
                            {!! Form::text('phv_issue_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'PHV Issue Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('phv_issue_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">PHV Expiry Date</label>
                        <div class="col-md-9">
                            {!! Form::text('phv_expiry_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'PHV Expiry Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('phv_expiry_date'); ?></span>
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
                        <label class="col-md-3 control-label">Wheelchair Accessible</label>
                        <div class="col-md-9">
                            {!! Form::select('wheelchair_access',[1=>'Yes',0=>"No"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('wheelchair_access'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> DVLA notified of modification of Colour</label>
                        <div class="col-md-9 mradio">

                            <label>
                                {{ Form::radio('color_modification', 1,null,array('class' => 'iradio_square-blue')) }} Yes
                            </label>
                            <label>
                                {{ Form::radio('color_modification', 0,null,array('class' => 'iradio_square-blue')) }} No
                            </label>






                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>

                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('vehicles.index')}}" class="btn btn-danger">Cancel</a>
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

</script>
@endsection

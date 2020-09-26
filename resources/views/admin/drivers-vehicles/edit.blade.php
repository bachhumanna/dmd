@extends('admin.drivers-vehicles.template')
@section('body')
<h1 class="page-title">Vehicles
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Driver Vehicles</div>
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
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['drivers-vehicles.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">


                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver Name</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->fullName, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->phone, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Driver Email</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->email, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->locality, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->street, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Town</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->town, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-9">
                            {!! Form::text('', $model->postcode, array('disabled'=>'disabled','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicles No</label>
                        <div class="col-md-9">
                            {!! Form::select('vehicle_id', $vehicle,  null, array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vehicles_company'); ?></span>
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
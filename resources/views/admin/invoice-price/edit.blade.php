@extends('admin.home.template')
@section('body')

<h1 class="page-title">Franchisor Invoice Price
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Edit 
                </div>
            </div>
            <div class="portlet-body form">
                 {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisor-invoiceprice.update', $model->id], 'class'=>'form-horizontal']) !!}
                
                <div class="form-body">                   
                    <div class="form-group">
                        <label class="col-md-3 control-label">From Turnover</label>
                        <div class="col-md-9">
                            {!! Form::text('from_turnover', null, array('placeholder' => 'From Turnover','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('from_turnover'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">To Turnover</label>
                        <div class="col-md-9">
                            {!! Form::text('to_turnover', null, array('placeholder' => 'To Turnover','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('to_turnover'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Base Fee</label>
                        <div class="col-md-9">
                            {!! Form::text('base_fee', null, array('placeholder' => 'Base Fee','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('base_fee'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Plus Excess</label>
                        <div class="col-md-9">
                            {!! Form::text('plus_excess', null, array('placeholder' => 'Plus Excess','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('plus_excess'); ?></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Max Monthly</label>
                        <div class="col-md-9">
                            {!! Form::text('max_monthly', null, array('placeholder' => 'Max Monthly','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('max_monthly'); ?></span>
                        </div>
                    </div>
                    
                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Update</button>
                    <a href="{{route('franchisor-invoiceprice.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

@endsection

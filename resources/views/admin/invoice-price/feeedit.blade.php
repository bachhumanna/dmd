@extends('admin.home.template')
@section('body')

<h1 class="page-title">Franchisor Fee
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
                {!! Form::model($model, ['method' => 'POST','files' => true , 'route' => ['franchisor-fees-update', $model->id], 'class'=>'form-horizontal']) !!}

                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Type</label>
                        <div class="col-md-9">
                            {!! Form::select('type', invoiceFeeType(),null, array('class' => 'form-control type')) !!}
                            <span class="bg-danger"><?= $errors->first('type'); ?></span>
                        </div>
                    </div>
                    <div class="form-group" id="months" style="display: {{ in_array($model->type,[2,3]) ? "block":"none" }} ">
                        <label class="col-md-3 control-label">Month</label>
                        <div class="col-md-9">
                            {{ Form::select('months[]', getMonths(),null, array('class' => 'form-control','multiple' => 'multiple'))}}
                            <span class="bg-danger"><?= $errors->first('months'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Fee</label>
                        <div class="col-md-9">
                            {!! Form::text('amount', null, array('placeholder' => 'Base Fee','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('amount'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">VAT</label>
                        <div class="col-md-9">
                            {!! Form::text('vat', null, array('placeholder' => 'vat','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vat'); ?></span>
                        </div>
                    </div>

                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('franchisor-invoiceprice.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
<script>
    $('.type').on('change',function(){
        if($(this).val() != 1){
            $('#months').show();
        }else{
            $('#months').hide();
        }
    })
</script>

@endsection

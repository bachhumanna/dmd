@extends('admin.faq.template')
@section('body')

<h1 class="page-title">To Do List
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
                {!! Form::open(array('route' => 'todolist.store' ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('title'); ?></span>
                        </div>
                    </div>
                       

                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date</label>
                        <div class="col-md-9">                            
                            
                            {!! Form::text('posted_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('posted_date'); ?></span>
                        
                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error">< ?= $errors->first('status'); ?></span>
                        </div>
                    </div>-->



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


</script>
 
@endsection

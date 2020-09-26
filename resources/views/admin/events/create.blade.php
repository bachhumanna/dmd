@extends('admin.faq.template')
@section('body')

<h1 class="page-title">Agenda
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
                {!! Form::open(array('route' => 'events.store' ,'method'=>'POST','class'=>'form-horizontal')) !!}
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
                            {!! Form::textArea('description', null, array('placeholder' => 'Description','id'=>'description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Date</label>
                        <div class="col-md-9">

                            {!! Form::text('posted_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger">< ?= $errors->first('posted_date'); ?></span>

                        </div>
                    </div>-->


                    <div class="form-group">
                        <label class="col-md-3 control-label">Date</label>
                        <div class="col-md-9">
                            {!! Form::text('posted_date', null, array('placeholder' => 'Date','class' => 'form-control date-picker', "autocomplete"=>"off")) !!}
                            <span class="bg-danger"><?= $errors->first('posted_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">For</label>
                        <div class="col-md-9">
                            {!! Form::select('event_for',agendaFor(), null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('event_for'); ?></span>
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
                    <a href="{{route('events.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
 <script src="{{ asset('admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

<!--<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>-->
<!--<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />-->



<script>
//    $('.date-picker').datepicker({
//        autoclose: true
//        // dateFormat: 'YY-mm-dd'
//    });

$('.date-picker').datetimepicker({
        autoclose: true
    });
</script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: "{{ url('/laravel-filemanager?type=Images') }}",
        filebrowserImageUploadUrl: "{{ url('/laravel-filemanager/upload?type=Images&_token=') }}",
        filebrowserBrowseUrl: "{{ url('/laravel-filemanager?type=Files') }}",
        filebrowserUploadUrl: "{{ url('/laravel-filemanager/upload?type=Files&_token=') }}"
    };
   // CKEDITOR.replace('description', options);
</script>



@endsection

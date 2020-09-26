@extends('admin.home.template')
@section('body')
<!--<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>-->

<h1 class="page-title">Email Template
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Email Template </div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['email-template.update', $model->id], 'class'=>'form-horizontal']) !!}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif




                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('title'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email Subject</label>
                        <div class="col-md-9">
                            {!! Form::text('subject', null, array('placeholder' => 'url','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('subject'); ?></span>
                        </div>
                    </div>






                    <div class="form-group">
                        <label class="col-md-3 control-label">From Name</label>
                        <div class="col-md-9">
                            {!! Form::text('from_name', null, array('placeholder' => 'From Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('from_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">From Email</label>
                        <div class="col-md-9">
                            {!! Form::text('from_email', null, array('placeholder' => 'From Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('from_email'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Description </label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'content', 'class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email Body </label>
                        <div class="col-md-9">
                            {!! Form::textArea('content', null, array('placeholder' => 'content','id'=>'description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('content'); ?></span>
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
<script>
//    $(document).ready(function () {
//        $('#checkedAll').on('ifChecked ifUnchecked', function (event) {
//            if (event.type == 'ifChecked') {
//                $('input.checkSingle').iCheck('check');
//            } else {
//                $('input.checkSingle').iCheck('uncheck');
//            }
//        });
//
//        $('input.checkSingle').on('ifChanged', function (event) {
//            if ($('input.checkSingle').filter(':checked').length == $('input.checkSingle').length) {
//                $('#checkedAll').prop('checked', 'checked');
//            } else {
//                $('#checkedAll').removeProp('checked');
//            }
//            $('#checkedAll').iCheck('update');
//        });
//
//    });
</script>


<!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
<script>
    var options = {
        
        allowedContent: true,
        filebrowserImageBrowseUrl: "{{ url('/laravel-filemanager?type=Images') }}",
        filebrowserImageUploadUrl: "{{ url('/laravel-filemanager/upload?type=Images&_token=') }}",
        filebrowserBrowseUrl: "{{ url('/laravel-filemanager?type=Files') }}",
        filebrowserUploadUrl: "{{ url('/laravel-filemanager/upload?type=Files&_token=') }}"
    };
    CKEDITOR.replace('description', options);
</script>







@endsection

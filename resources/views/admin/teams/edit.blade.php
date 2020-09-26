@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">UK Team
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update UK Team </div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['teams.update', $model->id], 'class'=>'form-horizontal']) !!}
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
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Job Role</label>
                        <div class="col-md-9">
                            {!! Form::text('role', null, array('placeholder' => 'Job Role','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('role'); ?></span>
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
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-9">
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-9">
                            {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control', 'accept'=>"image/*")) !!}
                            <span class="bg-danger"><?= $errors->first('image'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bio</label>
                        <div class="col-md-9">
                            {!! Form::textArea('bio', null, array('placeholder' => 'bio','id'=>'description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('bio'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Show in Company Details</label>
                        <div class="col-md-9">
                            {!! Form::select('show_company_details', [1=>"Yes", 0=>"No"],null, array('class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('show_company_details'); ?></span>
                        </div>
                    </div>

                </div>






                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('teams.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

</div>
<script>
$(document).ready(function () {
    $('#checkedAll').on('ifChecked ifUnchecked', function (event) {
        if (event.type == 'ifChecked') {
            $('input.checkSingle').iCheck('check');
        } else {
            $('input.checkSingle').iCheck('uncheck');
        }
    });

    $('input.checkSingle').on('ifChanged', function (event) {
        if ($('input.checkSingle').filter(':checked').length == $('input.checkSingle').length) {
            $('#checkedAll').prop('checked', 'checked');
        } else {
            $('#checkedAll').removeProp('checked');
        }
        $('#checkedAll').iCheck('update');
    });

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
CKEDITOR.replace('description', options);
</script>




@endsection

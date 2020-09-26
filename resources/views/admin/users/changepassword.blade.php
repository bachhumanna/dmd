@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Change Password
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>  
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'adminChangePasswordPost','method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">
                    <div class="form-group" style="display:none">
                        <label class="col-md-3 control-label">Current Passwprd</label>
                        <div class="col-md-9">
                            {!! Form::password('current_password',  array('placeholder' => 'current_password','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('current_password'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('password'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Retype Password</label>
                        <div class="col-md-9">
                            {!! Form::password('re_password',  array('placeholder' => 'Re Enter Password','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('re_password'); ?></span>
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


 
@endsection

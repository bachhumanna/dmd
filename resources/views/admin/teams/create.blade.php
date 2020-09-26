@extends('admin.home.template')
@section('body')
<h1 class="page-title">UK Team
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif









                {!! Form::open(array('route' => 'teams.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}


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
</div>
@endsection

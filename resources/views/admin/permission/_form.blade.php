@extends('permission.template')
@section('body')
<h3 class="page-title">Permission 
    <small> <?= (isset($model)) ? "Edit" : "Add" ?></small>
</h3>


<div class="row">
    @if(permit(['permissions.create','permissions.store'],['permissions.edit','permissions.update']))
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">

            <div class="portlet-body form">





                <div class="form-body">
                    @if( isset($model) )
                    {!! Form::model($model,['method' => 'PATCH','route'=>['permissions.update',$model->id],'id'=>'create','class'=>'form-horizontal','files' => true]) !!}
                    @else
                    {!! Form::open(['route' => 'permissions.store','files'=>true,'class'=>'form-horizontal']) !!}
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label required_label">Name</label>
                            <div class="col-md-9">
                                {!! Form::text('name',null,['class'=>'form-control spinner']) !!}
                            </div>
                            <div class="text-danger">{{ $errors->modelError->first('name') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Display Name</label>
                            <div class="col-md-9">
                                {!! Form::text('display_name',null,['class'=>'form-control spinner']) !!}
                            </div>
                            <div class="text-danger">{{ $errors->modelError->first('display_name') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                {!! Form::text('description',null,['class'=>'form-control spinner']) !!}
                            </div>
                            <div class="text-danger">{{ $errors->modelError->first('description') }}</div>
                        </div>


                    </div>



















                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                               <a href="{{ route('permissions.index')}}"> <button type="button" class="btn default">Cancel</button></a>
                        </div>
                    </div>


                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
    @endif
</div>

@endsection
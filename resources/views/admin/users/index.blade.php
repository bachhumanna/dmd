@extends('admin.users.template')

@section('body')

<h1 class="page-title">Users
    <small></small>
    @if(permit(['users.create']))
    <a href="{{ route('users.create') }}" class="btn btn-primary float-right"> Create </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box purple ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Advance Search </div>
                        <div class="tools">
                            <a href="" class="<?= isset($_GET['advanceSearch']) ? "collapse" : "expand" ?>"><i class="icon-collapse"></i></a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: <?= isset($_GET['advanceSearch']) ? "block" : "none" ?>">



                        {!! Form::open(['method'=>'GET','url'=>route('users.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Name</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Phone</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >DOB</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('dob', null, array('placeholder' => 'DOB','class' => 'form-control')) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="Candidates_phone2">Email</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>





                            </div>
                            <div class="clearfix"></div>
                            <div class="form-actions" style="text-align: center">
                                <input class="btn green" type="submit" name="advanceSearch" value="Search">            
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div><!-- search-form -->
                </div>
            </div>
        </div>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Users </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone </th>
                            <th>Street</th>
                            <th>Town</th>
                            <th>Post Code </th>
                            <th>Status</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>

                            <td>{{ $model->name }}</td>
                            <td>{{ $model->email}}</td>
                            <td>{{ $model->phone}}</td>
                            <td>{{ $model->street }}</td>
                            <td>{{ $model->town }}</td>
                            <td>{{ $model->postcode}}</td>
                            <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                            <td  class="align-center">

                                @if(permit(['users.show']))    
                                <a class="btn btn-info" href="{{ route('users.show',$model->id) }}">Show</a>
                                @endif

                                @if(permit(['users.edit']))
                                <a class="btn btn-primary" href="{{ route('users.edit',$model->id) }}">Edit</a>
                                @endif

                                @if(permit(['users.destroy']))
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>



@endsection
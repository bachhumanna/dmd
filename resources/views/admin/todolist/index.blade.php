@extends('admin.users.template')
@section('body')

    <h1 class="page-title">To Do List
        <small></small>
        @if(isSuperAdmin())
        <a href="{{ route('todolist.create') }}" class="btn btn-primary float-right"> Create </a>
        @endif  
    </h1>
    <div class="row">
        <div class="col-md-12">
             
            

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage To Do List 
                    </div>
                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
<!--                                <th>Message</th>-->
                                <th>Date</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                
                                <td>{{ $model->title }}</td>
<!--                                <td>{{ str_limit($model->answer,100,"..")}}</td>-->
                                <td>{{ $model->description }}</td>
                                <td>{{ $model->posted_date }}</td>
<!--                                <td>{{ $model->created_at }}</td>-->
<!--                                <td>< ?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>-->
                                
                                <td  class="align-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('todolist.show',$model->id) }}">Show</a>
                                    <a class="btn btn-primary btn-xs" href="{{ route('todolist.edit',$model->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['todolist.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
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

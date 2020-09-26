@extends('admin.role.template')

@section('body')

    <h1 class="page-title">Email Template
        <small></small>
        
    </h1>
    <div class="row">
        <div class="col-md-12">

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Email Template </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Title</th>
                                <th>Email Subject</th>
                                <th>From</th>
                                <th>From Email</th>
                                <th>Status</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                
                                <td>{{ $model->title }}</td>
                                <td>{{ $model->subject }}</td>
                                <td>{{ $model->from_name }}</td>
                                <td>{{ $model->from_email}}</td>
                                <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                <td  class="align-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('email-template.show',$model->id) }}">Show</a>
                                    <a class="btn btn-primary btn-xs" href="{{ route('email-template.edit',$model->id) }}">Edit</a>
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

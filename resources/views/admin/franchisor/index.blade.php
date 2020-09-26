@extends('admin.users.template')
@section('title')
Franchisor | Manage
@endsection
@section('body')
<h1 class="page-title">Franchisor
    <small></small>
    @if(permit(['franchisor.create']))
    <a href="{{ route('franchisor.create') }}" class="btn btn-primary float-right"> Create </a>
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



                        {!! Form::open(['method'=>'GET','url'=>route('franchisor.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

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
                                    <label class="col-md-5 control-label" >Email</label>
                                    <div class="col-md-7">
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="Candidates_phone2">Post Code</label>
                                    <div class="col-md-7">
                                        {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control')) !!}
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
                    <i class="fa fa-cogs"></i>Manage Franchisor </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>@sortablelink('name','Name')</th>
                            <th>@sortablelink('email','Email')</th>
                            <th>@sortablelink('phone','Phone')</th>
                            <th>@sortablelink('locality','House No')</th>
                            <th>@sortablelink('address','Address')</th>
                            <!-- <th>City</th>
                            <th>Post Code </th> -->
                            <th>Status</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>

                            <td>{{ $model->name }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->phone }}</td>
                            <td>{{ $model->locality }}</td>
                            <td>{{ $model->address }}</td>
                            <!-- <td>{{ $model->town }}</td>
                            <td>{{ $model->postcode}}</td> -->
                            <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                            <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['franchisor.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('franchisor.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['franchisor.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('franchisor.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['franchisor.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['franchisor.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                            {!! Form::submit('', ['class' => 'btn btn-danger btn-xs','title'=>'Delete']) !!}
                                            <span class="btnIcon red" title="">
                                                <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                            {!! Form::close() !!}
                                        @endif
                                    </li>

                                </ul>



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

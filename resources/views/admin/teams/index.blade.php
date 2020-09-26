@extends('admin.role.template')

@section('body')

<h1 class="page-title">UK Team
    <small></small>
    @include('common.newBooking')
    @if(permit(['teams.create']))
    <a href="{{ route('teams.create') }}" class="btn btn-primary float-right"> Create </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>UK Team 
                </div>
            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('role')</th>
                            <th>@sortablelink('email')</th>
<!--                                <th>Phone</th>-->
                            <th>@sortablelink('phone')</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>

                            <td>{{ $model->name }}</td>
                            <td>{{ $model->role }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->phone}}</td>
<!--                                <td><img width="200px" src='{{ asset("images/teams/".$model->photo) }}' ></td>-->
                            <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['teams.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('teams.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['teams.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('teams.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['teams.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['teams.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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

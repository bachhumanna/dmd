@extends('admin.users.template')
@section('body')
    <h1 class="page-title">Vehicles
        <small></small>
        @include('common.newBooking')
        @if(permit(['vehicles.create']))
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary float-right"> Create </a>
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
                            {!! Form::open(['method'=>'GET','url'=>route('vehicles.index'),'class'=>'form-horizontal','role'=>'search'])  !!}
                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Vehicles Model</label>
                                        <div class="col-md-7">
                                            {!! Form::text('vehicles_model', null, array('placeholder' => 'Vehicles Model','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Vehicles Make</label>
                                        <div class="col-md-7">
                                            {!! Form::text('vehicles_company', null, array('placeholder' => 'Vehicles Company','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Vehicles Number</label>
                                        <div class="col-md-7">
                                            {!! Form::text('vehicles_number', null, array('placeholder' => 'Vehicles Number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Max Capacity</label>
                                        <div class="col-md-7">
                                            {!! Form::text('max_capacity', null, array('placeholder' => 'Max Capacity','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-actions" style="text-align: center">
                                    <input class="btn green" type="submit" name="advanceSearch" value="Search">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Vehicles </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <?php if (!getActiveFranchisee()) { ?>
                                    <th>@sortablelink('franchisees_id','Franchise')</th>
                                <?php } ?>
                                <th>@sortablelink('vehicles_model','Model')</th>
                                <th>@sortablelink('vehicles_company','Make') </th>
                                <th>@sortablelink('vehicles_number','Plate Number')</th>
                                <th>@sortablelink('insurance_date','Insurance Date')</th>
                                <th>@sortablelink('tax_renewal_date','Tax')</th>
                                <th>@sortablelink('mot_date','MOT Date')</th>


                                <th>@sortablelink('wheelchair_access','WAV')</th>
                                <th>@sortablelink('status','Status')</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>

                                <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ @$model->franchisees->name }}</th>
                                <?php } ?>
                                <td>{{ $model->vehicles_model}}</td>
                                <td>{{ $model->vehicles_company}}</td>
                                <td>{{ $model->vehicles_number}}</td>
                                <td>{{ showDate($model->insurance_date,true)}}</td>
                                <td>{{ showDate($model->tax_renewal_date,true)}}</td>
                                <td>{{ showDate($model->mot_date,true)}}</td>

                                <td><?= $model->wheelchair_access ? "<span class='label label-sm label-success'> YES </span>" : "<span class='label label-sm label-danger'> NO </span>" ?></td>
                                <td><?= $model->status ? "<span class='lab el label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['vehicles.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('vehicles.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['vehicles.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('vehicles.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['vehicles.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['vehicles.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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

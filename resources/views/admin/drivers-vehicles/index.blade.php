@extends('admin.drivers-vehicles.template')

@section('body')

    <h1 class="page-title">Drivers Vehicles
        <small></small>
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



                            {!! Form::open(['method'=>'GET','url'=>route('drivers-vehicles.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Vehicles Model</label>                    
                                        <div class="col-md-7">
                                            {!! Form::text('vehicles_model', null, array('placeholder' => 'Vehicles Model','class' => 'form-control')) !!}
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
                        <i class="fa fa-cogs"></i>Manage Vehicles </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Driver&nbsp;Name</th>
                                <th>Phone</th>
                                <th>Vehicles Number </th>
                                <th>Vehicles Company </th>
                                <th>Max Capacity </th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{ $model->fullName}}</td>
                                <td>{{ $model->phone }}</td>
                                <td>{{ @$model->driverVehicles->vehicle->vehicles_number}}</td>
                                <td>{{ @$model->driverVehicles->vehicle->vehicles_company}}</td>
                                <td>{{ @$model->driverVehicles->vehicle->max_capacity}}</td>
                                <td  class="align-center">
                                    @if(isset($model->driverVehicles->vehicle))
                                        @if(permit(['drivers-vehicles.edit']))
                                            <a class="btn btn-primary btn-xs" href="{{ route('drivers-vehicles.edit',$model->id) }}">Edit</a>
                                        @endif

                                        @if(permit(['drivers-vehicles.destroy']))                                   
                                        {!! Form::open(['method' => 'DELETE','route' => ['drivers-vehicles.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                        @endif
                                    @else
                                        @if(permit(['drivers-vehicles.edit']))
                                            <a class="btn btn-primary btn-xs" href="{{ route('drivers-vehicles.edit',$model->id) }}">Allocation</a>
                                        @endif
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

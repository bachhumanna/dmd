@extends('admin.users.template')

@section('body')

    <h1 class="page-title">Companion Drivers
        <small></small>
        @include('common.newBooking')
        <?php /*
        @if(permit(['driver.create']))
        <a href="{{ route('driver.create') }}" class="btn btn-primary float-right"> Create </a>
        @endif
        */?>
        @if(permit(['staff.create']))
        <a href="{{ route('staff.create') }}" class="btn btn-primary float-right"> Create </a>
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



                            {!! Form::open(['method'=>'GET','url'=>route('driver.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

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
                        <i class="fa fa-cogs"></i>Manage Companion Drivers </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>@sortablelink('name','Name')</th>
                                <th>@sortablelink('email','Contact Details')</th>
                                <th>@sortablelink('locality','House No')</th>
                                <th>@sortablelink('address','Address')</th>
                                <th>@sortablelink('driverVehicles.vehicle','WAV')</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>@sortablelink('status','Status')</th>
                                <th class="align-center" style="width:180px">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>

                                <td>{{ $model->name }}</td>
                                <td>
                                    {{ $model->email }}
                                    <br>
                                    <?= $model->phone ?>
                                </td>
<!--                                <td>{{ $model->phone }}</td>-->
                                <td>{{ $model->locality }}</td>
                                <td>{{ $model->address }}</td>
                                <td><?php
                                    if(isset($model->driverVehicles->vehicle)){
                                        //pr($model->driverVehicles->vehicle->wheelchair_access);
                                        echo $model->driverVehicles->vehicle->wheelchair_access ? "<span class='label label-sm label-success'> YES </span>" : "<span class='label label-sm label-danger'> NO </span>";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $model->driverVehicles['vehicle']['vehicles_company'] ?></td>
                                <td><?php echo $model->driverVehicles['vehicle']['vehicles_number'] ?></td>
                                <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['driver.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('driver.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['driver.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('driver.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>

                                    <li>
                                        <a class="btn btn-primary btn-xs" data-fancybox data-type="ajax" data-src="{{ route('staff-changepass',$model->id) }}" title="Change Password">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li>
                                        @if(permit(['driver.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['driver.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js"></script>
@endsection

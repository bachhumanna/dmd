@extends('admin.users.template')

@section('body')

    <h1 class="page-title">Clients
        <small></small>
        @include('common.newBooking')
        @if(permit(['client.create']))
        <a href="{{ route('client.create') }}" class="btn btn-primary float-right"> Create </a>
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



                            {!! Form::open(['method'=>'GET','url'=>route('client.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >First Name</label>
                                        <div class="col-md-7">
                                            {!! Form::text('firstname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-5 control-label" >Phone</label>
                                        <div class="col-md-7">
                                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Surname</label>
                                        <div class="col-md-7">
                                            {!! Form::text('surname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >House Number</label>
                                        <div class="col-md-7">
                                            {!! Form::text('house_number', null, array('placeholder' => 'House Number','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="form-actions">
                                    <input class="btn green" type="submit" name="advanceSearch" value="Search">

                                    <input class="btn green" type="submit" name="downloadpdf" value="Download PDF">
                                    <input class="btn green" type="submit" name="downloadcsv" value="Download CSV">

                                        <?php /*
                                         <a href="{{ url('downloadExcel/csv') }}" class="btn green">Download CSV</a>
                                    <a target="_blank" class="btn green" href="{{ route('pdfpreview') }}" title="Show">Download PDF</a>
                                    */ ?>

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
                        <i class="fa fa-cogs"></i>Manage Clients</div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                 <?php if (!getActiveFranchisee()) { ?>
                                <th>@sortablelink('franchisees_id','Franchise')</th>
                                <?php } ?>
                                <th>@sortablelink('firstname','Name')</th>
                                <th>@sortablelink('email','Email')</th>
                                <th>@sortablelink('phone','Mobile')</th>
                                <th>@sortablelink('home_number','Landline')</th>
                                <th>@sortablelink('address','Address 1')</th>
<!--                                <th>Address 2</th>                                -->
                                <th class="align-center" style="width: 160px;">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>

                               <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ $model->franchisees->name }}</th>
                            <?php } ?>
                                <td>{{ $model->firstname }} {{ $model->surname }}</td>
                                <td>{{ $model->email}}</td>
                                <td>{{ $model->phone}}</td>
                                <td>{{ $model->home_number }}</td>
                                <td>{{ $model->address }}</td>
<!--                                <td>{{ $model->house_number}}</td>-->
<!--                                <td>< ?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>-->
                                <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['client.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('client.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['client.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('client.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['client.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['client.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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

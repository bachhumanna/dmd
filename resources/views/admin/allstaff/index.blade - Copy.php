@extends('admin.users.template')
@section('title')
Franchisee | Manage
@endsection
@section('body')
<h1 class="page-title">Staff
    <small></small>
    @include('common.newBooking')
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

                        {!! Form::open(['method'=>'GET','url'=>route('staff.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Username</label>
                                    <div class="col-md-7">
                                        {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
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
                                    <label class="col-md-5 control-label" >Name</label>
                                    <div class="col-md-7">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-5 control-label" >Email</label>
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
                    <i class="fa fa-cogs"></i>Manage Staff</div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>@sortablelink('franchisees_id','Franchise')</th>
                            <?php } ?>
                            <th>@sortablelink('user_type','User Type')</th>
                            <th>@sortablelink('username','Username')</th>

                            <th>@sortablelink('phone','Phone')</th>

                            <th>@sortablelink('locality','Base Address')</th>
<!--                            <th>Status</th>-->
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <?php
                        $usertype = userType();
                        ?>
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ @$model->franchisees->name }}</th>
                            <?php } ?>
                            <td><?= $usertype[$model->user_type]; ?></td>
                            <td>{{ $model->username }}</td>

                            <td>{{ $model->phone}}</td>

                            <td>{{ $model->locality }}</td>

<!--                            <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>-->
                            <td  class="align-center actionIcon">





                                <ul>

                                    <li>
                                        @if(permit(['staff.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('staff.show',$model->id) }}" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>

                                    @if(permit(['staff.edit']))
                                    <li>

                                        <a class="btn btn-primary btn-xs" href="{{ route('staff.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                    </li>
                                     @endif
                                    @if(permit(['staff-changepass']))
                                    <li>
                                        <a class="btn btn-primary btn-xs" data-fancybox data-type="ajax" data-src="{{ route('staff-changepass',$model->id) }}" title="Change Password">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                     @endif

                                    <li>
                                        @if(permit(['franchisee-user.destroy']))
                                        {!! Form::open(['method' => 'DELETE','route' => ['franchisee-user.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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

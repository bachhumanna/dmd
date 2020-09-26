@extends('admin.users.template')

@section('body')

<h1 class="page-title">Quotes
    <small></small>
    @if(permit(['enquiry.create']))
    <a href="{{ route('enquiry.create') }}" class="btn btn-primary float-right"> Create </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">
        <?php /* ?>
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
                    <div class="portlet-body form" style="">        
                        {!! Form::open(['method'=>'GET','url'=>route('enquiry.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

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
                                    <label class="col-md-5 control-label" >Booking #</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('booking_no', null, array('placeholder' => 'Booking #','class' => 'form-control')) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Booking Date From</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('Start_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Booking Date To</label>                    
                                    <div class="col-md-7">
                                        {!! Form::text('Start_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="Candidates_phone2">Status</label>                    
                                    <div class="col-md-7">
                                        {!! Form::select('status',bookingStatus(), null ,array('placeholder' => 'All','class' => 'form-control')) !!}
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
        <?php */ ?>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Quotes </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>Franchise</th>
                            <?php } ?>
                            <th>Booking#</th>
                            <th>Booking&nbsp;Time</th>
                            <th>Total&nbsp;Pice</th>
                            <th>Total&nbsp;Time</th>

                            <th>Base </th>
                            <th>Pickup</th>
                            <th>Name</th>
                            <th>Mobile </th>
                            <th>Destination</th>
                            <th class="align-center" style="width:280px">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ @$model->franchisees->name }}</th>
                            <?php } ?>
                            <td>{{ $model->order_id }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                            <td>{{ $model->total_duration }} Min</td>

                            <td>{{ $model->base_location}}</td>
                            <td><?= $model->pickup ?></td>
                            <td>{{ $model->client->name }}</td>
                            <td>{{ $model->client->phone }}</td>
                            <td>{{ @$model->dropLocation->location_name}}</td>
                            <td  class="align-center  actionIcon">
                                 <ul>
                                    <li>
                                        @if(permit(['enquiry.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('enquiry.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if(permit(['enquiry.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['enquiry.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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
@section('pagescript')
<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script>
    $('.date-picker').datepicker({
        autoclose: true
    });
    
    $(".fancybox").fancybox();
</script>
@endsection
@section('pagestyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
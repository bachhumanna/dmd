@extends('admin.users.template')

@section('body')

<?php // pr($models->toarray());exit;?>

<h1 class="page-title">Paid 
    <small></small>
    @include('common.newBooking')
    @if(permit(['booking.create']))
   <?php /* <a href="{{ route('booking.create') }}" class="btn btn-primary float-right"> Create </a> */ ?>
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
                    <div class="portlet-body form" style="display: none;">
                        {!! Form::open(['method'=>'GET','url'=>route('invoice.paid'),'class'=>'form-horizontal','role'=>'search'])  !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Name</label>
                                    <div class="col-md-7">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-6">
                                       <div class="form-group">
                                    <label class="col-md-5 control-label" >Phone</label>
                                    <div class="col-md-7">
                                        {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>




                            <div class="clearfix"></div>
                            <div class="form-actions">
                                <input class="btn green" type="submit" name="advanceSearch" value="Search">
                                <input class="btn green pull-right ml10" type="submit" name="downloadpdf" value="Download PDF">
                                <input class="btn green pull-right" type="submit" name="downloadcsv" value="Download CSV">
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
                    <i class="fa fa-cogs"></i>Manage Paid Invoice  </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>@sortablelink('franchisees_id','Franchise')</th>
                            <?php } ?>
                            <th>@sortablelink('invoice_number','Invoice#')</th>
                            <th>@sortablelink('invoice_date','Invoive Date')</th>
                            <!--<th>@sortablelink('payment_date','Payment Date')</th>-->
                            <th>@sortablelink('client_id','Client Name') </th>
                            <th>@sortablelink('total_amount','Invoice Amount')</th>
                            <th>@sortablelink('booking_count','No of jobs')</th>                            
<!--                            <th>Total&nbsp;Time</th>-->                            
                            <!--<th>Phone </th>-->
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ @$model->franchisees->name }}</th>
                            <?php } ?>
                            <td> {{ $model->invoice_number }}</td>
                            <td> {{ showDate($model->invoice_date) }}</td>
                            <!--<td> {{ showDate($model->payment_date) }}</td>-->
                            <td>{{ @$model->client->name }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->total_amount }}</td>
                            <td>{{ $model->booking_count }}</td>                            
                            <!--<td>{{ $model->total_duration }} Min</td>-->                            
                            <!--<td>{{ @$model->client->phone }}</td>-->
                            <td  class="align-center" style="width: 112px;">
                                @if(permit(['booking.show']))
                                <!-- <a class="btn btn-info btn-xs" href="{{ route('invoice.show',$model->id) }}">Show</a>-->
                                @endif
                                <a class="btn btn-info btn-xs" href="{{ route('invoice.invoice',$model->id) }}">Invoice</a>
                                <!--<a class="btn btn-success btn-xs fancybox"  data-type="ajax"  href="javascript:;"  data-src="{{ route('booking.getRepet',$model->id) }}">Repeat</a>-->
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

@extends('admin.users.template')

@section('body')

<h1 class="page-title">Quotes
    <small></small>
    @include('common.newBooking')
    <!--    @if(permit(['booking.create']))
        <a href="{{ route('booking.create') }}" class="btn btn-primary float-right"> New Booking </a>
        @endif-->
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
                        {!! Form::open(['method'=>'GET','url'=>route('quotes.index'),'class'=>'form-horizontal','role'=>'search'])  !!}
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Name</label>
                                    <div class="col-md-7">
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Mobile</label>
                                    <div class="col-md-7">
                                        {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Quotes #</label>
                                    <div class="col-md-7">
                                        {!! Form::text('booking_no', null, array('placeholder' => 'Quotes #','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Show Archive</label>
                                    <div class="col-md-7">
                                        {{ Form::checkbox('archive', 1,null,array('class' => '')) }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Pickup Time From</label>
                                    <div class="col-md-7">
                                        {!! Form::text('Start_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Pickup Time To</label>
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
                                <div class="form-group" style="display:none">
                                    <label class="col-md-5 control-label" for="payment_status">Payment Status</label>
                                    <div class="col-md-7">
                                        {!! Form::select('payment_status',[1=>'Paid',2=>"Unpaid"], null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
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
                    <i class="fa fa-cogs"></i>Manage Quotes </div>
            </div>
            <div class="portlet-body flip-scroll completeTable">
              <div class="scrollChain">
                <div class="scrollBar">
                </div>
              </div>
              <div class="scrollTable">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>@sortablelink('franchisees_id','Franchise')</th>
                            <?php } ?>
                            <th>@sortablelink('order_id','#')</th>
                            <th>@sortablelink('client_id','Client')</th>
                            <th>@sortablelink('booking_time','Date')</th>
                            <th>@sortablelink('total_price','Price')</th>
                            <th>@sortablelink('total_duration','Total Time')</th>
                            <th>@sortablelink('base_location','Base') </th>
                            <th>Address</th>                            
                            <th>Mobile </th>
                            <th>Destination</th>
<!--                            <th>Payment Status</th>-->
                            <th class="text-center">@sortablelink('status','Status')</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ $model->franchisees->name }}</th>
                            <?php } ?>
                            <td>{{ substr($model->order_id, -2) }}</td>
                            <td class="nameAddress">{{ $model->client->name }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                            <td>{{ $model->total_duration }} Min</td>

                            <td class="nameAddress">{{ $model->base_location}}</td>
                            <td class="nameAddress"><?= $model->pickup ?></td>                            
                            <td>{{ $model->client->phone }}</td>
                            <td class="nameAddress">{{ @$model->dropLocation->location_name}}</td>
<!--                                    <td>< ?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>-->

                            <td class="text-center faqStatus"><?= @$model->status ?></td>
                            <td  class="align-center actionIcon">



                                <ul>
                                 <li>
                                    <a class="btn btn-success btn-xs" href="{{ route('quotes.show',$model->id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </li>


                                <!--{!! Form::open(['method' => 'POST','route' => ['approve-quote', $model->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Approve', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                {!! Form::close() !!} -->



                                <a class="btn btn-success btn-xs" data-fancybox title="Approve" data-type="ajax" data-src="<?= route('approve-quote',array('id'=>$model->id)) ?>" href="javascript:;">
                                        <!-- Approve -->
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                </a>

                                </ul>

                                <ul style="display: none;">
                                    @if(permit(['booking.show']))
                                    <li>
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('booking.show',$model->id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    @endif
                                    <?php if (!$model->trip_status) { ?>
                                        @if(permit(['booking.edit']))
                                        <li>
                                            <a class="btn btn-info btn-xs purple" href="{{ route('booking.edit',$model->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </li>
                                        @endif
                                    <?php } ?>

                                    <li class="moreIcons">
                                        <a href="javascript:;" class="more small_btn greydark" title="More"><i class="fa fa-chevron-up upArrow" aria-hidden="true"></i></a>
                                        <div id='icons' style="display:none;" class="listIcons">
                                            <ul>
                                                <li>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['booking.destroy', $model->id],'style'=>'display:inline']) !!}
                                                    <?php if ($model->trashed()) { ?>
                                                        {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-xs danger restore-alert']) !!}

                                                        <span class="btnIcon red" title="">
                                                            <i class="fa fa-trash-o"  aria-hidden="true"></i>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="btnIcon red" title="">
                                                            <i class="fa fa-trash-o"  aria-hidden="true"></i>
                                                        </span>
                                                        {!! Form::submit('Archive', ['class' => 'btn btn-primary btn-xs purple delete-alert']) !!}
                                                    <?php } ?>
                                                    {!! Form::close() !!}

                                                </li>
                                                <li>
                                                    {!! Form::open(['method' => 'post','route' => ['booking.markcomplete', $model->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('', ['class' => 'btn btn-danger btn-xs delete-alert','title'=>'Mark as Complete']) !!}
                                                    <span class="btnIcon red" title="">
                                                        <i class="fa fa-list-alt"  aria-hidden="true"></i>
                                                    </span>
                                                    {!! Form::close() !!}

                                                </li>
                                                <li>
                                                    <a class="btn btn-success btn-xs fancybox"  data-type="ajax"  href="javascript:;"  data-src="{{ route('booking.getRepet',$model->id) }}">
                                                        <i class="fa fa-repeat" aria-hidden="true"></i>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
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

    $('.scrollChain').each(function(){
      var wth = $(this).next('.scrollTable').find('table').width();
      $('.scrollBar').width(wth);
    })
    $('.scrollChain').scroll(function(){
        $('.scrollTable').scrollLeft($('.scrollChain').scrollLeft());
    });
    $('.scrollTable').scroll(function(){
        $('.scrollChain').scrollLeft($('.scrollTable').scrollLeft());
    });
    $(window).resize(function(){
      $('.scrollChain').each(function(){
        var wth = $(this).next('.scrollTable').find('table').width();
        $('.scrollBar').width(wth);
      })
    });
</script>
@endsection
@section('pagestyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
<link href="{{ asset('admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

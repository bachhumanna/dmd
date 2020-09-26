@extends('admin.faq.template')

@section('body')
<!--<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>-->
<h1 class="page-title">Processing
    <small></small>
    @include('common.newBooking')

</h1>

@if(!empty($errors->first()))
<div class="row col-lg-12">
    <div class="alert alert-danger">
        <span>{{ $errors->first() }}</span>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" >
            <div class="visual">
                <i class="fa fa-gbp"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ env('CURRENCY_SYM') }}<span data-counter="counterup" data-value="<?= $finalinvoiceprice ?>">0</span>
                </div>
                <div class="desc">Total Unpaid Invoices</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green"  >
            <div class="visual">
                <i class="fa fa-gbp"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $unpaidbookingCount }}">0</span>
                </div>
                <div class="desc">Unpaid Invoices</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" >
            <div class="visual">
                <i class="fa fa-gbp"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ env('CURRENCY_SYM') }}  <span data-counter="counterup" data-value="{{ $previousMonthRevenue }}"></span> </div>
                <div class="desc">Total revenue in previous month</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" >
            <div class="visual">
                <i class="fa fa-gbp"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ env('CURRENCY_SYM') }}   <span data-counter="counterup" data-value="{{ $currentMonthRevenue }}"></span> </div>
                <div class="desc">Total Revenue in month</div>
            </div>
        </a>
    </div>
</div>


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
                {!! Form::open(['method'=>'GET','url'=>route('invoice.uninvoiced'),'class'=>'form-horizontal','role'=>'search'])  !!}

                <div class="form-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-5 control-label" >Client Name</label>
                            <div class="col-md-7">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-5 control-label" >Payment Type</label>
                            <div class="col-md-7">
                                {!! Form::select('payment_mode',paymentMode(),null,array('class' => 'form-control')) !!}

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="form-actions">
                        <input class="btn green" type="submit" name="advanceSearch" value="Search">

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>
                    Processing
                </div>
            </div>

            <div class="portlet-body flip-scroll">
                {!! Form::open(['method' => 'GET','route' => ['invoice.group-invoice']]) !!}

                <span class="_cancel-booking-invoice">
                    <!--Cancel --> 
                </span>
                
                <div class="form-actions float-right">
                    <!--{!! Form::submit('Generate Final Invoice', ['class' => 'btn green','title'=>'finalize','name'=>'serialize', 'onsubmit'=>"return confirm('Finalize ! Are you sure? ')"  ]) !!}-->
                    {!! Form::submit('Group Invoice', ['class' => 'btn green','title'=>'Group Preview','name'=>'group_preview']) !!}
                </div>
                <div class="clearfix"></div>

              <div class="completeTable2">
                <!-- <div class="scrollChain">
                <div class="scrollBar" style="width: 1388px;">
                </div>
                </div> -->

                <div class="scrollTable2">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th></th>
                            <th class="table-bookin-id">@sortablelink('order_id','Booking#')</th>
                            <th>@sortablelink('booking_time','Date of journey')</th>
                            <th>@sortablelink('client_id','Client Name')</th>
                            <th>Amount</th>
                            <!-- <th>Pickup</th> -->                            
                            <!--<th>Phone </th>-->
                            <th>Destination </th>
                            <th class="align-center"></th>
<!--                            <th>Payment Status</th>-->
<!--                            <th class="align-center">Action </th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unpaidmodels as $model)
                        <tr class="{{ $model->trip_status == 4 ? "cancel" : "" }}">
                            <td>
                                <label class="checkbox-container">
                                    {{ Form::checkbox('booking_ids[]',$model->id,null,array('data-checkbox'=>"icheckbox_square-blue",'class' => "icheck checkSingle select_bookings client_".$model['client_id'], 'rel' => $model['client_id'] )) }}
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $model->order_id }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td class="nameAddress">{{ $model->client->name }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ number_format($model->invoice_price,2) }}</td>
                            <!-- <td class="nameAddress"><?= $model->pickup ?></td> -->                            
                            <!--<td>{{-- $model->client->phone --}}</td>-->
                            <td class="nameAddress">{{ @$model->dropLocation->location_name}}</td>
                            <td class="align-center">
                                <a class="btn btn-info btn-xs" href="{{ route('invoice.indv-invoice',$model->id) }}" title="View Invoice">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                
                                                                
                                @if($model->trip_status == 4)
                                    <a class="btn btn-info btn-xs" onclick="return confirm('Are you sure?')" href="{{ route('cancel-bokking.delete',$model->id) }}" title="Delete Invoice">
                                        <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                    </a>                                    
                                @endif
                            </td>
                            <!--<td>< ?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>-->
<!--                            <td  class="align-center actionIcon">
                                <ul>
                                     <li>
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('invoice.preview',$model->id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li> 
                                    <li>
                                        <a class="btn btn-info btn-xs purple" href="{{ route('invoice.edit',$model->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </li>

                                     <li> 

                                        <a class="btn btn-info btn-xs purple" onclick="alert('Finalize ! Are you sure?');" href="{{ route('invoice.finalized',$model->client_id) }}"  title="Edit"><i class="fa fa-credit-card " aria-hidden="true"></i></a>
                                        <?php /*
                                          {!! Form::open(['method' => 'post','route' => ['invoice.finalized', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Finalize ! Are you sure? ')"  ]) !!}
                                          {!! Form::submit('', ['class' => 'btn btn-danger btn-xs credit-card','title'=>'Finalized']) !!}
                                          <span class="btnIcon red" title="">
                                          <i class="fa fa-credit-card " aria-hidden="true"></i>
                                          </span>
                                          {!! Form::close() !!}

                                         */ ?>
                                     </li> 

                                    <?php // } ?>
                                </ul>
                            </td>-->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              </div>
                {!! Form::close() !!}
                {!! $unpaidmodels->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>
<style>
    .cancel-booking-invoice{
        position: relative;
        z-index: 0;
        font-size: 20px;
        padding-left: 30px;

    }
    .cancel-booking-invoice:before{
        content: '';
        position: absolute;
        left: 0px;
        top: 0px;
        bottom: 0px;
        margin: auto;
        width:25px;
        height: 25px;
        background-color:  rgba(206,109,109,.24);
        border: 1px solid #F00
    }
    .cancel{
        background-color: rgba(206,109,109,.24) !important;

    }
    /* The container */
    .checkbox-container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #7d7b7b;
    }

    /* On mouse-over, add a grey background color */
    .checkbox-container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .checkbox-container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkbox-container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>


<script>
    $(document).ready(function () {

        $(".select_bookings").click(function () {

            $this = $(this);
            client_id = $this.attr('rel');

            if ($(".select_bookings:checked").length) {
                $(".select_bookings").not(".client_" + client_id).attr('disabled', true);
            } else {
                $(".select_bookings").attr('disabled', false);
                //$(".select_bookings").iCheck('disable');
            }

        });
        //
        // $('.scrollChain').each(function(){
        //   var wth = $(this).next('.scrollTable').find('table').width();
        //   $('.scrollBar').width(wth);
        // })
        // $('.scrollChain').scroll(function(){
        //     $('.scrollTable').scrollLeft($('.scrollChain').scrollLeft());
        // });
        // $('.scrollTable').scroll(function(){
        //     $('.scrollChain').scrollLeft($('.scrollTable').scrollLeft());
        // });
        // $(window).resize(function(){
        //   $('.scrollChain').each(function(){
        //     var wth = $(this).next('.scrollTable').find('table').width();
        //     $('.scrollBar').width(wth);
        //   })
        // });

    });

</script>

@endsection

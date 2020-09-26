@extends('admin.users.template')

@section('body')

<h1 class="page-title">Bookings
    <small></small>
   @include('common.newBooking')
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
                        {!! Form::open(['method'=>'GET','url'=>route('booking.cancelled'),'class'=>'form-horizontal','role'=>'search'])  !!}

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
                                    <label class="col-md-5 control-label" >Pickup Time	 From</label>
                                    <div class="col-md-7">
                                        {!! Form::text('start_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Pickup Time To</label>
                                    <div class="col-md-7">
                                        {!! Form::text('end_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>


                                <div class="form-group" style="">
                                    <label class="col-md-5 control-label" for="payment_status">Payment Status</label>
                                    <div class="col-md-7">
                                        {!! Form::select('payment_status',[1=>'Paid',2=>"Unpaid"], null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                                    </div>
                                </div>




                                <div class="form-group">


                                </div>



                            </div>
                            <div class="clearfix"></div>
                            <div class="form-actions">
                                <input class="btn green" type="submit" name="advanceSearch" value="Search">
                                <!--<input class="btn green pull-right ml10" type="submit" name="downloadpdf" value="Download PDF">
                                <input class="btn green pull-right" type="submit" name="downloadcsv" value="Download CSV"> -->

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
                    <i class="fa fa-cogs"></i>Cancelled Bookings </div>
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
                            <th  class="__table-bookin-id" >@sortablelink('order_id','#')</th>
                            <th>@sortablelink('client_id','Client')</th>
                            <th>@sortablelink('booking_time','Date')</th>
                            <th>Price</th>
                            <th>@sortablelink('total_duration','Total Time')</th>

                            <th>@sortablelink('base_location','Base')</th>
                            <th>Address</th>                            
                            <th>@sortablelink('client_id','Mobile')</th>
                            <th>@sortablelink('dropLocation.location_name','Destination')</th>
                            <th>@sortablelink('payment_status','Status')</th>

                            <th class="align-center" style="">Action </th>
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
                            <td class="faqStatus"><?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>


                            <td  class="align-center actionIcon" style="width: 112px;">

                                <ul>
                                    @if(permit(['booking.show']))
                                    <li>
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('booking.show',$model->id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    @endif

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

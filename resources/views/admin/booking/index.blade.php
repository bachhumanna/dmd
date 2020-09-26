@extends('admin.users.template')

@section('body')

<h1 class="page-title">Bookings
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
                        {!! Form::open(['method'=>'GET','url'=>route('booking.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Client</label>
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
                                    <label class="col-md-5 control-label" >Booking #</label>
                                    <div class="col-md-7">
                                        {!! Form::text('booking_no', null, array('placeholder' => 'Booking #','class' => 'form-control')) !!}
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
                                        {!! Form::text('start_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Pickup Time To</label>
                                    <div class="col-md-7">
                                        {!! Form::text('end_date', null, array('placeholder' => 'Booking Date','class' => 'form-control date-picker', 'data-date-format'=>"yyyy-mm-dd")) !!}
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
                            <div class="form-actions">
                                <input class="btn green " type="submit" name="advanceSearch" value="Search">
                                <input class="btn green pull-right ml10" type="submit" name="downloadpdf" value="Download PDF">
                                <input class="btn green pull-right" type="submit" name="downloadcsv" value="Download CSV">
                            </div>

                            <!--                            <a href="{{ route('exportcsv') }}" class="btn green">Download CSV</a>-->

                        </div>
                        {!! Form::close() !!}




                    </div>


                </div>
            </div>
        </div>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Bookings </div>
            </div>
            <div class="portlet-body flip-scroll">
                {!! Form::open(['method' => 'POST','route' => ['booking.markcomplete'], 'id' => 'bookingComplete']) !!}
                {!! Form::submit('Mark As Complete', ['class' => 'btn green mark-as-complete','title'=>'complete','name'=>'complete', 'onsubmit'=>"return confirm('Complete ! Are you sure? ')"  ]) !!}
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th></th>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>@sortablelink('franchisees_id','Franchise')</th>
                            <?php } ?>
                            <th class="__table-bookin-id">@sortablelink('order_id','#')</th>
                            
                            <th>@sortablelink('booking_time','Date')</th>
                            <th >@sortablelink('client_id','Client')</th>
<!--                            <th>Total&nbsp;Pice</th>
                            <th>Total&nbsp;Time</th>-->

<!--                            <th>Base </th>-->
                            <th>Address</th>

<!--                            <th>Mobile </th>-->
                            <!--<th>@sortablelink('drop_location','Destination')</th>-->
                            <th>@sortablelink('drop_location','Duration')</th>
                            <th>@sortablelink('drop_location','Value')</th>
                            <th class="table-deiver-name">@sortablelink('driver_id','Companion')</th>
<!--                            <th>Payment Status</th>-->
<!--                            <th class="text-center">Status</th>-->
                            <th class="align-center" style="width:160px">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            
                            <td>
                                <label class="checkbox-container">
                                    {{ Form::checkbox('booking_ids[]',$model->id,null,array('data-checkbox'=>"icheckbox_square-blue")) }}
                                    <span class="checkmark"></span>
                                </label>
                            </td>


                            <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ $model->franchisees->name }}</th>
                            <?php } ?>
                            <td>{{ substr($model->order_id, -2) }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td>{{ $model->client->name }}</td>                            
                            <?php /* ?>
                              <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                              <td>{{ $model->total_duration }} Min</td>
                              <?php */ ?>

<!--                            <td>{{ $model->base_location}}</td>-->
                            <td><?= $model->pickup ?></td>
<!--                            <td>{{ @$model->client->phone }}</td>-->
                            <!--<td>{{-- @$model->dropLocation->location_name --}}</td>-->
                            <td>{{ @$model->total_duration }}</td>
                            <td>{{ @$model->final_price }}</td>
                            <td>{{ @$model->Drivername->FullName }}</td>
<!--                                    <td><?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>-->

<!--                            <td class="text-center" style="vertical-align:middle">< ?= @$model->status ?></td>-->
                            <td  class="align-center actionIcon" style="width: 112px;">





                                <ul>
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

                                    <li>
                                        <a class="btn btn-success btn-xs fancybox"  data-type="ajax"  href="javascript:;"  data-src="{{ route('booking.getRepet',$model->id) }}">
                                            <i class="fa fa-repeat" title="Repeat" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <?php if ($model->trashed()) { ?>
                                            <a class="btn btn-info btn-xs purple del" data-id="<?php echo $model->id ?>" data-token="{{ csrf_token() }}" title="Restore"><span class="btnIcon red" title=""><i class="fa fa-repeat"  aria-hidden="true"></i></span></a>
                                        <?php } else { ?>
                                            <a class="btn btn-info btn-xs purple del" data-id="<?php echo $model->id ?>" data-token="{{ csrf_token() }}" title="Archive"><span class="btnIcon red" title=""><i class="fa fa-close"  aria-hidden="true" title="Cancel"></i></span></a>
                                        <?php } ?>
                                    </li>


                                    <?php /* ?>

                                      <li>
                                      {!! Form::open(['method' => 'post','route' => ['booking.markcomplete', $model->id],'style'=>'display:inline']) !!}
                                      {!! Form::submit('', ['class' => 'btn btn-danger btn-xs delete-alert','title'=>'Mark as Complete']) !!}
                                      <span class="btnIcon red" title="">
                                      <i class="fa fa-list-alt"  aria-hidden="true"></i>
                                      </span>
                                      {!! Form::close() !!}
                                      </li>

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

                                      <?php */ ?>




                                    <?php ?>

                                    <?php ?>

                                    <!--                                    <li class="moreIcons">
                                                                            <a href="javascript:;" class="more small_btn greydark" title="More"><i class="fa fa-chevron-up upArrow" aria-hidden="true"></i></a>
                                                                            <div id='icons' style="display:none;" class="listIcons">

                                                                            </div>
                                                                        </li>-->


                                </ul>





                            </td>
                        </tr>
                        @endforeach

                    <div class="clearfix"></div>
                    


                    </tbody>
                </table>
                
                {!! Form::close() !!}
                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>


<style>

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


    <!--<script>
        $(document).ready(function () {

            $(".select_bookings").click(function () {

                $this = $(this);
                client_id = $this.attr('rel');

                if ($(".select_bookings:checked").length) {
                    $(".select_bookings").not(".client_" + client_id).attr('disabled', false);
                } else {
                    $(".select_bookings").attr('disabled', false);
                    //$(".select_bookings").iCheck('disable');
                }

            });

        });
    </script>-->

<script>

    $('#bookingComplete').on('submit', function (e) {
        //e.preventDefault();

        if ($(':checkbox:checked').length == 0) {
            swal('Please select booking!');
            return false;
        }
    });




    $(".del").click(function () {

        swal({
            title: "Are you sure?",
            //text: "After click submit button this data is permanently deleted!",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            buttons: true,

        }).then((willDelete) => {

            if (willDelete) {

                var recordID = $(this).data('id');
                var token = $(this).data("token");
                bookingURL = "<?= route('booking.cancel',["id"=>""]); ?>/" + recordID;

                $.ajax({
                    url: bookingURL,
                    
                    dataType: "JSON",
                    data: {
                        "_token": token,
                    },
                    success: function (data)
                    {
                        console.log(data);
                        window.location.reload();

                    }
                });

            }

        });

    });


</script>

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

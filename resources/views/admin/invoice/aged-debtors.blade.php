@extends('admin.users.template')

@section('body')

<?php // pr($models->toarray());exit;?>

<h1 class="page-title">Aged Debtors 
    <small></small>
    @include('common.newBooking')
    @if(permit(['booking.create']))
   <?php /* <a href="{{ route('booking.create') }}" class="btn btn-primary float-right"> Create </a> */ ?>
    @endif
</h1>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>LAST 12 MONTHS
                </div>
            </div>

            <div class="table-scrollable">
                <table class="table table-bordered table-striped table-condensed flip-content newBorder">
                    <thead class="flip-content">
                        <tr>
                            <th class="borderRight"></th>
                            <?php foreach ($yearMonth as $month) { ?>
                            <th colspan="1" class="border">
                                {{ $month }}
                            </th>
                            <?php } ?>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <thead class="flip-content">
                        <tr>
                            <th class="border-right">Clients</th>
                            <?php foreach ($yearMonth as $month) { ?>
                            <th>Outstanding</th>                           
                            <?php } ?>
                            <th>Outstanding</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt) { 
                                
                            ?>
                            <tr>
                                <td class="border-right">{{ $dt['firstname'] }}</td>

                                <td>{{ showGraphData($yearMonth,$dt['data'],0) }}</td>
                              
                                <td>{{ showGraphData($yearMonth,$dt['data'],1) }}</td>
                               
                                <td>{{ showGraphData($yearMonth,$dt['data'],2) }}</td>
                              
                                <td>{{ showGraphData($yearMonth,$dt['data'],3) }}</td>
                               
                                <td>{{ showGraphData($yearMonth,$dt['data'],4) }}</td>
                               
                                <td>{{ showGraphData($yearMonth,$dt['data'],5) }}</td>

                                <td>{{ env('CURRENCY_SYM') }} {{ 
                                showTotalOutstanding($yearMonth,$dt['data'],0) + 
                                showTotalOutstanding($yearMonth,$dt['data'],1) +
                                showTotalOutstanding($yearMonth,$dt['data'],2) +
                                showTotalOutstanding($yearMonth,$dt['data'],3) +
                                showTotalOutstanding($yearMonth,$dt['data'],4) +
                                showTotalOutstanding($yearMonth,$dt['data'],5)
                                }}
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    table.newBorder th.border{
        border: 1px solid #32c5d2 !important;
        border-right-width:0px !important;
                text-align: center;
    }
    table.newBorder th.borderRight{
        border-right: 1px solid #32c5d2 !important;
    }
    table.newBorder th.border:last-child{
        border-right-width:1px !important;
    }
    table.newBorder th.border-right,
    table.newBorder td.border-right{
        border-right: 1px solid #32c5d2 !important;
    }
    .table-bordered,
    .table-bordered>tbody>tr>td,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>td,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>thead>tr>th{
        border: 1px solid #cccccc;
    }
    /*.table-scrollable>.table.newBorder{
        border-bottom: 10px solid transparent;
    }*/
    table.newBorder tbody tr:last-child td,
    table.newBorder tbody tr:last-child th{
        border-bottom: 1px solid #32c5d2 !important;
    }        
</style>

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

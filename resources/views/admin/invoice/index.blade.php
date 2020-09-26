@extends('admin.faq.template')

@section('body')

<h1 class="page-title">Invoice
    <small></small>
    @include('common.newBooking')
</h1>

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
                <div class="desc">Total Debtors</div>
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
                <div class="desc">Debtors</div>
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
                {!! Form::open(['method'=>'GET','url'=>route('invoice.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

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
                            <label class="col-md-5 control-label" >Invoice Number</label>
                            <div class="col-md-7">
                                {!! Form::text('group_invoice_id', null, array('placeholder' => 'Invoice Number','class' => 'form-control')) !!}

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
                    Debtors
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="form-actions float-right export-form">
                    {!! Form::open(['method' => 'POST','route' => ['invoice.group-invoice']]) !!}
                    <input type="hidden" name="searchable_name" value="{{ $searchable_name }}">
                    <input type="hidden" name="searchable_invoice_id" value="{{ $searchable_invoice_id }}">
                    {!! Form::submit('Export Debtors', ['class' => 'btn green','title'=>'Export','name'=>'export']) !!}
                    

                    {!! Form::submit('Export All', ['class' => 'btn green','title'=>'Export All','name'=>'export-all-invoice']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th class="table-bookin-id">@sortablelink('invoice_number','Inv#')</th>
                            <th>@sortablelink('invoice_date','Date')</th>
                            <th>@sortablelink('client_id','Client Name')</th>
                            <th>@sortablelink('total_amount','Invoice Amount')</th>
                            <th >@sortablelink('outstanding_amount','Amount Outstanding')</th>
                            <th>@sortablelink('booking_count','No of jobs')</th>
                            <!--<th>Phone </th>-->
<!--                            <th>Payment Status</th>-->
                            <th>Comment </th>
                            <th class="align-center" style="width: 230px">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unpaidmodels as $model)
                        <?php //pr($model) ?>
                        <tr>
                        <!--<td>{{getOrderNo($model->group_invoice_id, "IN")}} </td>  -->
                            <td > {{ $model->invoice_number }}</td>
                            <td > {{ showDate($model->invoice_date) }}</td>
                            <td>{{ @$model->client->name }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ number_format($model->total_amount,2) }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ number_format($model->outstanding_amount,2) }}</td>
                            <td>{{ $model->booking_count }}</td>
                            <!--<td>{{ @$model->client->phone }}</td>-->
                            <!--<td>< ?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>-->
                            <td>
                                <?php
                                    /*if($model->send_mail == 1 && !is_null($model->comment))
                                        $comment = $model->comment ; 
                                    else if($model->send_mail == 0)
                                        $comment = '';
                                    else
                                        $comment = 'You have send invoice at '.showStandardDate($model->send_date);*/
                                ?>
                                <span 
                                    id="debtors_comment"
                                    class="editable-comment" 
                                    data-pk="{{ $model->id }}" 
                                    data-name="comment" 
                                    data-title="Comment" 
                                    data-type="textarea" 
                                    data-placement="below"
                                    data-value="{{ get_editable_value( $model->comment ) }}">  
                                </span>                                
                            </td>
                            <td  class="align-center actionIcon">
                                <ul class="action-container">
                                    <?php /* ?>
                                      <li>
                                      <a target="_blank" class="btn btn-success btn-xs" href="{{ route('invoice.preview',$model->group_invoice_id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      </li>
                                      <?php */ ?>
                                    <li>
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('invoice.group-preview',$model->id) }}" title="Group Preview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="btn btn-info btn-xs" href="{{ route('invoice.invoice',$model->id) }}" title="Invoice">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        {!! Form::open(['method' => 'post','route' => ['group-invoice-email', $model->id],'style'=>'display:inline' ]) !!}
                                        {!! Form::submit('', ['class' => 'btn btn-danger btn-xs credit-card','title'=>'Invoice Email']) !!}
                                        <span class="btnIcon" title="">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </span>
                                        {!! Form::close() !!}
                                    </li>
                                    <li>
                                        {!! Form::open(['method' => 'post','route' => ['change-payment-status', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Paid ! Are you sure? ')"  ]) !!}
                                        {!! Form::submit('', ['class' => 'btn btn-danger btn-xs credit-card','title'=>'Mark as Paid']) !!}
                                        <span class="btnIcon red" title="">
                                            <i class="fa fa-credit-card " aria-hidden="true"></i>
                                        </span>
                                        {!! Form::close() !!}
                                    </li>
                                    <li>
                                        <a class="btn btn-success btn-xs" href="{{ route('invoice.partial-payment',$model->id) }}" title="Partial Payment"><i class="fa fa-credit-card custom" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach                    
                    </tbody>
                </table>
                <div class="form-actions float-right">
                    {!! Form::open(['method' => 'POST','route' => ['invoice.group-invoice']]) !!}
                    <input type="hidden" name="searchable_name" value="{{ $searchable_name }}">
                    <input type="hidden" name="searchable_invoice_id" value="{{ $searchable_invoice_id }}">
                    {!! Form::submit('Export Debtors', ['class' => 'btn green','title'=>'Export','name'=>'export']) !!}
                    
                    {!! Form::submit('Export All', ['class' => 'btn green','title'=>'Export All','name'=>'export-all-invoice']) !!}

                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
                

                {!! $unpaidmodels->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection


@section('pagescript')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


<style>
    .editable-empty{
        width: 100%;
    height: 40px;
    display: block;
    }
</style>

<script type="text/javascript">
    
    commentEditable=function(){
        // defaults
        jQuery.fn.editable.defaults.mode = 'popup';
        //global settings 
        jQuery.fn.editable.defaults.inputclass = 'form-control';
        //$.fn.editable.defaults.mode = 'inline';        
        jQuery.fn.editable.defaults.url = '{{ route('update-inline') }}';

        jQuery.fn.editable.defaults.autotext = 'auto';
        jQuery.fn.editable.defaults.defaultValue = '';
        jQuery.fn.editable.defaults.emptytext = '';        
         

        jQuery('.editable-comment').editable({
            placement: 'right',
            params: function( params ){
                params.act = 'save_comment';
                params._token = '{{ csrf_token() }}';
                return params;
            },
            success: function(response, newValue) {
                if(response.status == 'error') return response.message; //msg will be shown in editable form
            }
        });
    }      

    // ready
    jQuery(document).ready(function(){
       
        commentEditable();        
    });     
</script>
@endsection

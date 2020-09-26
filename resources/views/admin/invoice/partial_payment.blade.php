@extends('admin.faq.template')
@section('body')
<h1 class="page-title">Partial Payment
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Booking Details</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Booking Id</th>
                            <td>{{ $model->order_id}}</td>
                        </tr>  
                        <tr>
                            <th>Booking Time</th>
                            <td>{{ showDate($model->booking_time) }}</td>
                        </tr>
                        <tr>
                            <th>Outstanding Amount</th>
                            <td>{{  env('CURRENCY_SYM') }} {{ $model->invoiceOverride->outstanding_amount }}</td>
                        </tr>
                        <tr>
                            <th>Client Name</th>
                            <td>{{ $model->client->firstname }} {{ $model->client->surname }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->client->email}}</td>
                        </tr>                        
                        <tr>
                            <th>Mobile</th>
                            <td><?= $model->client->phone ?></td>
                        </tr>                                                
                        <tr>
                            <th>Address</th>
                            <td>{{ $model->client->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">    
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Pay Partial Amount 
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(array('route' => 'invoice.pay-partial-payment', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                        <div class="form-body">                                      
                            <div class="form-group">
                                <label class="col-md-3 control-label">Amount</label>
                                <div class="col-md-9">
                                    {!! Form::text('partial_amount', null, array('placeholder' => 'Amount','class' => 'form-control', 'id' => 'partial_amount')) !!}
                                    <span class="bg-danger"><?= $errors->first('partial_amount'); ?></span>
                                    {!! Form::hidden('group_invoice_id', $model->group_invoice_id, array('class' => 'form-control')) !!}
                                </div>
                            </div>                                   
                        </div>
                        <div class="form-actions right1">
                            <button type="submit" class="btn green">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Payment History</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Booking#</th>
                            <th>Previous Outstanding Amount</th>
                            <th>Part Payment Amount</th>
                            <th>Remaining Outstanding Amount</th>
                            <th>Payment&nbsp;Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partModel as $part)
                        <tr>
                            <td>{{ $model->order_id }}</td>
                            <td>{{  env('CURRENCY_SYM') }} {{ @$part->start_outstanding_amount }}</td>
                            <td>{{  env('CURRENCY_SYM') }} {{ @$part->amount }}</td>
                            <td>{{  env('CURRENCY_SYM') }} {{ @$part->end_outstanding_amount }}</td>
                            <td>{{ showDate($part->payment_time) }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#partial_amount').keypress(function (event) {
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    });
</script>


@endsection

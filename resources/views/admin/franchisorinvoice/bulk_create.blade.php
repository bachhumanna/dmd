@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Franchisee Invoicing
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Review 
                </div>
            </div>

            <div class="portlet-body form">

                {!! Form::open(array('route' => 'franchisor-invoice.createbulk-post', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'franchisee_invoicing')) !!}
                <div class="form-body">







                    <div class="form-group">                        
                        <label class="col-md-3 control-label">Invoice For</label>
                        <div class="col-md-9">
                            <div class="row">                            
                                <div class="col-md-6">
                                    {{ Form::selectMonth('invoice_for_month',date('m'), array('class' => 'form-control','id' => 'month'))}}                           
                                    <span class="bg-danger"><?= $errors->first('invoice_for_month'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {{ Form::selectYear('invoice_for_year', 2000, date('Y'),date('Y'), array('class' => 'form-control','id' => 'year')) }}
                                    <span class="bg-danger"><?= $errors->first('invoice_for_year'); ?></span>   
                                </div> 
                            </div>                        
                        </div>                        
                    </div>                    


                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('franchisor-invoice.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>

            <?php if ($data) { ?>
                <div class="portlet-body form">
                    {!! Form::open(array('route' => 'franchisor-invoice.createbulk-post', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'franchisee_invoicing')) !!}
                    {{ Form::hidden("invoice_for_month",null, array('class' => 'form-control')) }}
                    {{ Form::hidden("invoice_for_year",null, array('class' => 'form-control')) }}
                    <div class="portlet-body flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead class="flip-content">
                                <tr>
                                    <th>Franchisee</th>
                                    <th>Turnover</th>
                                    <th>Franchise Fee</th>
                                    <?php foreach ($invoiceFees as $fee) { ?>
                                        <th>{{ $fee->name }}</th>
                                    <?php } ?>
                                    <th>Comment</th>
                                    <th>Extra Fee</th>
                                    <th>VAT</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $model)
                                <?php
                                $id = $model['id'];
                                ?>
                                <tr>
                                    <th>{{ $model['name'] }}</th>
                                    <td>
                                        {{ Form::text("turnover[$id]",$model['turnover'], array('class' => 'form-control','readonly')) }}
                                    </td>
                                    <td>
                                        <input type="text" value='{{ number_format($model['base_fee'] + $model['commission'],2) }}' readonly  class = 'form-control'>
                                        {{ Form::hidden("base_fee[$id]",$model['base_fee'], array('class' => 'form-control','readonly')) }}
                                        {{ Form::hidden("commission[$id]",$model['commission'], array('class' => 'form-control','readonly')) }}
                                    </td>
                                    <?php foreach ($invoiceFees as $fee) { ?>
                                        <td>
                                            {{ Form::text("fee[$id][$fee->id]",$fee->amount, array('class' => 'form-control','readonly')) }}
                                        </td  >
                                    <?php } ?>
                                    <td>
                                        {{ Form::text("comment[$id]",null, array('class' => 'form-control')) }}
                                    </td>
                                    <td>
                                        {{ Form::text("extra_fee[$id]",null, array('class' => 'form-control extra_fee','rel'=>$model['final_invoice'])) }}
                                    </td>
                                    <td>
                                        <?php if($model['vat_reg']){ ?>
                                        {{ Form::text("vat[$id]",$model['vat_price'], array('class' => 'form-control vat')) }}
                                        <?php }else{ ?>
                                            -
                                        <?php } ?>
                                    </td>
                                    <td>
                                        {{ Form::text("total[$id]",$model['final_invoice'], array('class' => 'form-control final_invoice','readonly')) }}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Send Email
                                {{ Form::checkbox('sendMail', null, array('class' => 'form-control')) }}
                            </label>
                        </div>
                    </div>
                    <div class="form-actions right1">
                        <button type="submit" class="btn green">Submit</button>
                        <a href="{{route('franchisor-invoice.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            <?php } ?>





        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
<script>
$(".extra_fee, .vat").keypress(function (e) {
    if (e.which != 46 && e.which != 45 && e.which != 46 &&
            !(e.which >= 48 && e.which <= 57)) {
        return false;
    }
});

$(".extra_fee").keyup(function (e) {

    input = $(this).val()
    total = $(this).attr('rel')
    if (input) {
        $(this).parent().parent().find('.final_invoice').val(parseInt(input) + parseInt(total))
        console.log($(this).parent().parent().find('.final_invoice').val());
    } else {
        $(this).parent().parent().find('.final_invoice').val(parseInt(total))

    }

});
</script>


@endsection

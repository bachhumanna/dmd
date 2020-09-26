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
                    <i class="fa fa-gift"></i> Invoicing Edit 
                </div>
            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisor-invoice.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">
                    <p id="error" style="text-align: center"></p>
                    <?php if (!session()->get('selectedFranchisees')) { ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Franchisee</label>
                            <div class="col-md-9">
                                {!! Form::select('franchisees_id',getFranchisees(false), null ,array('class' => 'form-control', 'id' => 'franchisees_id','disabled'=>true)) !!}
                                <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                            </div>
                        </div> 
                    <?php } ?>





                    <div class="form-group">                        
                        <label class="col-md-3 control-label">Invoice For</label>
                        <div class="col-md-9">
                            <div class="row">                            
                                <div class="col-md-6">
                                    {{ Form::selectMonth('invoice_for_month',null, array('class' => 'form-control','id' => 'month','disabled'=>true))}}                           
                                    <span class="bg-danger"><?= $errors->first('invoice_for_month'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {{ Form::selectYear('invoice_for_year', 2000, date('Y'),null, array('class' => 'form-control','id' => 'year','disabled'=>true)) }}
                                    <span class="bg-danger"><?= $errors->first('invoice_for_year'); ?></span>   
                                </div> 
                            </div>                        
                        </div>                        
                    </div>                   
                    <div class="form-group">
                        <label class="col-md-3 control-label">Edit</label>
                        <div class="col-md-9">
                            <?php
                            $vat = $model->VAT;
                            $amount = $model->standard_fee +  $model->commission+$model->VAT;
                            if (count($invoiceDetails)) {

                                foreach ($invoiceDetails as $details) {
                                    $vat += vatCalculation(($details->qnty * $details->price), $details->vat);
                                    ?>

                                    <div class="row">

                                        <div class="col-md-4">
                                            {{ Form::text('edit_description[]', $details->fee_type, array('class' => 'form-control edit_description calculation ','placeholder'=>'Description')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_description.*'); ?></span>  
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_quantity[]', $details->qnty, array('id'=>'edit_quantity','class' => 'form-control edit_quantity calculation customfee','placeholder'=>'Quantity')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_quantity.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_price[]', $details->price, array('id'=>'edit_price','class' => 'form-control edit_price calculation customfee','placeholder'=>'Price')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_price.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_vat[]', $details->vat, array('id'=>'edit_vat','class' => 'form-control edit_vat calculation customfee','placeholder'=>'VAT Rate')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_vat.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_amount[]', $details->amount, array('class' => 'form-control','placeholder'=>'Amount','readonly'=>true,'id'=>'edit_amount')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_amount.*'); ?></span> 
                                        </div>

                                    </div>

                                    <?php
                                }
                            } else {
                                ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        {{ Form::text('edit_description[]', null, array('class' => 'form-control','placeholder'=>'Description')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_description.*'); ?></span>  
                                    </div>
                                    <div class="col-md-2 edit_quantity">
                                        {{ Form::text('edit_quantity[]', null, array('id'=>'edit_quantity','class' => 'customfee form-control calculation ','placeholder'=>'Quantity')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_quantity.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2 edit_price">
                                        {{ Form::text('edit_price[]', null, array('id'=>'edit_price','class' => 'customfee form-control calculation','placeholder'=>'Price')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_price.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2 edit_vat">
                                        {{ Form::text('edit_vat[]', null, array('id'=>'edit_vat','class' => 'customfee form-control calculation','placeholder'=>'VAT Rate')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_vat.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2">
                                        {{ Form::text('edit_amount[]', null, array('class' => 'customfee form-control','placeholder'=>'Amount','id'=>'edit_amount','readonly'=>true)) }}
                                        <span class="bg-danger"><?= $errors->first('edit_amount.*'); ?></span> 
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
  

                    <div class="form-group">
                        <label class="col-md-3 control-label">Turnover</label>
                        <div class="col-md-9">
                            {!! Form::text('turnover', null, array('placeholder' => 'Turnover','class' => 'form-control','disabled'=>true,'id' => 'turnover')) !!}
                            <span class="bg-danger"><?= $errors->first('turnover'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Fee	</label>
                        <div class="col-md-9">
                            {!! Form::text('commission', $model->standard_fee + $model->commission, array('placeholder' => 'Total Invoice','class' => 'form-control','disabled'=>true, 'id' => 'commission')) !!}   
                            <span class="bg-danger"><?= $errors->first('commission'); ?></span>
                        </div>
                    </div> 

   
                    <?php foreach ($model->invoiceDetails as $invoice_details) { 
                        
                        $amount += $invoice_details->amount;
                        
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{ $invoice_details->fee_type }}</label>
                            <div class="col-md-9">
                                {!! Form::text('amount',  $invoice_details->amount, array('placeholder' => 'Total Invoice','class' => 'form-control','disabled'=>true, 'id' => 'total_invoice')) !!}   
                                <span class="bg-danger"><?= $errors->first('amount'); ?></span>
                            </div>
                        </div> 
                    <?php } ?>


                    <div class="form-group">
                        <label class="col-md-3 control-label">VAT</label>
                        <div class="col-md-9">
                            {!! Form::text('VAT', $vat, array('class' => 'form-control', 'id' => 'total_vat','disabled'=>true,'rel'=>$model->VAT)) !!}   

                        </div>
                    </div> 


                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Invoice</label>
                        <div class="col-md-9">
                            {!! Form::text('amount', null, array('placeholder' => 'Total Invoice','class' => 'form-control final_invoice','readonly'=>true, 'id' => 'final_invoice','rel'=>$amount)) !!}   
                            <span class="bg-danger"><?= $errors->first('amount'); ?></span>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div id="invoice_details" style="text-align: right;width: 40%;float: right;"></div>
                    </div>

                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('franchisor-invoice.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<script>

$(".customfee").keypress(function (e) {
    if (e.which != 46 && e.which != 45 && e.which != 46 &&
            !(e.which >= 48 && e.which <= 57)) {
        return false;
    }
});

$(".calculation").keyup(function (e) {
    edit_quantity = $("#edit_quantity").val();
    edit_price = $("#edit_price").val();
    edit_vat = $("#edit_vat").val();
    final_invoice = 0;
    vat = 0;
    if (edit_quantity && edit_price && edit_vat) {
        commission = $("#commission").val();
        previousVat = $("#total_vat").attr('rel');
        previousAmount = $("#final_invoice").attr('rel');
        ammount = parseFloat(edit_quantity) * parseFloat(edit_price);
        vat = ammount * edit_vat;
        vat = vat / 100;
        $("#edit_amount").val(vat + ammount);
        $("#total_vat").val(parseFloat(previousVat) + vat);
        $("#final_invoice").val(parseFloat(previousAmount) + vat + ammount)
    }else{
        previousVat = $("#total_vat").attr('rel');
        previousAmount = $("#final_invoice").attr('rel');
        $("#edit_amount").val(00);
        $("#total_vat").val(parseFloat(previousVat));
        $("#final_invoice").val(parseFloat(previousAmount))
    }






});


//
//$(".edit_quantity,.edit_price,.edit_vat").keyup(function (e) {
//
//
//    edit_quantity = $("#ed_quantity").val();
//    edit_price = $("#ed_price").val();
//    edit_vat = $("#ed_vat").val();
//
//    final_invoice = 0;
//    vat = 0;
//
//    if (edit_quantity && edit_price && edit_vat) {
//
//        commission = $("#commission").val();
//        total_vat = $("#total_vat").val();
//        final_invoice = $("#final_invoice").val();
//
//
//
//        ammount = parseInt(edit_quantity) * parseInt(edit_price);
//        vat = ammount * edit_vat;
//        vat = vat / 100;
//        ammount = parseInt(ammount) + parseInt(vat)
//        final_invoice = parseInt(final_invoice) + parseInt(ammount);
//        vat = parseInt(total_vat) + parseInt(vat);
//        $('#total_vat').val(parseInt(vat))
//        $('.final_invoice').val(parseInt(final_invoice))
//    }
//
//
//
//
//
//
//});

</script>
@endsection

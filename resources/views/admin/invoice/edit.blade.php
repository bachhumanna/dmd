@extends('admin.home.template')
@section('body')
<h1 class="page-title">Invoice
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Invoice</div>
            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['invoice.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">


                    <div class="form-group">                        
                        <label class="col-md-3 control-label">Invoice For</label>
                        <div class="col-md-9">
                            <div class="row">                            
                                <div class="col-md-6">
                                    {{ Form::text('',$model->client->name, array('class' => 'form-control','id' => 'month','disabled'=>true))}}                           

                                </div>

                            </div>                        
                        </div>                        
                    </div>     

                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">

                            {{ $model->booking_time }}
                            <?php
                            foreach ($model->pickupLocation as $pickup) {
                                echo $pickup->location_name . " to ";
                            }
                            ?>
                            {{ $model->drop_location }} 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Edit</label>
                        <div class="col-md-9">
                            <?php
                            if (count($model->invoice)) {

                                foreach ($model->invoice as $details) {
                                    //pr($details);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{ Form::text('edit_description[]', $details->comment, array('class' => 'form-control','placeholder'=>'Description')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_description.*'); ?></span>  
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_quantity[]', $details->qnty, array('class' => 'form-control  calculation customfee','placeholder'=>'Quantity','id'=>'edit_quantity')) }}
                                            <span class="bg-danger"><?= $errors->first('edit_quantity.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_price[]', $details->price, array('class' => 'form-control  calculation customfee','placeholder'=>'Price','id'=>"edit_price")) }}
                                            <span class="bg-danger"><?= $errors->first('edit_price.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            <?php if ($model->vat_registered) { ?>
                                                {{ Form::text('edit_vat[]', $details->vat, array('class' => 'form-control  calculation customfee','placeholder'=>'VAT','id'=>'edit_vat')) }}
                                            <?php } else { ?>
                                                {{ Form::text('edit_vat[]', 0, array('class' => 'form-control  calculation customfee','readonly'=>'readonly','placeholder'=>'VAT','id'=>'edit_vat')) }}
                                            <?php } ?>
                                            <span class="bg-danger"><?= $errors->first('edit_vat.*'); ?></span> 
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::text('edit_amount[]', vatCalculation($details->amount,$details->vat,true), array('class' => 'form-control  calculation customfee','placeholder'=>'Amount','readonly'=>true,'id'=>'edit_amount')) }}
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
                                    <div class="col-md-2">
                                        {{ Form::text('edit_quantity[]', null, array('class' => 'form-control  calculation customfee','id'=>'edit_quantity','placeholder'=>'Quantity')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_quantity.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2">
                                        {{ Form::text('edit_price[]', null, array('class' => 'form-control  calculation customfee','id'=>"edit_price",'placeholder'=>'Price')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_price.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2">
                                        <?php if ($model->vat_registered) { ?>
                                            {{ Form::text('edit_vat[]', null, array('class' => 'form-control  calculation customfee','id'=>'edit_vat','placeholder'=>'VAT')) }}
                                        <?php } else { ?>

                                            {{ Form::text('edit_vat[]', 0, array('class' => 'form-control  calculation customfee','readonly'=>"readonly",'id'=>'edit_vat','placeholder'=>'VAT')) }}
                                        <?php } ?>
                                        <span class="bg-danger"><?= $errors->first('edit_vat.*'); ?></span> 
                                    </div>
                                    <div class="col-md-2">
                                        {{ Form::text('edit_amount[]', null, array('class' => 'form-control  calculation customfee','placeholder'=>'Amount','readonly'=>true,'id'=>'edit_amount')) }}
                                        <span class="bg-danger"><?= $errors->first('edit_amount.*'); ?></span> 
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Invoice</label>
                        <div class="col-md-9">
                            {!! Form::text('amount', $model->invoice_price, array('placeholder' => 'Total Invoice','class' => 'form-control final_invoice','readonly'=>true, 'id' => 'total_invoice',"rel"=>$model->final_price)) !!}   

                        </div>
                    </div> 
                    <div class="form-group">
                        <div id="invoice_details" style="text-align: right;width: 40%;float: right;"></div>
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

            previousAmount = $("#total_invoice").attr('rel');

            ammount = parseFloat(edit_quantity) * parseFloat(edit_price);
            vat = ammount * edit_vat;
            vat = vat / 100;
            $("#edit_amount").val(vat + ammount);

            $("#total_invoice").val(parseFloat(previousAmount) + vat + ammount)
        } else {
            previousVat = $("#total_vat").attr('rel');

            $("#edit_amount").val(00);

            $("#total_invoice").val(parseFloat(previousAmount))
        }

    });
</script>

@endsection

@extends('admin.faq.template')
@section('body')

<h1 class="page-title">Invoice
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Create 
                </div>
            </div>
            <?php 
                //pr($errors->all());
            
            ?>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'invoice.store' ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Invoice Date</label>
                        <div class="col-md-9">
                            {!! Form::text('invoice_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'InvoiceDate','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('invoice_date'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Invoice Number</label>
                        <div class="col-md-9">
                            {!! Form::text('invoice_number', null, array('placeholder' => 'Invoice Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('invoice_number'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Reference</label>
                        <div class="col-md-9">
                            {!! Form::text('reference', null, array('placeholder' => 'Reference','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('reference'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Quantity</label>
                        <div class="col-md-9">
                            {!! Form::select('quantity',[1=>1,2=>2,3=>3,4=>4,5=>5] ,null, array('placeholder' => 'Quantity','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('quantity'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Unit Price</label>
                        <div class="col-md-9">
                            {!! Form::text('unit_price', null, array('placeholder' => 'Unit Price','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('unit_price'); ?></span>
                        </div>
                    </div>
 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Amount</label>
                        <div class="col-md-9">
                            {!! Form::text('amount_gbp', null, array('placeholder' => 'Amount','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('amount_gbp'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">VAT</label>
                        <div class="col-md-9">
                            {!! Form::text('vat_amount', null, array('placeholder' => 'Vat','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('vat_amount'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('city'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'Post Code','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">country</label>
                        <div class="col-md-9">
                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>
                        </div>
                    </div>-->
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
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
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        autoclose: true
                // dateFormat: 'YY-mm-dd'
    });


</script>

@endsection

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
                    <i class="fa fa-gift"></i> Create 
                </div>
            </div>

            <div class="portlet-body form">

                {!! Form::open(array('route' => 'franchisor-invoice.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal','id'=>'franchisee_invoicing')) !!}
                <div class="form-body">
                    <p id="error" style="text-align: center"></p>
                    <?php if (!session()->get('selectedFranchisees')) { ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Franchisee</label>
                            <div class="col-md-9">
                                {!! Form::select('franchisees_id',getFranchisees(false), null ,array('class' => 'form-control', 'id' => 'franchisees_id')) !!}
                                <span class="bg-danger"><?= $errors->first('franchisees_id'); ?></span>
                            </div>
                        </div> 
                    <?php } ?>
                    
                    
                    
                    
                    
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
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comment</label>
                        <div class="col-md-9">
                            {{ Form::text('comment', null, array('class' => 'form-control')) }}
                            <span class="bg-danger"><?= $errors->first('comment'); ?></span>   

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Extra Charges</label>
                        <div class="col-md-9">
                            {{ Form::text('custom_entry', null,  array('class' => 'form-control')) }}
                            <span class="bg-danger"><?= $errors->first('custom_entry'); ?></span>   
                            <a class="btn btn-info btn-xs" onclick="getInvoiceDetails();">Calculate Invoice</a>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Turnover</label>
                        <div class="col-md-9">
                            {!! Form::text('turnover', null, array('placeholder' => 'Turnover','class' => 'form-control','readonly' => 'readonly','id' => 'turnover')) !!}
                            <span class="bg-danger"><?= $errors->first('turnover'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Standard Fee</label>
                        <div class="col-md-9">
                            {!! Form::text('standard_fee', null, array('placeholder' => 'Standard Fee','class' => 'form-control','readonly' => 'readonly','id' => 'standard_fee')) !!}
                            <span class="bg-danger"><?= $errors->first('standard_fee'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Commission</label>
                        <div class="col-md-9">
                            {!! Form::text('commission', null, array('placeholder' => 'Total Invoice','class' => 'form-control','readonly' => 'readonly', 'id' => 'commission')) !!}   
                            <span class="bg-danger"><?= $errors->first('commission'); ?></span>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Invoice</label>
                        <div class="col-md-9">
                            {!! Form::text('amount', null, array('placeholder' => 'Total Invoice','class' => 'form-control','readonly' => 'readonly', 'id' => 'total_invoice')) !!}   
                            <span class="bg-danger"><?= $errors->first('amount'); ?></span>
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
    <!-- END SAMPLE TABLE PORTLET-->
</div>

<script>

    function getInvoiceDetails() {

        var franchisees_id = $("#franchisees_id").val();
        var month = $("#month").val();
        var year = $("#year").val();

        $.ajax({
            dataType: "json",
            //method: "POST",
            url: '{{ route("invoice-price-details") }}',
            //data: {franchisees_id: franchisees_id, month: month, year: year},
            data : $("#franchisee_invoicing").serialize(), 
            success: function (result) {
                console.log(result);
                if (result.status == 2) {

                    $("#error").html('<strong style="color: red;">' + result.msg + '</strong>')
                    $("#error").show();
                    $("#turnover").val('')
                    $("#standard_fee").val('')
                    $("#total_invoice").val('')
                    $("#invoice_details").html('')
                }

                if (result.status == 1) {

                    $("#error").hide();
                    $("#turnover").val(result.turnover)
                    $("#commission").val(result.commission)
                    $("#standard_fee").val(result.base_fee)
                    $("#total_invoice").val(result.final_invoice)
                    $("#invoice_details").html(result.text)
                }
            },
        });
    }

</script>

@endsection

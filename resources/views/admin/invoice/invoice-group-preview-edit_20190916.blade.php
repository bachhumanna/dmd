<?php
$showVat = false;
foreach ($model as $key => $val) {
    if ($val->vat_registered) {
        $showVat = true;
    }
}
?>

<!doctype html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <?php //pr($model->invoice);exit;
    ?>

    <body style="background: #fff;">
        <form onsubmit="return invoiceFinalise();" action="{{ route('invoice.update-finalize') }}" method="POST" id="invoiceForm">
            {{ csrf_field() }}
            
            <input type="hidden" name="act" id="act" value="finalise" >
            
            <?php foreach ($booking_ids as $ids) { ?>
                <input style="display:none" name="booking_ids[]" type="checkbox" checked="checked" value="{{ $ids }}" >
            <?php } ?>

            <?php $vat_applicable = ($showVat) ? 1 : 0; ?>
            <input type="hidden" name="vat_applicable" id="vat_applicable" value="{{ $vat_applicable }}">
            

            <table width="900px" cellpadding="0" cellspacing="0" style="width: 900px; margin: 0 auto; font-family: 'Lucida Sans Unicode', sans-serif; max-width: 100%; background: #fafafa;">
                <!--*-->
                <thead>
                    <tr>
                        <td>                            
                            <a class="btn btn-warning" onclick="editPage( {{ count($booking_ids) }} )">Edit </a>
                            <a class="btn btn-info" onclick="previewPage()">Preview </a>
                            <a class="btn btn-success" href="{{ route('invoice.uninvoiced') }}"  >Back To Un Invoiced </a>
                            
                            <button type="submit" class="btn btn-success" style="display:inline" id="btnFinalise">
                                Finalise
                            </button>

                            <a class="btn btn-danger" onclick="cancelPage()" style="display:none" id="btnCancel">Cancel </a>

                            <button type="submit" class="btn btn-success" style="display:none" id="btnSave">
                                Save
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: #fff; padding: 16px 0px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style=" text-align: center;">
                                        <a href="#" style="border: none; outline: none;">
                                            <img src="{{  asset('images/logo.png') }}" alt="" style=" margin: auto; display: block; border: none; outline: none; width: 100px;">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </thead>
                <!--*-->

                <!--*-->
                <tbody>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: #fff;">
                                <tr>
                                    <td style=" padding:40px 20px; width: 150px; vertical-align: top;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding-top: 3px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="color: #000; font-size: 26px; line-height: 1; text-transform: capitalize; padding-bottom: 22px;">TAX INVOICE </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px;line-height: 1; color: #424242; text-transform: capitalize;">
                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="width: 182px; padding-bottom: 10px; ">
                                                                {{ ucfirst($bookingDetails->client->name)}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 182px; padding-bottom: 10px;">
                                                                @php $customer_addres = ($invoiceModel) ? $invoiceModel->customer_addres : $bookingDetails->client->address ; @endphp 
                                                                <textarea name="customer_addres" readonly>{{ $customer_addres }}</textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td style=" padding:40px 20px 40px 0px; width: 250px; vertical-align: top;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding-right: 20px; font-size: 12px;line-height: 1; color: #424242; text-transform: capitalize; vertical-align: top;">
                                                    <table width="100%" cellpadding="0" cellspacing="0">

                                                        <tr>
                                                            <td style=" line-height: 1.8;">
                                                                <strong style="font-size: 15px;">Invoice Date</strong>
                                                                <br>
                                                                <input type="hidden" class="invoice_date" name="invoice_override_id" readonly value="{{ $invoiceModel->id }}" >
                                                                <input type="text" class="invoice_date" name="invoice_date" readonly value="{{ showStandardDate($invoiceModel->invoice_date) }}" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="line-height: 1.8;">
                                                                <strong style="font-size: 15px;">Invoice Number </strong>
                                                                <br>
                                                                <input type="text" readonly name="invoice_number" value="{{ $invoiceModel->invoice_number }}">
                                                            </td>
                                                        </tr>
                                                        <?php if ($showVat) { ?>
                                                            <tr>
                                                                <td style="line-height: 1.8;"><strong style="font-size: 15px;">Vat Number</strong> <br>{{ $bookingDetails->companyInfo->vat_number }}</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </td>
                                                <td style="vertical-align: top; font-size: 13px; width: 250px">
                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td>
                                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td style="margin-bottom: 5px; display: block;">
                                                                            <strong style="font-size: 15px;">
                                                                                {{ $bookingDetails->franchisees->name }}
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- <tr>
                                                                        <td>
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td style="margin-bottom: 10px; display: block;">
                                                                            @php $franchisees_addressee = ($invoiceModel) ? $invoiceModel->franchisees_addressee : $bookingDetails->franchisees->address; @endphp
                                                                            <textarea readonly name="franchisees_addressee" readonly>{{ $franchisees_addressee }}</textarea>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table  style="width: 100%;" class="newTable" border="0">
                                <!-- <tr>
                                    <td style="text-align: right;">
                                                                                                                          
                                        <button type="button" class="btn btn-success" style="display:none" id="btnAddMore" onclick="_addRow()">
                                            Add More Item
                                        </button>                                        
                                    </td>
                                </tr> -->
                                <tr>
                                    <td style="padding: 30px 15px 30px 15px; background: #fff; text-align: center; font-size: 12px;">
                                       
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <thead>                                            
                                            <tr>
                                                <th colspan="3"  style=" font-size: 12px; text-align: left; border-bottom: 1px solid #000; padding-bottom: 10px; ">Description</th>
                                                <th style=" font-size: 12px; width: 60px;  text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Quantity</th>
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Unit Price</th>

                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">
                                                    <?php if ($showVat) { ?>
                                                        VAT
                                                    <?php } ?>
                                                </th>
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Amount GBP</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $extraCharge = 0;
                                            $total_amount = 0;
                                            $total_vat = 0;
                                            $vat = 0;
                                            $vatPrice = 0;
                                            foreach ($model as $key => $val) {
                                                $total_amount = $total_amount + $val->final_price;
                                                ?>
                                                <tr>
                                                    <td colspan="3" style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        <?php
                                                        $comment = "";
                                                        foreach ($val->pickupLocation as $pickup) {
                                                            $comment .= $pickup->location_name . " to ";
                                                        }
                                                        $comment .= $val->drop_location;
                                                        ?>
                                                        <textarea readonly name="booking[{{ $val->id }}]">{{ $comment }}</textarea>
                                                    </td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">1</td>
                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($val->final_price,2) }}</td>

                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        <?php if ($showVat) { ?>
                                                            <?php
                                                            // $extraCharge = 0;
                                                            // $booking_time = $val->booking_time;
                                                            // $vat_status = vatRegistrationCheck($booking_time);
                                                            $vat_status = $val->vat_registered;
                                                            if ($vat_status) {
                                                                $vatPrice += vatCalculation($val->final_price, env('VAT_AMOUNT'));
                                                                echo env('VAT_AMOUNT') . "%";
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($val->final_price,2) }}</td>
                                                </tr>
                                                
                                                <div id='invoiceDataGroup'>
                                                    <div id='TextBoxDiv1'>
                                                        <tr class="editprice" id="editprice_{{ $val->id }}">
                                                            <td colspan="3" style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input  type="text" readonly name="editdescription[{{ $val->id }}][]" >
                                                            </td>
                                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="editd_qnry number_only" readonly name="editd_qnry[{{ $val->id }}][]" id="editd_qnry_{{ $key }}" style="text-align: right">
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="editd_unitprice two-decimals" readonly name="editd_unitprice[{{ $val->id }}][]" id="editd_unitprice_{{ $key }}" style="text-align: right">
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <?php if ($showVat) { ?>
                                                                <input type="number" class="editd_vat two-decimals" readonly name="editd_vat[{{ $val->id }}][]" id="editd_vat_{{ $key }}" style="text-align: right" >
                                                                <?php } ?>
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="edit_total two-decimals" readonly name="editd_total[{{ $val->id }}][]" id="editd_total_{{ $key }}" style="text-align: right">
                                                            </td>
                                                            <!-- <td>
                                                                <button class="btn green submit new-row" onclick="addRow( {{ $val->id }} )" type="button">+</button>   
                                                            </td> -->
                                                        </tr>
                                                        <tr>
                                                            <td colspan="7" style="width: 100px; text-align: right; display:none" id="btnAddMore_{{ $key }}">
                                                                <button class="btn green submit new-row" onclick="addRow( {{ $val->id }} )" type="button">+</button>  
                                                            </td>
                                                        </tr> 
                                                    </div>
                                                </div>

                                                <?php
                                                foreach (@$val->invoice as $customInvoice) {

                                                    $extraCharge += ($customInvoice->price * $customInvoice->qnty);
                                                    ?>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <textarea readonly name="bookingCustomPricing[{{ $customInvoice->id }}]">{{$customInvoice->comment}}</textarea>
                                                        </td>
                                                        <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{  $customInvoice->qnty }}</td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">

                                                            <?php
                                                            if ($customInvoice->price > 0) {
                                                                echo env('CURRENCY_SYM') . number_format(($customInvoice->price), 2);
                                                            } else {
                                                                echo "-" . env('CURRENCY_SYM') . number_format(($customInvoice->price * -1), 2);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <?php
                                                            if ($customInvoice->vat) {
                                                                $vatPrice += vatCalculation(($customInvoice->price * $customInvoice->qnty), $customInvoice->vat);
                                                                echo $customInvoice->vat . "%";
                                                            } else {

                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">

                                                            <?php
                                                            if ($customInvoice->amount > 0) {
                                                                echo env('CURRENCY_SYM') . number_format(($customInvoice->amount), 2);
                                                            } else {
                                                                echo "-" . env('CURRENCY_SYM') . number_format(($customInvoice->amount * -1), 2);
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td colspan="5" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">
                                                    <input type="hidden" value="{{ number_format(@$total_amount + $extraCharge,2) }}" class="sub_total">

                                                    {{ env('CURRENCY_SYM') }} <span class="invoice_sub_total"> {{ number_format(@$total_amount + $extraCharge,2) }} </span>
                                                </td>
                                            </tr>
                                            <?php if ($showVat) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Total VAT</td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        
                                                        <input type="hidden" value="{{ number_format($vatPrice,2) }}" class="vat_total">

                                                        {{ env('CURRENCY_SYM') }} <span class="invoice_vat_total"> {{ number_format($vatPrice,2) }} </span>
                                                    </td>
                                                </tr>
                                            <?php }else{ ?>
                                                <input type="hidden" value="0" class="vat_total">
                                            <?php } ?>

                                            <?php
                                            $total_gbp = number_format((@$total_amount + $vatPrice + $extraCharge), 2);

                                            $advance_payment_amount = 0;
                                            foreach ($model as $key => $val) {
                                                $advance_payment_amount = $advance_payment_amount + $val->advance_payment_amount;
                                            }

                                            if ($advance_payment_amount) {

                                                $total_gbp = number_format(((@$total_amount + $vatPrice + $extraCharge) - $advance_payment_amount), 2);
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Advance Payment</td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">  -  {{ env('CURRENCY_SYM') }}{{ number_format($advance_payment_amount,2) }}</td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td></td>
                                                <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>Total GBP</strong></td>
                                                <input type="hidden" value="{{ $total_gbp }}" class="final_amount">
                                                <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;">
                                                    <strong>{{ env('CURRENCY_SYM') }} <span class="invoice_final_amount"> {{ $total_gbp }} </span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
                <!--*-->

                <!--*-->
                <tfoot style="">
                    <tr>
                        <td style="padding: 35px 15px; font-size: 13px; color: #999797; background: #ffffff;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="color: #000000;">
                                <tr>
                                    <td style="font-weight: 600;">Due Date: 
                                        @php $due_date = ($invoiceModel) ? $invoiceModel->due_date : date("d F Y"); @endphp

                                        <input style="width: 200px;display: inline;" type="text" readonly name="due_date" value="{{ $due_date }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sort Code: {{ $bookingDetails->franchisees->bank_sortcode }}</td>
                                </tr>
                                <tr>
                                    <td>Account Number: {{ $bookingDetails->franchisees->bank_account_no }}</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 30px;">Account Name: {{ $bookingDetails->franchisees->account_name }}</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td>Please ensure that the invoice number and the Franchise name is marked when remitting funds to our account. Thank you</td>
                                </tr>
                                <tr>
                                    <td>
                                        @php $note = ($invoiceModel->note) ?? '' ; @endphp
                                        <!-- <input type="text" name="note" readonly="readonly"> -->
                                        <textarea readonly name="note">{{ $note }}</textarea>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td>
                                        <!--                                    Company Registration No: 09068518.  -->
                                        Registered Office: Attention:
                                        {{ $bookingDetails->companyInfo->business_address }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tfoot>
                <!--*-->
            </table>
        </form>
    </body>
    <style>

        input[type="text"][readonly],
        input[type="number"][readonly],
        textarea[readonly]{
            background-color: transparent;
            background-image: none;
            padding: 0 0;
            color: #000000;
            font-weight: 500;
            border: 0;
        }
        input[type="text"],input[type=number],textarea{
            width: 100%;

        }
        textarea{
            resize: none;
            overflow: hidden;
        }
        .form-control {
            font-size: 13px;
        }
        table.newTable tbody tr:nth-child(4n),
        table.newTable tbody tr:nth-child(4n - 1){
           background: #faf1c2;
        }
        table.newTable tbody tr:nth-child(4n - 3),
        table.newTable tbody tr:nth-child(4n - 2){
           background: #f0f0f0;
        }
        table.newTable thead tr th{
            background: #32c5d2;
            color: #ffffff
        }
        table.newTable td,th{
            padding: 10px 10px;
            padding-right: 0px;
            vertical-align: top;
        }
        table.newTable td:last-child,
        table.newTable th:last-child{
            padding-right: 10px;
        }
        table.newTable tfoot tr td{
            background: #ffffff;
        }
        table.newTable input[type="number"][readonly]{
          text-align: right;
        }
       input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
        .error-border{
            border : 1px solid red
        }
    </style>

    <script>
        function invoiceFinalise(){
            $("input").removeClass("error-border");

            $(".editprice").each(function (index, value) {
                innerElement = false;
                $(this).find("input").each(function(){
                    if($(this).val()){
                        innerElement = true;
                    }
                });
                if(innerElement){
                    $(this).find("input").each(function(){
                        elementValue = $(this).val();
                        if(elementValue){
                        }else{
                            $(this).addClass("error-border")
                        }
                    })
                }
            });            

            // input validation check
            if($("input").hasClass("error-border")){
                return false;
            }else{
                return true;
            }            
        }

        function calculateMiscAmount(){
            
            _editTotalPrice = 0;
            editVatTotalPrice = 0;
            TotalPrice = 0;

            //editd_qnry-editd_unitprice            
            //jQuery("input.editd_qnry").each(function (index, value) {
            $('input[name^="editd_qnry"]').each(function (index, value) {
                
                //alert('sdddsddd')
                //console.log(index)
                
                editQty = jQuery('#editd_qnry_' + index).val(); //jQuery(this).val();                
                editdUnitprice = jQuery('#editd_unitprice_' + index).val(); //jQuery(".editd_unitprice").val();

                if(editdUnitprice > 0 && jQuery('#vat_applicable').val() > 0){
                    editdVatprice = jQuery('#editd_vat_' + index).val(); //jQuery(".editd_vat").val();
                }else{
                    editdVatprice = 0;   
                }

                //console.log(editdUnitprice)

                totalPrice = Number(editQty * editdUnitprice);

                vatTotal = Number((totalPrice * editdVatprice) / 100 );

                if(isNaN(vatTotal)){
                    vatTotal = 0;
                }

                //console.log("q*unit" + totalPrice)
                //console.log("edirVatprice" + editdVatprice)
                //console.log("vatTotal" + vatTotal)
                
                if(!isNaN(totalPrice)){
                    _editTotalPrice += Number(totalPrice);
                }

                if(!isNaN(vatTotal)){
                    editVatTotalPrice += Number(vatTotal);
                }
                
                if(_editTotalPrice > 0){
                    jQuery('#editd_total_' + index ).val(_editTotalPrice);
                }else{
                    jQuery('#editd_total_' + index ).val();
                }

                //console.log("tot price" + _editTotalPrice)
                //console.log("tot vat" + editVatTotalPrice)

                TotalPrice += _editTotalPrice;
                _editTotalPrice = 0;
            });

            sub_total = jQuery(".sub_total").val();
            vat_total = jQuery(".vat_total").val();
            final_amount = jQuery(".final_amount").val();

            //console.log(_editTotalPrice)
            //console.log("sub tot" + sub_total)
            //console.log("vat tot" + vat_total)
            //console.log("final" + final_amount);

            totalSum =  (Number(TotalPrice) + Number(sub_total));

            //console.log(Number(totalSum));

            totalVat =  (Number(editVatTotalPrice) + Number(vat_total));

            //totalGbp =  (Number(TotalPrice) + Number(final_amount) + Number(editVatTotalPrice));
            totalGbp =  (Number(totalSum) + Number(totalVat)); 

            //jQuery(".edit_total").val(_editTotalPrice)
            jQuery(".invoice_sub_total").html(totalSum.toFixed(2))
            jQuery(".invoice_vat_total").html(totalVat.toFixed(2))
            jQuery(".invoice_final_amount").html(totalGbp.toFixed(2))
            //jQuery(".final_amount").val(totalSum)

            //console.log(totalSum);
        }


        function calculateFinalAmount(){
            editTotalPrice = 0;
            $("input.edit_total").each(function (index, value) {
                editTotal = $(this).val();
                if(!isNaN(editTotal)){
                    editTotalPrice += Number(editTotal);
                }
            });

            final_amount = $(".final_amount").val();

            totalGbp =  (Number(editTotalPrice) + Number(final_amount));

            $(".invoice_final_amount").html(totalGbp)
        }


        function numberTypeClick(){
            
            jQuery("input[type=number]").on("keyup",function(){
                calculateFinalAmount();

                calculateMiscAmount();
            })
        }

        numberTypeClick();

        function editPage( cnt ) {
            //alert(cnt)
            jQuery("input[type=text],input[type=number], textarea").addClass('form-control');
            jQuery("input[type=text],input[type=number], textarea").attr('readonly', false);
            //$(".invoice_date").datepicker( "option", "dateFormat", "yy-mm-dd" );

            $('.invoice_date').datepicker({
                //dateFormat: 'yy-mm-dd'
                dateFormat: 'mm/dd/yy'
            });

            //jQuery(".editd_vat").val(20);
            jQuery("#btnFinalise").hide();  
            jQuery("#btnSave").show();            
            jQuery("#btnCancel").show();
            jQuery("#btnAddMore").show();

            for (i = 0; i < cnt; i++) {
              jQuery("#btnAddMore_" + i).show();
            }

            jQuery("#act").val('save');
        }
        function previewPage() {
            jQuery("input[type=text],input[type=number], textarea").attr('readonly', true)
            jQuery("input[type=text],input[type=number], textarea").removeClass('form-control');
        }


        /*jQuery(".two-decimals").on("keypress", function (evt) {
            var $txtBox = $(this);            
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
                return false;
            else {
                var len = $txtBox.val().length;
                var index = $txtBox.val().indexOf('.');
                if (index > 0 && charCode == 46) {
                  return false;
                }
                if (index > 0) {
                    var charAfterdot = (len + 1) - index;
                    if (charAfterdot > 3) {
                        return false;
                    }
                }
            }
            return $txtBox; //for chaining
        }); */         

        var numberOfDecimals = 2;
          jQuery(document).on("input", ".two-decimals", function () {
            var regExp = new RegExp('(\\.[\\d]{' + numberOfDecimals + '}).', 'g')    
            this.value = this.value.replace(/[^-?0-9.]/g, '').replace(/(\..*)\./g, '$1').replace(regExp, '$1');
        });     
        

        jQuery(".number_only").keydown(function(event) {
            
            // Ensure that it is a number and stop the keypress
            if (event.keyCode < 48 || event.keyCode > 57 ) {
                //event.preventDefault(); 
                return true;
            }            
        });

        
        // cancel invoice edit price 
        jQuery('input[name^="editd_unitprice"]').keyup(function(event) {
            jQuery('input[name^="editd_unitprice"]').each(function (index, value) {
                
                //console.log(jQuery("#editd_unitprice").val()); 

                if(jQuery("#editd_unitprice_" + index).val() < 0){

                    jQuery("#editd_vat_" + index).val(0);

                    jQuery('#editd_vat_' + index).attr('readonly', 'true');
                }else{
                    
                    //jQuery('#editd_vat').attr('readonly', 'false');
                    jQuery("#editd_vat_" + index).removeAttr("readonly");

                    jQuery("#editd_vat_" + index).val(20);    
                }        
            });
        });


        //
        function cancelPage(){            

            //jQuery("#invoiceForm").trigger("refresh");

            location.reload(true);
        }

        var cindex = 2;
        function addRow( id ){            

            //alert(id)
            //var cindex = 2;
            
            var clone = jQuery("tr#editprice_"+id+":first").clone();            

            clone.find(':text').val('');
            jQuery("tr#editprice_"+id+":last").after(clone); 

            //$clone.attr('id', 'editd_qnry_'+ 2 );

            jQuery('.editd_qnry', clone).attr('id', 'editd_qnry_' + cindex); 
            jQuery('.editd_unitprice', clone).attr('id', 'editd_unitprice_' + cindex); 
            jQuery('.editd_vat', clone).attr('id', 'editd_vat_' + cindex); 
            jQuery('.edit_total', clone).attr('id', 'editd_total_' + cindex); 

            cindex += 1; 

            numberTypeClick();
        }
    </script>
</html>

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
            <input type="hidden" name="VAT_AMOUNT" id="VAT_AMOUNT" value="{{ env('VAT_AMOUNT') }}" >
            <input type="hidden" name="cindex" id="cindex" value="{{ count($booking_ids) }}">
            
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
                                                                @php $customer_addres = ($invoiceModel->customer_addres) ? $invoiceModel->customer_addres : $bookingDetails->client->address ; @endphp 
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
                                                                            @php $franchisees_addressee = ($invoiceModel->franchisees_addressee) ? $invoiceModel->franchisees_addressee : $bookingDetails->franchisees->address; @endphp
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
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Unit Price ({{ env('CURRENCY_SYM') }})</th>
                                                
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">
                                                    <?php if ($showVat) { ?>
                                                        VAT
                                                    <?php } ?>
                                                </th>
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Amount GBP ({{ env('CURRENCY_SYM') }})</th>
                                                <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Action</th>
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
                                                        if( $val->invoice_descriptio ){
                                                            $comment = $val->invoice_descriptio;
                                                        }else{
                                                            foreach ($val->pickupLocation as $pickup) {
                                                                $comment .= $pickup->location_name . " to ";
                                                            }
                                                            $comment .= $val->drop_location;
                                                        }
                                                        ?>
                                                        <textarea readonly name="booking[{{ $val->id }}]">{{ $comment }}</textarea>
                                                    </td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">1</td>
                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ number_format($val->final_price,2) }}</td>
                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        <?php if ($showVat) { ?>
                                                            <?php
                                                            // $extraCharge = 0;
                                                            // $booking_time = $val->booking_time;
                                                            // $vat_status = vatRegistrationCheck($booking_time);
                                                            if($invoiceModel->vat_amount){
                                                                $vatPrice = $invoiceModel->vat_amount;
                                                            }else{
                                                                $vat_status = $val->vat_registered;
                                                                if ($vat_status) {
                                                                    $vatPrice += vatCalculation($val->final_price, env('VAT_AMOUNT'));
                                                                    echo env('VAT_AMOUNT') . "%";
                                                                } else {
                                                                    echo "-";
                                                                }
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ number_format($val->final_price,2) }}

                                                        <input type="hidden" class="unit_total_price" value="{{$val->final_price}}">
                                                    </td>
                                                    <td></td>                                                    
                                                </tr>
                                                <!-- Pre saved Dtails -->
                                                <?php
                                                foreach (@$val->invoice as $key1 => $customInvoice) {

                                                    $extraCharge += ($customInvoice->price * $customInvoice->qnty);
                                                    ?>
                                                    
                                                    <tr class="hasib_{{ $val->id }} editprice_{{ $val->id }}">                                                       
                                                        <td colspan="3" style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <textarea readonly name="editdescription[{{ $customInvoice->booking_id }}][]">{{$customInvoice->comment}}</textarea>
                                                        </td>
                                                        <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <input class="qnty edit_invoice"  type="number" readonly name="editd_qnry[{{ $customInvoice->booking_id }}][]" id="editd_qnry_{{ $key1 }}" value="{{ $customInvoice->qnty }}" style="text-align: right"> 
                                                        </td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <input class="unit_price edit_invoice" type="number" readonly name="editd_unitprice[{{ $customInvoice->booking_id }}][]" value="{{ $customInvoice->price }}" style="text-align: right"> 
                                                        </td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            @if($customInvoice->vat)
                                                                <input class="vat edit_invoice" type="number" readonly name="editd_vat[{{ $customInvoice->booking_id }}][]" value="{{ $customInvoice->vat }}" style="text-align: right"> 
                                                            @endif
                                                        </td>
                                                        <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                            <input class="total_amount edit_invoice unit_total_price" type="number" readonly name="editd_total[{{ $customInvoice->booking_id }}][]" value="{{ $customInvoice->amount }}" style="text-align: right"> 
                                                            <input class="total_vat_amount_hasib" style="display: none" type="number" readonly > 
                                                            
                                                        </td>
                                                        <td>
                                                            @php $deleted_vat_amt = ($customInvoice->vat) ? $customInvoice->vat : 0 ; @endphp
                                                            <button class="btn green remove-row" style="width: 100px; text-align: right; display:none" onclick="remove(this, {{ $val->id }}, {{$deleted_vat_amt}})" type="button" title="Remove">-</button>  
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                
                                                @php $index = (count($val->invoice)) > 0 ? count($val->invoice)  : $key;  @endphp
                                                <div id='invoiceDataGroup'>
                                                    <div id='TextBoxDiv1'>
                                                        <tr class="editprice hasib_{{ $val->id }} editprice_{{ $val->id }}">
                                                            <td colspan="3" style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <textarea readonly name="editdescription[{{ $val->id }}][]"></textarea>
                                                            </td>
                                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="qnty edit_invoice   editd_qnry number_only" readonly name="editd_qnry[{{ $val->id }}][]" id="editd_qnry_{{ $index }}" style="text-align: right">
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="unit_price edit_invoice editd_unitprice two-decimals" readonly name="editd_unitprice[{{ $val->id }}][]" id="editd_unitprice_{{ $index }}" style="text-align: right">
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <?php if ($showVat) { ?>
                                                                <input type="number" class="vat edit_invoice editd_vat two-decimals" readonly name="editd_vat[{{ $val->id }}][]" id="editd_vat_{{ $index }}" style="text-align: right" >
                                                                <?php } ?>
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                <input type="number" class="total_amount edit_invoice edit_total two-decimals unit_total_price" readonly name="editd_total[{{ $val->id }}][]" id="editd_total_{{ $index }}" style="text-align: right">
                                                                <?php if ($showVat) { ?>
                                                                <input class="total_vat_amount_hasib" style="display: none" type="number" readonly > 
                                                                <?php } ?>
                                                            </td>
                                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                                
                                                                <!-- <a class="btn btn-danger remove-row" style="width: 100px; text-align: right; display:none" onclick="remove(this, {{ $val->id }})"> - </a> -->
                                                                @php $deleted_vat_amt = 0 ; @endphp
                                                                <button class="btn btn-danger green remove-row" style=" text-align: right; display:none" onclick="remove(this, {{ $val->id }}, {{$deleted_vat_amt}})" type="button" title="Remove">-</button>  
                                                            </td>
                                                            <!-- <td>
                                                                <button class="btn green submit new-row" onclick="addRow( {{ $val->id }} )" type="button">+</button>   
                                                            </td> -->
                                                        </tr>
                                                        <tr>
                                                            <td colspan="9" style="width: 100px; text-align: right; display:none" id="btnAddMore_{{ $key }}">
                                                                <button class="btn green btn-success submit new-row" onclick="addRow( {{ $val->id }} )" type="button" title="Add More">+</button>  
                                                            </td>
                                                        </tr> 
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td colspan="5" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">
                                                    <!-- <input type="hidden" value="{{ number_format(@$total_amount + $extraCharge,2) }}" class="sub_total"> -->
                                                    <input type="hidden" value="{{ @$total_amount + $extraCharge }}" class="sub_total">

                                                    {{ env('CURRENCY_SYM') }} <span class="invoice_sub_total"> {{ number_format(@$total_amount + $extraCharge,2) }} </span>
                                                </td>
                                            </tr>
                                            <?php if ($showVat) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Total VAT</td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        
                                                        <!-- <input type="hidden" value="{{ number_format($vatPrice,2) }}" class="vat_total"> -->
                                                        <input type="hidden" value="{{ $vatPrice }}" class="vat_total">

                                                        <input type="hidden" name="final_vat_total" value="{{ $vatPrice }}" class="final_vat_total">

                                                        {{ env('CURRENCY_SYM') }} <span class="invoice_vat_total"> {{ number_format($vatPrice,2) }} </span>
                                                    </td>
                                                </tr>
                                            <?php }else{ ?>
                                                <input type="hidden" value="0" class="vat_total">
                                            <?php } ?>

                                            <tr>
                                                <td></td>
                                                <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Discount</td>
                                                <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">

                                                    @php $discount_amount = ($invoiceModel->discount_amount) ? $invoiceModel->discount_amount : 0 ; @endphp 
                                                    <input type="number" class="disc-amount two-decimals" readonly name="editd_discount" value="{{ $discount_amount }}" style="text-align: right" >
                                                </td>
                                            </tr>

                                            <?php
                                            $total_gbp = number_format(((@$total_amount + $vatPrice + $extraCharge) - $discount_amount), 2);

                                            $advance_payment_amount = 0;
                                            foreach ($model as $key => $val) {
                                                $advance_payment_amount = $advance_payment_amount + $val->advance_payment_amount;
                                            }

                                            if ($advance_payment_amount) {

                                                $total_gbp = number_format(((@$total_amount + $vatPrice + $extraCharge) - ($advance_payment_amount + $discount_amount) ), 2);
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

        function calculateFinalAmount_old(){
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
                ///calculateMiscAmount();
            })
        }

        numberTypeClick();

        function editPage( cnt ) {
            
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

            jQuery(".remove-row").show();

            autocalculateEditPrice();
        }

        function previewPage() {
            jQuery("input[type=text],input[type=number], textarea").attr('readonly', true)
            jQuery("input[type=text],input[type=number], textarea").removeClass('form-control');
        }
        var numberOfDecimals = 2;
          jQuery(document).on("input", ".two-decimals", function () {
            var regExp = new RegExp('(\\.[\\d]{' + numberOfDecimals + '}).', 'g')    
            this.value = this.value.replace(/[^-?0-9.]/g, '').replace(/(\..*)\./g, '$1').replace(regExp, '$1');
        });     
        

        jQuery(".number_only").keydown(function(event) {
            if (event.keyCode < 48 || event.keyCode > 57 ) {
                return true;
            }            
        });

        //
        function cancelPage(){            

            location.reload(true);
        }

        var cindex = jQuery("#cindex").val();
        function addRow( id ){            

            //alert(cindex)
            //var cindex = 2;

            var VAT_AMOUNT = jQuery('#VAT_AMOUNT').val();
            
            var clone = jQuery("tr.editprice_"+id+":first").clone();            

            //clone.find(':text').val('');
            clone.find("input").val("");
            jQuery("tr.editprice_"+id+":last").after(clone); 

            //$clone.attr('id', 'editd_qnry_'+ 2 );

            jQuery('.editd_qnry', clone).attr('id', 'editd_qnry_' + cindex); 
            jQuery('.editd_unitprice', clone).attr('id', 'editd_unitprice_' + cindex); 
            jQuery('.editd_vat', clone).attr('id', 'editd_vat_' + cindex); 
            jQuery('.edit_total', clone).attr('id', 'editd_total_' + cindex); 

            if(jQuery('#vat_applicable').val() > 0){
                jQuery('#editd_vat_' + cindex).val(VAT_AMOUNT);
            }

            cindex = Number(cindex) + Number(1); 

            jQuery(".remove-row").show();

            numberTypeClick();
            autocalculateEditPrice();
        }

        function remove(_this, id, vat_amt){
            //alert(vat_amt)
            //alert(jQuery(".vat_total").val())

            if($(".hasib_"+id).length < 2){
                jQuery(_this).closest('tr').find('input, textarea').val("");
                alert("Can't delete last row");
                return false;
            }

            pre_sub_total = jQuery(".vat_total").val();

            vew_vat = Number(pre_sub_total) - vat_amt ;

            jQuery(".vat_total").val(vew_vat);

            jQuery(_this).closest('tr').remove();
            calculateFinalAmount();
        }


        function autocalculateEditPrice(){            
           
            //var VAT_AMOUNT = jQuery('#VAT_AMOUNT').val();

            jQuery(".edit_invoice").on('keyup',function(){
                
                //fill vat amount auto
                /*if(jQuery('#vat_applicable').val() > 0){
                    jQuery(this).closest('tr').find('input.vat').val(VAT_AMOUNT); 
                }*/

                var qnty = $(this).closest('tr').find('input.qnty').val();
                var unit_price = $(this).closest('tr').find('input.unit_price').val();
                var vat = $(this).closest('tr').find('input.vat').val();

                // multiply qty with unit price
                totalPrice = Number(qnty * unit_price);
                // vat calculate
                calculateVat = Number((totalPrice * vat) / 100 );

                if(totalPrice){
                    jQuery(this).closest('tr').find('input.total_amount').val(totalPrice);    
                }else{
                    jQuery(this).closest('tr').find('input.total_amount').val("");
                }

                
                if(calculateVat){
                    jQuery(this).closest('tr').find('input.total_vat_amount_hasib').val(calculateVat);    
                }else{
                    jQuery(this).closest('tr').find('input.total_vat_amount_hasib').val("");    
                }
                
                calculateFinalAmount();
            })
        } 

        
        jQuery(".disc-amount").on('keyup',function(){
            //alert(jQuery(this).val())

            calculateFinalAmount();
        })
               


        function calculateFinalAmount(){
            var subTotalPrice = 0;
            var vatTotalPrice = 0;

            pre_sub_total = jQuery(".sub_total").val();
            pre_vat_total = jQuery(".vat_total").val();


            var totlatAmountAA = 0;
            $(".unit_total_price").each(function(){
                amount = Number($(this).val())
                if(amount){
                    totlatAmountAA = (Number(totlatAmountAA) + Number(amount))
                }
            })


            var editPriceVatAmount = 0;
            $(".total_vat_amount_hasib").each(function(){
                vat = Number($(this).val())
                if(vat){
                    editPriceVatAmount = (Number(editPriceVatAmount) + Number(vat))
                }
            })
           
            
            finalTotalVal = (Number(editPriceVatAmount) + Number(pre_vat_total));

            jQuery(".invoice_vat_total").html(finalTotalVal.toFixed(2));
            jQuery(".invoice_sub_total").html(totlatAmountAA.toFixed(2));

            jQuery(".final_vat_total").val(finalTotalVal.toFixed(2));



            if(jQuery(".disc-amount").val() > 0){
                invoice_final_amount =  (Number(finalTotalVal) + Number(totlatAmountAA) - Number(jQuery(".disc-amount").val()));
            }else{
                invoice_final_amount =  (Number(finalTotalVal) + Number(totlatAmountAA));    
            }

            //invoice_final_amount =  (Number(finalTotalVal) + Number(totlatAmountAA));
            jQuery(".invoice_final_amount").html(invoice_final_amount.toFixed(2))
        }
    </script>
</html>

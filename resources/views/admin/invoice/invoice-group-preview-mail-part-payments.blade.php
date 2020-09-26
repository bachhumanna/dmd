<?php
$showVat = false;

//pr($model->toarray());exit;
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
    </head>

    <?php //pr($model->invoice);exit;
    ?>

    <body style="background: #fff;">
        <form action="{{ route('invoice.invoice-email') }}" method="POST">
            {{ csrf_field() }}

            <?php /*
            <?php foreach ($booking_ids as $ids) { ?>
                <input style="display:none" name="booking_ids[]" type="checkbox" checked="checked" value="{{ $ids }}" >
            <?php } ?>
             */ ?>
            
             <input style="display:none" name="group_invoice_id" type="text"  value="<?= $id ?>" >

            <table width="900px" cellpadding="0" cellspacing="0" style="width: 900px; margin: 0 auto; font-family: 'Lucida Sans Unicode', sans-serif; max-width: 100%; background: #fafafa;">
                <!--*-->
                <thead>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-success">
                                Send Mail
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

                                                                <textarea name="customer_addres" readonly>{{$bookingDetails->client->address }}</textarea>

                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style=" padding:40px 20px; width: 250px; vertical-align: top;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-size: 12px;line-height: 1; color: #424242; text-transform: capitalize; vertical-align: top;">
                                                    <table width="100%" cellpadding="0" cellspacing="0">


                                                        <tr>
                                                            <td style=" line-height: 1.8;">
                                                                <strong style="font-size: 15px;">Invoice Date</strong> 
                                                                <br>
                                                                <input type="text" name="invoice_date" readonly value="{{ date("d F Y") }}" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="line-height: 1.8;">
                                                                <strong style="font-size: 15px;">Invoice Number </strong> 
                                                                <br> 
                                                                <input type="text" readonly name="invoice_number">
                                                            </td>
                                                        </tr>
                                                        <?php if ($showVat) { ?>
                                                            <tr>
                                                                <td style="line-height: 1.8;"><strong style="font-size: 15px;">Vat Number</strong> <br>{{ $bookingDetails->companyInfo->vat_number }}</td>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td style="line-height: 1.8;"><strong style="font-size: 15px;">Payment Status</strong> <br>
                                                                @php $payment_status = ($bookingDetails->payment_status > 0) ? 'Paid' : 'Unpaid'; @endphp
                                                                {{ $payment_status }}
                                                            </td>
                                                        </tr>

                                                        <?php if ($bookingDetails->payment_date) { ?>
                                                            <tr>
                                                                <td style="line-height: 1.8;"><strong style="font-size: 15px;">Payment Date</strong> <br>
                                                                    {{ showStandardDate($bookingDetails->payment_date) }}
                                                                </td>
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

                                                                        <td style="margin-bottom: 10px; display: block;">
                                                                            <strong style="font-size: 15px;">
                                                                                {{ $bookingDetails->franchisees->name }}


                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="margin-bottom: 10px; display: block;">
                                                                            <textarea readonly name="franchisees_addressee" readonly>{{$bookingDetails->franchisees->address}}</textarea>


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


                            <table  style="width: 100%;">
                                <tr>
                                    <td style="padding: 30px 15px 30px 15px; background: #fff; text-align: center; font-size: 12px;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
    <!--                                            <th style=" font-size: 12px; text-align: left; border-bottom: 1px solid #000; padding-bottom: 10px; ">Booking Date&nbsp;&nbsp;</th>
                                                <th style=" font-size: 12px; text-align: left; border-bottom: 1px solid #000; padding-bottom: 10px; ">Booking Number</th>-->
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
        <!--                                                <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ date('d-m-Y',strtotime($val->booking_time)) }} </td>
                                                    <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        {{ $val->order_id }}  
                                                    </td>-->
                                                    <td colspan="3" style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                        <b><?= showDate(($val->booking_time))." - " ?> </b>
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
                                                                echo "No VAT";
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
                                            <?php /* echo $total_amount.'<br>';;
                                              echo $vat.'<br>';
                                              echo $extraCharge;'<br>';

                                              exit; */
                                            ?>

                                            <tr>
                                                <td></td>
                                                <td colspan="5" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format(@$total_amount +$extraCharge,2) }}</td>
                                            </tr>
                                            <?php if ($showVat) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Total VAT</td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($vatPrice,2) }}</td>
                                                </tr>
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
                                                    <td colspan="6" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Advance Payment</td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">  -  {{ env('CURRENCY_SYM') }}{{ number_format($advance_payment_amount,2) }}</td>
                                                </tr>
                                            <?php } ?>
                                                
                                            @php $part_payment_tot = 0; @endphp
                                                @if($partPayments->count() > 0)
                                                @foreach($partPayments as $partPayment)
                                                    @php $part_payment_tot += $partPayment->amount; @endphp
                                                    <tr>                                                        
                                                        <td colspan="6" style="width: 100px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Payment on {{ showDate($partPayment->payment_time) }}</td>
                                                        <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">  -  {{ env('CURRENCY_SYM') }}{{ number_format($partPayment->amount,2) }}</td>
                                                    </tr>

                                                @endforeach                                        
                                            @endif
                                        
                                            <?php                                        
                                            if ($part_payment_tot > 0) {

                                                $total_gbp = number_format(( $total_gbp - $part_payment_tot), 2);
                                            }?>   

                                                <tr>
                                                    <td></td>
                                                    <td colspan="5" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>Total GBP</strong></td>
                                                    <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;"><strong>{{ env('CURRENCY_SYM') }} {{ $total_gbp }}</strong></td>
                                                </tr>
      
                                        </table>
                                    </td>                                  
                            </table>
                        </td>

                    </tr>

                </tbody>
                <!--*-->

                <!--*-->
                <tfoot st    yle="">
                    <tr>
                        <td style="padding: 35px 15px; font-size: 13px; color: #999797; background: #ffffff;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="color: #000000;">
                                <tr>
                                    <td style="font-weight: 600;">Due Date: <input style="width: 200px;display: inline;" type="text" readonly name="due_date" value="{{ date("d F Y") }}" ></td>
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
                                <tr><td>
                                        <input   type="text" name="note" readonly="readonly">
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
        textarea[readonly]{
            background-color: transparent;
            background-image: none;
            padding: 0 0;
            color: #000000;
            font-weight: 500;
            border: 0;
        }
        input[type="text"],textarea{
            width: 100%;

        }
        textarea{
            resize: none;
            overflow: hidden;
        }
        .form-control {
            font-size: 13px;
        }
    </style>
    <script>
        function editPage() {
            jQuery("input[type=text], textarea").addClass('form-control');
            jQuery("input[type=text], textarea").attr('readonly', false)
        }
        function previewPage() {
            jQuery("input[type=text], textarea").attr('readonly', true)
            jQuery("input[type=text], textarea").removeClass('form-control');
        }
    </script>
</html>

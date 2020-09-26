<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>Driving Miss Daisy</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body style="background: #fff;">
        <table width="900px" cellpadding="0" cellspacing="0" style="width: 900px; margin: 0 auto; font-family: 'Lucida Sans Unicode', sans-serif; max-width: 100%; background: #fafafa;">
            <!--*-->
            <thead>
                <tr>
                    <td style="background: #999797; padding: 16px 0px;">
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
                        <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f1d5;">
                            <tr>
                                <td style=" padding:40px 20px; width: 150px; vertical-align: top;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding-top: 3px;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="color: #000; font-size: 26px; line-height: 1; text-transform: capitalize; padding-bottom: 22px;">TAX INVOICE</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;line-height: 1; color: #424242; text-transform: capitalize;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px; ">{{ $model->client->name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px;">{{ $model->client->address }}</td>
                                                    </tr>
<!--                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px;">{{ $model->client->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom:10px; "></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom:10px; ">{{ $model->client->postcode }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom:0px;">{{ $model->client->county }}</td>
                                                    </tr>-->
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
                                                        <td style=" line-height: 1.8;"><strong style="font-size: 15px;">Booking Number</strong> <br> {{ $model->order_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" line-height: 1.8;"><strong style="font-size: 15px;">Invoice Date</strong> <br> {{ date("dS M Y",strtotime($model->booking_time)) }}</td>
                                                    </tr>
<!--                                                    <tr>
                                                        <td style="line-height: 1.8;"><strong style="font-size: 15px;">Reference</strong> <br> Driving Miss Daisy W/C 15th Oct.18</td>
                                                    </tr>-->
                                                    <tr>
                                                        <td style="line-height: 1.8;"><strong style="font-size: 15px;">Vat Number</strong> <br>{{ $model->franchisees->vat_number }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="vertical-align: top; font-size: 13px; width: 75px">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td style="margin-bottom: 10px; display: block;">{{ $model->franchisees->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="margin-bottom: 10px; display: block;">{{ $model->franchisees->address }}</td>
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
                                <td style="padding: 30px 15px 30px 15px; background: #f7f1d5; text-align: center; font-size: 12px;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th style=" font-size: 12px; text-align: left; border-bottom: 1px solid #000; padding-bottom: 10px; ">Description</th>
                                            <th style=" font-size: 12px; width: 60px;  text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Quantity</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Unit Price</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">VAT</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Amount GBP</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                {{ $model->client->name }}
                                                {{ $model->booking_time }}
                                                <?php
                                                foreach ($model->pickupLocation as $pickup) {
                                                    echo $pickup->location_name . " to ";
                                                }
                                                ?>

                                                {{ $model->drop_location }} 
                                            </td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">1</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->final_price,2) }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                <?php
                                                $extraCharge = 0;
                                                $vat = 0;
                                                if ($model->franchisees->vat_reg) {
                                                  
                                                    $vat = vatCalculation($model->final_price, env('VAT_AMOUNT'));
                                                    echo env('VAT_AMOUNT')."%";
                                                } else {
                                                    echo "No VAT";
                                                }
                                                ?>    


                                            </td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->final_price,2) }}</td>
                                        </tr>


                                        <?php foreach ($model->invoice as $customInvoice) {
                                            
                                              $extraCharge += ($customInvoice->price * $customInvoice->qnty);
                                            ?>
                                            <tr>
                                                <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">

                                                    <?= $customInvoice->comment ?>

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
                                                    //$vat = 0;
                                                    if ($customInvoice->vat) {
                                                        $vat += vatCalculation(($customInvoice->price * $customInvoice->qnty), $customInvoice->vat);
                                                        echo $customInvoice->vat."%";
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


                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->final_price +$extraCharge,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 60px; text-align: right; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">Total VAT</td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($vat,2) }}</td>
                                        </tr>
                                       

                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>Total GBPT</strong></td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;"><strong>{{ env('CURRENCY_SYM') }}{{ number_format(($model->final_price + $vat +$extraCharge),2) }}</strong></td>
                                        </tr>
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
                    <td style="padding: 35px 15px; font-size: 13px; color: #fff; background: #999797;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="color: #fff;">
                            <tr>
                                <td style="font-weight: 600;">Due Date: {{ date("d F Y") }}</td>
                            </tr>
                            <tr>
                                <td>Sort Code: {{ $model->franchisees->sort_code }}</td>
                            </tr>
                            <tr>
                                <td>Account Number: {{ $model->franchisees->bank_account_no }}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 30px;">Account Name: {{ $model->franchisees->account_name }}</td>
                            </tr>
<!--                            <tr>
                                <td>Please ensure that the invoice number and the Franchise name is marked when remitting funds to our account. Thank you</td>
                            </tr>
                            <tr>
                                <td>Company Registration No: 09068518.  Registered Office: Attention: Gavin Pell, 18 The Slipway, Marina Keep, Port Solent, Portsmouth, Hampshire, PO6 4TR, United Kingdom.</td>
                            </tr>-->

                        </table>
                    </td>
                </tr>
            </tfoot>
            <!--*-->
        </table>
    </body>
</html>

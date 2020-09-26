<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>Driving Miss Daisy</title>
        <link rel="shortcut icon" type="{{ asset('/admin/img/logo.png') }}" href="{{ asset('/admin/img/logo.png') }}">
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
            <tbody  >
                <tr>
                    <td style="background: #f7f1d5;">
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
                                                        <td style="width: 182px; padding-bottom: 10px; ">{{ $model->franchisees->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px; ">{{ $model->franchisees->address }}</td>
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
                                                        <td style=" line-height: 1.8;"><strong style="font-size: 15px;">Invoice Date</strong> <br> {{ date("dS M Y",strtotime($model->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" line-height: 1.8;"><strong style="font-size: 15px;">Invoice Number</strong> <br> {{ $model->invoice_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" line-height: 1.8;"><strong style="font-size: 15px;">VAT Number</strong> <br> {{ $model->franchisees->vat_number }}</td>
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
                                                        <td style=" line-height: 1.8;">{{ getConfigValue('company_name') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" line-height: 1.8;">{{ getConfigValue('business_address') }}</td>
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
                    <td style="background: #f7f1d5;">
                        <table  style="width: 100%;">
                            <tr>
                                <td style="padding: 30px 15px 30px 15px; background: #f7f1d5; text-align: center; font-size: 12px;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th style=" font-size: 12px; text-align: left; border-bottom: 1px solid #000; padding-bottom: 10px; ">Description</th>
                                            <th style=" font-size: 12px; width: 60px;  text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Quantity</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Unit Price</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">VAT</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Amount GBP</th>
                                            
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                {{ date("F", mktime(0, 0, 0,$model->invoice_for_month, 10)) }} 
                                                {{ $model->invoice_for_year}} - Franchise fee
                         
                                            </td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">1</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->standard_fee+$model->commission,2) }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('VAT_AMOUNT') }}%</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format(($model->standard_fee + $model->commission),2) }}</td>
                                        </tr>
                                        <?php 
                                        $totalFee = 0;
                                        $vat = 0;
                                        foreach ($invoiceFees as $fee){ 
                                            if($fee->fee_id == -1){
                                                $vat += vatCalculation($fee->qnty * $fee->price, $fee->vat);
                                            }
                                            $totalFee += $fee->amount;
                                            ?>
                                            <tr>
                                                <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                   {{ $fee->fee_type }}
                                                </td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ $fee->qnty }}</td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                
                                                <?php 
                                                if($fee->price > 0){
                                                    echo env('CURRENCY_SYM') . number_format(($fee->price),2);
                                                }else{
                                                    echo "-".env('CURRENCY_SYM') . number_format(($fee->price * -1),2);
                                                }
                                                ?>
                                                
                                                </td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ $fee->vat }}%</td>
                                                <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                
                                                    <?php 
                                                if($fee->amount > 0){
                                                    echo env('CURRENCY_SYM') . number_format(($fee->amount),2);
                                                }else{
                                                    echo "-".env('CURRENCY_SYM') . number_format(($fee->amount * -1),2);
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                        
                                        <?php } ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format(($model->standard_fee + $model->commission + $totalFee),2) }}</td>
                                        </tr>
                                        <?php if($model->custom_entry){ ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">{{ $model->comment }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">
                                                <?php 
                                                if($model->custom_entry > 0){
                                                    echo env('CURRENCY_SYM') . number_format(($model->custom_entry),2);
                                                }else{
                                                    echo "-".env('CURRENCY_SYM') . number_format(($model->custom_entry * -1),2);
                                                }
                                                ?>
                                            
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>TOTAL VAT</strong></td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;"><strong>{{ env('CURRENCY_SYM') }}{{ number_format(($model->VAT+$vat),2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>Total GBP</strong></td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;"><strong>{{ env('CURRENCY_SYM') }}{{ number_format($model->amount,2) }}</strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>

                </tr>

                
                
                
                
                
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f1d5;">
                            <tr>
                                <td style=" padding:40px 20px; width: 150px; vertical-align: top;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                         
                                        <tr>
                                            <td style="font-size: 14px;line-height: 1; color: #424242; text-transform: capitalize;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px; ">
                                                            Due Date:    {{ date("F", mktime(0, 0, 0,$model->invoice_for_month, 10)) }} {{ $model->invoice_for_year}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px; ">Account Number: {{ getConfigValue('account_no') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px;">Account Name: {{ getConfigValue('account_name') }}</td>
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
                        <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f1d5;">
                            <tr>
                                <td style=" padding:40px 20px; width: 150px; vertical-align: top;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                         
                                        <tr>
                                            <td style="font-size: 14px;line-height: 1; color: #424242; text-transform: capitalize;">
                                                Please ensure that the invoice number and the Franchise name is marked when remitting funds to our account. Thank you
                                            </td>
                                        </tr>
                                    </table>
                                </td>            
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    
        
        
    </body>
</html>

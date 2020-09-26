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
                                                        <td style="color: #000; font-size: 26px; line-height: 1; text-transform: capitalize; padding-bottom: 22px;">FRANCHISOR INVOICE</td>
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
                                                        <td style="width: 182px; padding-bottom: 10px; ">{{ $model->franchisees->street }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px;">{{ $model->franchisees->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 182px; padding-bottom: 10px;">{{ $model->franchisees->postcode }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 182px; padding-bottom:0px;">{{ $model->franchisees->county }}</td>
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
                                            <th style=" font-size: 12px; width: 60px;  text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Turnover</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Standard Fee</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;  ">Commission</th>
                                            <th style=" font-size: 12px; width: 100px; text-align: right; padding-left: 5px; border-bottom: 1px solid #000; padding-bottom: 10px;">Total Invoice</th>
                                            
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                                                NAME: {{ $model->franchisees->name }}
                                                MONTH: {{ date("F", mktime(0, 0, 0,$model->invoice_for_month, 10)) }} 
                                                YEAR: {{ $model->invoice_for_year}}
                         
                                            </td>
                                           
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->turnover,2) }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->standard_fee,2) }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($model->commission,2) }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format(($model->standard_fee + $model->commission),2) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">Subtotal</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format(($model->standard_fee + $model->commission),2) }}</td>
                                        </tr>
                                        <?php foreach ($invoiceFees as $fee){ ?>
                                        
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 100px; text-align: right; padding-top: 10px;  padding-bottom: 10px;">{{ $fee->fee_type }}</td>
                                            <td style="width: 100px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px;">{{ env('CURRENCY_SYM') }}{{ number_format($fee->amount,2) }}</td>
                                        </tr>
                                        
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" style="width: 60px; text-align: right; padding-top: 10px; padding-bottom: 10px; text-transform: uppercase; font-weight: 600;"><strong>Total GBPT</strong></td>
                                            <td style="width: 60px; text-align: right; padding-left: 5px; padding-top: 10px;  padding-bottom: 10px; font-weight: 600;"><strong>{{ env('CURRENCY_SYM') }}{{ number_format($model->amount,2) }}</strong></td>
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
            <tfoot>
                <tr>
                    <td style="padding: 35px 15px; font-size: 13px; color: #fff; background: #999797;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="color: #fff;">
                            <!--<tr>
                                <td style="font-weight: 600;">Due Date: 7 Nov 2018</td>
                            </tr>
                            <tr>
                                <td>Sort Code: 20-30-89</td>
                            </tr>
                            <tr>
                                <td>Account Number: {{ $model->franchisees->bank_account_no }}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 30px;">Account Name: {{ $model->franchisees->account_name }}</td>
                            </tr> -->
                            <tr>
                                <td>Please ensure that the invoice number and the Franchise name is marked when remitting funds to our account. Thank you</td>
                            </tr>
                            <tr>
                                <td>Company Registration No: 09068518.  Registered Office: Attention: Gavin Pell, 18 The Slipway, Marina Keep, Port Solent, Portsmouth, Hampshire, PO6 4TR, United Kingdom.</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </tfoot>
            <!--*-->
        </table>
    </body>
</html>

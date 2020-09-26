<div class="portlet-body flip-scroll">
    <table class="table table-bordered table-striped table-condensed flip-content">
        <tbody>
            <tr>
                <th>Base Fee</th>
                <td>{{  env('CURRENCY_SYM') }}{{ $base_fee }}</td>
            </tr>
            <tr>
                <th>Commission</th>
                <td>{{  env('CURRENCY_SYM') }}{{ $commission }}</td>
            </tr>
            <?php
            $feeAmount=0;
            foreach($invoiceFees as $fee){
                $feeAmount+= $fee->amount;
            ?>
            <tr>
                <th>{{ $fee->name }}</th>
                <td>{{  env('CURRENCY_SYM') }}{{ number_format($fee->amount,2) }}</td>
            </tr>
            <?php } ?>
            
            <?php if($custom_entry){ ?>
                <tr>
                    <th>{{ $comment }}</th>
                    <td>{{  env('CURRENCY_SYM') }}{{ number_format(($custom_entry) ,2) }}</td>
                </tr>
            
            <?php } ?>
            <tr>
                <th>Total</th>
                <td>{{  env('CURRENCY_SYM') }}{{ number_format(($base_fee + $commission + $feeAmount + $custom_entry) ,2) }}</td>
            </tr>
        </tbody>
    </table>


</div>
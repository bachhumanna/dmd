<div class="portlet-body flip-scroll">


    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"> Price Breakdown</div>

        </div>
        <div class="portlet-body flip-scroll">
            <?php //pr($pricingDetails);
            
            ?>
            <table class="table table-bordered table-striped table-condensed flip-content details">

                <tbody>
                    <tr>
                        <th>Type</th>
                        <th>Out&nbsp;Trip</th>
                        <th>Return&nbsp;Trip</th>
                        <th>Total&nbsp;Trip</th>
                        <?php if($vat){ ?>
                        <th>VAT</th>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Pick Up</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['pick_up_cost'], 2) ?></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['pick_up_cost'], 2) ?></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['pick_up_cost'] + $pricingDetails['data']['outward']['pick_up_cost'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['pick_up_cost'] + $pricingDetails['data']['outward']['pick_up_cost'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Destination</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['destination'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['destination'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['destination'] + $pricingDetails['data']['outward']['destination'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['destination'] + $pricingDetails['data']['outward']['destination'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Waiting</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['waiting'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['waiting'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['waiting'] + $pricingDetails['data']['outward']['waiting'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['waiting'] + $pricingDetails['data']['outward']['waiting'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <tr>                       
                        <th>Companion</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['companion'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['companion'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['companion'] + $pricingDetails['data']['outward']['companion'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['companion'] + $pricingDetails['data']['outward']['companion'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Comfort</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['comfort_break'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['comfort_break'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['comfort_break'] + $pricingDetails['data']['outward']['comfort_break'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['comfort_break'] + $pricingDetails['data']['outward']['comfort_break'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <?php if($pricingDetails['companionRequired'] ==2){ ?>
                    <tr>
                        <th>Companion Cost</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['companion_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['companion_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['companion_cost'] + $pricingDetails['data']['outward']['companion_cost'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['companion_cost'] + $pricingDetails['data']['outward']['companion_cost'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>Return to Base</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['outward']['drop_off_to_base'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['drop_off_to_base'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['data']['return']['drop_off_to_base'] + $pricingDetails['data']['outward']['drop_off_to_base'], 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation($pricingDetails['data']['return']['drop_off_to_base'] + $pricingDetails['data']['outward']['drop_off_to_base'], env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>
                    <?php foreach ($pricingDetails['misc'] as $misc) { ?>
                        <tr>
                            <th>{{ $misc['misc'] }}</th>

                            <td colspan="3"><span>{{ env('CURRENCY_SYM') }}{{ number_format($misc['amount'],2) }}</span></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th>Total</th>
                        <td><span>
                                {{ env('CURRENCY_SYM') }}
                                <?php
                                $outwardSum = array_sum($pricingDetails['data']['outward']);
                                echo number_format($outwardSum, 2);
                                ?>
                            </span>
                        </td>
                        <td>
                            <span>
                                {{ env('CURRENCY_SYM') }}
                                <?php
                                $returnSum = array_sum($pricingDetails['data']['return']);
                                echo number_format($returnSum, 2);
                                ?>
                            </span>
                        </td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(($outwardSum + $returnSum + $pricingDetails["misc_total"]), 2) ?></span></td>
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation(($outwardSum + $returnSum + $pricingDetails["misc_total"]),env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } ?>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
    <div style='text-align:left'>
        <?php /// pr($pricingDetails['data'])  ?>
    </div>




    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"> Expenses Breakdown</div>

        </div>
        <div class="portlet-body flip-scroll">
            <?php //pr($pricingDetails) ?>
            <table class="table table-bordered table-striped table-condensed flip-content details">

                <tbody>
                    <tr>
                        <th></th>
                        <th>Outward&nbsp;Trip</th>
                        <th>Return&nbsp;Trip</th>
                        <th>Total&nbsp;Trip</th>
                    </tr>
                    <tr>
                        <th>Vehicle Cost</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['outward']['outward_vehicle'], 2) ?></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['outward_vehicle'], 2) ?></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['outward_vehicle'] + $pricingDetails['expensesData']['outward']['outward_vehicle'], 2) ?></span></td>
                    </tr>
                    <tr>
                        <th>Driver Cost</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['outward']['driver_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['driver_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['driver_cost'] + $pricingDetails['expensesData']['outward']['driver_cost'], 2) ?></span></td>
                    </tr>
                    
                    <?php if($pricingDetails['companionRequired'] ==2){ ?>
                     <tr>
                        <th>Companion Cost</th>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['outward']['companion_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['companion_cost'], 2) ?></span></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format($pricingDetails['expensesData']['return']['companion_cost'] + $pricingDetails['expensesData']['outward']['companion_cost'], 2) ?></span></td>
                    </tr>
                    <?php } ?>
                    
                    
                    <tr>
                        <th>Total</th>
                        <td><span>
                                {{ env('CURRENCY_SYM') }}
                                <?php
                                $outwardExpSum = array_sum($pricingDetails['expensesData']['outward']);
                                echo number_format($outwardExpSum, 2);
                                ?>
                            </span>
                        </td>
                        <td>
                            <span>
                                {{ env('CURRENCY_SYM') }}
                                <?php
                                $returnExpSum = array_sum($pricingDetails['expensesData']['return']);
                                echo number_format($returnExpSum, 2);
                                ?>
                            </span>
                        </td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(($outwardExpSum + $returnExpSum), 2) ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    
    
    
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"> Profit</div>

        </div>
        <div class="portlet-body flip-scroll">
            <?php //pr($pricingDetails) ?>
            <table class="table table-bordered table-striped table-condensed flip-content details">

                <tbody>
                    <tr>
                        <th>Outward</th>
                        <th>Return</th>
                        <th>Total&nbsp;Trip</th>
                    </tr>
                    <tr>
                        
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(($outwardSum - $outwardExpSum) , 2) ?></span></td>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(($returnSum - $returnExpSum)  , 2) ?></span></td>
                        <td>
                            <span>
                                {{ env('CURRENCY_SYM') }}
                                <?php
                                    
                                    $totalQ = $outwardSum + $returnSum + $pricingDetails["misc_total"];
                                    $totalExp = $outwardExpSum + $returnExpSum;
                                    echo number_format($totalQ - $totalExp, 2) 
                                ?>
                                <b>(<?= tripProfit($totalQ, $totalExp) ?> %)</b>
                            </span>
                            
                        </td>
                    </tr>
                    
                    
                     
                </tbody>
            </table>
        </div>
    </div>
    
    <?php //if ($pricingDetails['advance_payment_amount']) { ?>
     <!--<div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"> Advance Payment</div>
        </div>
        <div class="portlet-body flip-scroll">            
            <table class="table table-bordered table-striped table-condensed flip-content details">
                <tbody>
                    <tr>
                        <th>Advance Amount</th>
                        <th>Total Amount</th>                        
                    </tr>
                    <tr>                        
                        <td><span>{{ env('CURRENCY_SYM') }}<?php //$pricingDetails['advance_payment_amount']; ?></span></td>                         
                        <?php if($vat){ ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(vatCalculation(($outwardSum + $returnSum + $pricingDetails["misc_total"]),env('VAT_AMOUNT'),true), 2) ?></span></td>
                        <?php } else { ?>
                        <td><span>{{ env('CURRENCY_SYM') }}<?= number_format(($outwardSum + $returnSum + $pricingDetails["misc_total"]), 2) ?></span></td>
                        <?php } ?>                        
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>->
    <?php //} ?>
    
    <div class="portlet box green" style="display:none">
        <div class="portlet-title">
            <div class="caption"> Trip Cost Breakdown</div>
        </div>
        
        <div class="portlet-body flip-scroll">
            <?php //pr($pricingDetails) ?>
            <table class="table table-bordered table-striped table-condensed flip-content">

                <tbody>
                    <tr>
                        <th>Pickup and drop off cost </th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['paid_mileage'] ?></td>
                    </tr>
                    <tr>
                        <th>Trip
                        </th>
                        <td> {{ env('CURRENCY_SYM') }}{{  $pricingDetails['base_driving_cost']  }}</td>
                    </tr>
                    <tr>
                        <th>Waiting </th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['waitingCost'] ?></td>
                    </tr>
                    <tr>
                        <th>Companionship</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['companionCost'] ?></td>
                    </tr>
                    <tr>
                        <th>Comfort breaks</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['comfortCost'] ?></td>
                    </tr>
                    <?php if ($pricingDetails['drop_off_to_base_cost']) { ?>
                        <tr>
                            <th>Return Mileage</th>
                            <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['drop_off_to_base_cost'] ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th>Total Quoted Price</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['total_price'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div class="portlet box green" style="display:none">
        <div class="portlet-title">
            <div class="caption"> Pricing Detail</div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>
                    <tr>
                        <th>Generated Quote Price</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['total_price'] ?></td>
                    </tr>
                    <tr>
                        <th>Vehicle Cost</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['vehicle_charge'] ?></td>
                    </tr>
                    <tr>
                        <th>Driver Cost</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['driver_charge'] ?></td>
                    </tr>
                    <tr>
                        <th>Profit on job</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['tripAmount'] ?> <b> ( <?= $pricingDetails['tripProfit'] ?>%) </b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($pricingDetails['customPrice']) { ?>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"> Alternative Quote Price</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Generated Quote Price</th>
                            <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['customPrice'] ?></td>
                        </tr>
                        <tr>
                            <th>Profit on job</th>
                            <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['custom_tripAmount'] ?> <b> ( <?= $pricingDetails['custom_tripProfit'] ?>%) </b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>


</div>
<style>
    .details tr td{
        text-align: left;
    }
    .details tr td span{
        float: right
    }
</style>
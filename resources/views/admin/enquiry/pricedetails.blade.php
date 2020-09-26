<div class="portlet-body flip-scroll">

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"> Trip Cost Breakdown</div>

        </div>
        <div class="portlet-body flip-scroll">
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
                    <tr>
                        <th>Return Mileage</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Total Quoted Price</th>
                        <td>{{ env('CURRENCY_SYM') }}<?= $pricingDetails['total_price'] ?></td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>



    <div class="portlet box green">
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
    <?php if($pricingDetails['customPrice']){ ?>
    
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
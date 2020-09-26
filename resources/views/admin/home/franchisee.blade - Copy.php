@extends('admin.home.template')

@section('body')
<?php
$now = \Carbon\Carbon::now();
?>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Dashboard
    <small></small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">

    <div class="col-md-12">
        <div class="m-heading-1 border-green m-bordered">
            <span class="caption-subject font-dark bold uppercase" style='font-size:11px'>
                <span class='f-name' style='font-size:30px'>{{ $franchiseeModel->name}}</span>
                <br>
                {{ $franchiseeModel->base_location}}
            </span>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('driver.index') }}">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $driverCount }}">0</span>
                </div>
                <div class="desc">Companion Drivers</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('vehicles.index') }}">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $vehicles }}">0</span>
                </div>
                <div class="desc">Vehicles</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('chart-report-year') }}">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $bookingCount }}"></span> </div>
                <div class="desc">Bookings</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('client.index') }}">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $clientCount }}"></span> </div>
                <div class="desc">Number of clients</div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>










<div class="row">



<div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Todays Booking</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                       <tr>
                            <th class="table-bookin-id">@sortablelink('order_id','Booking#')</th>
                            <th >@sortablelink('client_id','Name')</th>
                            <th>@sortablelink('booking_time','Pickup Time')</th>
                            <th>Pickup</th>
                            <th>@sortablelink('drop_location','Destination')</th>
                            <th class="table-deiver-name">@sortablelink('driver_id','Driver Name')</th>
                            <th class="align-center" style="width:160px">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($todaysBooking as $model) { ?>


                        <tr>
                            <td>{{ $model->order_id }}</td>
                            <td>{{ $model->client->name }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <?php /* ?>
                              <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                              <td>{{ $model->total_duration }} Min</td>
                              <?php */ ?>

<!--                            <td>{{ $model->base_location}}</td>-->
                            <td><?= $model->pickup ?></td>
<!--                            <td>{{ @$model->client->phone }}</td>-->
                            <td>{{ @$model->dropLocation->location_name}}</td>
                            <td>{{ @$model->Drivername->FullName }}</td>
<!--                                    <td><?= $model->payment_status ? "<span class='label label-sm label-success'>Paid  </span>" : "<span class='label label-sm label-danger'> Unpaid </span>" ?></td>-->

<!--                            <td class="text-center" style="vertical-align:middle">< ?= @$model->status ?></td>-->
                            <td  class="align-center actionIcon" style="width: 112px;">





                                <ul>
                                    @if(permit(['booking.show']))
                                    <li>
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('booking.show',$model->id) }}" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    @endif
                                    <?php if (!$model->trip_status) { ?>
                                        @if(permit(['booking.edit']))
<!--                                        <li>
                                            <a class="btn btn-info btn-xs purple" href="{{ route('booking.edit',$model->id) }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </li>-->
                                        @endif
                                    <?php } ?>





                                </ul>





                            </td>
                        </tr>
















                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






</div>














<div class="clearfix"></div>

<!-- END DASHBOARD STATS 1-->
<div class="row">
    @include ("admin.home.graph")
</div>
<div class="clearfix"></div>













<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cab"></i>Vehicles</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Vehicles Number</th>
                            <th>Expiry Date</th>
                            <th>Remaining Days</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($getInsuranceRenewalDate as $insurance) { ?>

                            <tr>
                                <?php
                                $expirdate = $insurance->insurance_date;
                                $insurancestatus = $insurance->insurance_status;

                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($insurancestatus == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>
                                    <td>{{ $insurance->vehicles_company }}</td>
                                    <td>{{ $insurance->vehicles_model }}</td>
                                    <td>{{ $insurance->vehicles_number}}</td>
                                    <td>{{ showDate($insurance->insurance_date,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>Insurance</td>
                                    <td>                                   
                                        {!! Form::open(['method' => 'POST','route' => ['remove-insurancemsg', $insurance->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>


                            <tr>
                                <?php
                                $taxrenewalstatus = $insurance->tax_renewal_status;
                                $expirdate = $insurance->tax_renewal_date;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($taxrenewalstatus == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>
                                    <td>{{ $insurance->vehicles_company }}</td>
                                    <td>{{ $insurance->vehicles_model }}</td>
                                    <td>{{ $insurance->vehicles_number}}</td>
                                    <td>{{ showDate($insurance->tax_renewal_date,true) }}</td>
                                    <td>
                                        <!--                                    < ?= $res['days'] ?>-->
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days

                                    </td>
                                    <td>Tax</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-taxmsg', $insurance->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <?php
                                $motstatus = $insurance->mot_status;
                                $expirdate = $insurance->mot_date;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($motstatus == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>
                                    <td>{{ $insurance->vehicles_company }}</td>
                                    <td>{{ $insurance->vehicles_model }}</td>
                                    <td>{{ $insurance->vehicles_number}}</td>
                                    <td>{{ showDate($insurance->mot_date,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>Mot</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-motmsg', $insurance->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Companion Drivers Details </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Expiry Date</th>
                            <th>Remaining Days</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($driverDetails as $driver) { ?>


                            <tr>
                                <?php
                                $renewalstatus = $driver->renewal_status;
                                $expirdate = $driver->renewal_date;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($renewalstatus == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>

                                    <td>{{ @$driver->user->fullName }}</td>
                                    <td>{{ @$driver->user->phone }}</td>
                                    <td>{{ showDate($driver->renewal_date,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>License renewal</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-drivermsg', $driver->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <?php
                                $phlstatus = $driver->phl_expiry_status;
                                $expirdate = $driver->phl_expiry_date;
                                $now = \Carbon\Carbon::now();
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($phlstatus == 1 && $res['condition']) {
                                    ?>
                                    <td>{{ @$driver->user->fullName }}</td>
                                    <td>{{ @$driver->user->phone }}</td>
                                    <td>{{ showDate($driver->phl_expiry_date,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>PHL expiry date</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-driverphlmsg', $driver->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Company Details
                </div>
            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">


                    <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Company Number</th>
                            <th>Expiry Date</th>
                            <th>Remaining Days</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getcompamyexpiry as $company) {
                           // pr($company);
                            ?>

                            <tr>
                                <?php
                                $renewalstatus = $company->franchise_license_renewal_status;
                                $expirdate = $company->franchise_license_renewal_date;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($renewalstatus == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>

                                    <td>{{ $company->name}}</td>
                                    <td>{{ @$company->companyInfo->company_name}}</td>
                                    <td>{{ @$company->companyInfo->company_number}}</td>
                                    <td>{{ showDate($company->franchise_license_renewal_date,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>License renewal</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-licenserenewal', $company->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <?php
                                $liabilityinsurance = $company->employers_liability_insurance_status;
                                $expirdate = $company->employers_liability_insurance;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($liabilityinsurance == 1 && $res['condition']) { // Show if $insurancestatus is 1
                                    ?>

                                    <td>{{ $company->name}}</td>
                                    <td>{{ @$company->companyInfo->company_name}}</td>
                                    <td>{{ @$company->companyInfo->company_number}}</td>
                                    <td>{{ showDate($company->employers_liability_insurance,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>Employers Liability Insurance</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['employers-liability-insurance', $company->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php
                                $liabilityinsurance = $company->public_liability_insurance_status;
                                $expirdate = $company->public_liability_insurance;
                                $res = dateDiffCalThirtyDays($expirdate);
                                if ($liabilityinsurance == 1 && $res['condition']) {
                                    ?>

                                    <td>{{ $company->name}}</td>
                                    <td>{{ @$company->companyInfo->company_name}}</td>
                                    <td>{{ @$company->companyInfo->company_number}}</td>
                                    <td>{{ showDate($company->public_liability_insurance,true) }}</td>
                                    <td>
                                        <?php
                                        if ($now > $expirdate) {
                                            echo "-";
                                        }
                                        ?><?= $res['days'] ?> Days
                                    </td>
                                    <td>Public Liability Insurance</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route' => ['remove-public-liability-insurance', $company->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-primary btn-xs danger delete-alert']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        })
    });
</script>
@endsection

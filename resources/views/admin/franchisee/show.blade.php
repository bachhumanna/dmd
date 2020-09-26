@extends('admin.franchisee.template')
@section('title')
Franchisee
@endsection
@section('body')


<h1 class="page-title">Franchisees
    <small></small>
    @if(permit(['franchisee.create']))
    <a href="{{ route('franchisee.edit',$model->id) }}" class="btn btn-primary float-right"> Edit </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchisee Details</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th style="width: 40%">Franchisee Name </th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th>Franchise Owner Name</th>
                            <td>{{ $model->contact_person_name}}</br>{{ $model->contact_person_name_sec}}</td>

                        </tr>
                        <tr>
                            <th>Franchise Owner Personal Mobile Number</th>
                            <td><?= $model->contact_person_phone ?></br><?= $model->contact_person_phone_sec ?></td>
                        </tr>
                        <tr>
                            <th>Franchise Owner DMD Mobile Number</th>
                            <td>{{ $model->owner_dmd_mobilenumber}}</br>{{ $model->owner_dmd_mobilenumber_sec}}</td>
                        </tr>

                        <tr>
                            <th>Franchise Owner Home Number</th>
                            <td>{{ $model->owner_homenumber}}</td>
                        </tr>


                        <tr>
                            <th>Franchise Owner Email</th>
                            <td>{{ $model->contact_person_email}}</br>{{ $model->contact_person_email_sec}}</td>
                        </tr>

                        <tr>
                            <th>Franchise Owner DMD Email</th>
                            <td>{{ $model->franchise_owner_dmd_email }}</td>
                        </tr>

                        <?php /* ?>
                        <tr>
                            <th>House Number</th>
                            <td>{{ $model->locality }}</td>
                        </tr>
                        <?php */ ?>
                        <tr>
                            <th>Address</th>
                            <td>{{ $model->address}}</td>
                        </tr>
                        <tr>
                            <th>Franchise License Renewal Date</th>
                            <td>{{ showDate($model->franchise_license_renewal_date,true)}}</td>
                        </tr>
                        <tr>
                            <th>Base Location</th>
                            <td>{{ $model->base_location}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>                          
                            <td>{{ $model->status ===1 ? "Active" : "Inactive" }}</td>

                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Insurance and Licensing</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>


                        <tr>
                            <th  style="width: 40%" >Public Liability Insurance</th>
                            <td>{{ showDate($model->public_liability_insurance,true)}}</td>
                        </tr>

                        <tr>
                            <th>Employers Liability Insurance</th>
                            <td>{{ showDate($model->employers_liability_insurance,true)}}</td>
                        </tr>



                        <tr>
                            <th>Amount of cover</th>
                            <td>{{ $model->amount_cover}}</td>
                        </tr>


                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Company Details</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th  style="width: 40%">Company name</th>
                            <td>{{ $model->companyInfo->company_name }}</td>
                        </tr>

                        <tr>
                            <th>Company number</th>
                            <td>{{ $model->companyInfo->company_number }}</td>
                        </tr>

                        <tr>
                            <th>Registered address</th>
                            <td>{{ $model->companyInfo->registered_office }}</td>
                        </tr>

                        <tr>
                            <th>Date of incorporation</th>
                            <td>{{ showDate($model->companyInfo->incorporation_date,true) }}</td>
                        </tr>

                        <tr>
                            <th>Company Year End</th>
                            <td>{{ showDate($model->companyInfo->year_end,true) }}</td>
                        </tr>

                        <tr>
                            <th>Confirmation Statement date</th>
                            <td>{{ showDate($model->companyInfo->confirmation_statement_date,true) }}</td>
                        </tr>

                        <tr>
                            <th>Shareholder Name1</th>
                            <td>{{ $model->shareholders_nameone }}</td>
                        </tr>
                        <tr>
                            <th>Share Percentage1</th>
                            <td>{{ $model->share_percentageone }}</td>
                        </tr>

                        <tr>
                            <th>Shareholder Name2</th>
                            <td>{{ $model->shareholders_nametwo }}</td>
                        </tr>
                        <tr>
                            <th>Share Percentage2</th>
                            <td>{{ $model->share_percentagetwo }}</td>
                        </tr>

                        <tr>
                            <th>Shareholder Name3</th>
                            <td>{{ $model->shareholders_namethree }}</td>
                        </tr>
                        <tr>
                            <th>Share Percentage3</th>
                            <td>{{ $model->share_percentagethree }}</td>
                        </tr>

                        <tr>
                            <th>Shareholder Name4</th>
                            <td>{{ $model->shareholders_namefour }}</td>
                        </tr>
                        <tr>
                            <th>Share Percentage4</th>
                            <td>{{ $model->share_percentagefour }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchise Manager</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>


                        <tr>
                            <th  style="width: 40%">Franchise Manager Name</th>
                            <td>{{ $model->franchise_manager_name}}</td>
                        </tr>

                        <tr>
                            <th>Personal Mobile Number</th>
                            <td>{{ $model->manager_person_phone}}</td>
                        </tr>

                        <tr>
                            <th>DMD Mobile If different from Franchise Owner</th>
                            <td>{{ $model->manager_dmd_mob_frn_owner}}</td>
                        </tr>

                        <tr>
                            <th>DMD Email if different from Franchise Owner</th>
                            <td>{{ $model->manager_dmd_email_frn_owner}}</td>
                        </tr>


                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>VAT Details</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr style="background: #32c5d2;color: #fff;">
                            <th colspan="2">VAT registered</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <th  style="width: 40%">Initial VAT registered</th>
                            <td>{{ $model->vat_reg ==1 ? "Yes" : "No" }}</td>
                        </tr>

                        <tr>
                            <th>VAT number</th>
                            <td>{{ $model->vat_number }}</td>
                        </tr>

                        
                        <?php  
                          foreach ($model->vatRegdate as $key => $data) { ?>
                            <tr> 
                                <td style="width: 40%">VAT Registration Date</td>
                                <td>{{ showDate($data->vat_reg_date,true) }}</td>                                 
                                
                            </tr>
                            <tr>
                                <td style="width: 40%">VAT deregistration date</td>
                                <td>{{ showDate($data->vat_de_reg_date,true) }}</td>                                
                            </tr>
                        <?php } ?>
                        
                        
                        
                        
                       
                       


                    </tbody>
                </table>
                
                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr style="background: #32c5d2;color: #fff;">
                            <th colspan="2">Bank Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        

                       <tr>
                            <th style="width: 40%">Bank account number</th>
                            <td>{{ $model->bank_account_no }}</td>
                        </tr>

                        <tr>
                            <th>Sort Code</th>
                            <td>{{ $model->bank_sortcode }}</td>
                        </tr>

                        <tr>
                            <th>Account name</th>
                            <td>{{ $model->account_name }}</td>
                        </tr>


                    </tbody>
                </table>
                
                
                

            </div>

        </div>

    </div>
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchisee Pricing</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>



                        <tr>
                            <th  style="width: 40%">Companion Drivers cost (Per Hour)</th>

                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->driver_cost }}</td>

                        </tr>

                        <tr>
                            <th>Vehicle cost (Per Mile)</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->vehicle_cost }}</td>
                        </tr>

                        <tr>
                            <th>Paid Mileage (Per Mile)</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->paid_mileage }}</td>
                        </tr>

                        <tr>
                            <th>Base Driving Cost (Per Minute)</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->base_driving_cost }}</td>
                        </tr>
                        <tr>
                            <th>Waiting Time Cost (Per 15 Minutes)</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->waiting_time_cost }}</td>
                        </tr>
                        <tr>
                            <th>Companionship Cost (Per 15 Minutes)</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->companionship_cost }}</td>
                        </tr>
                        <tr>
                            <th>Comfort Cost</th>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->priceDetails->comfort_cost }}</td>
                        </tr>



                    </tbody>
                </table>

            </div>

        </div>

    </div>
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Compliance</div>

            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>


                        <tr>
                            <th  style="width: 40%">Franchise Agreement</th>
                            <td>
                                <img width="150px" src='{{ asset("images/franchisee/".$model->franchise_agreement) }}' alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>Amendments</th>
                            <td>
                                <img width="150px" src='{{ asset("images/franchisee/".$model->amendments) }}' alt="">
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

    </div>


</div>



@endsection

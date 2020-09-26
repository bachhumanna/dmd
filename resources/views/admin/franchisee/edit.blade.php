@extends('admin.home.template')
@section('title')
Franchisee | Edit
@endsection
@section('body')
<h1 class="page-title">Franchisees
    <small></small>
</h1>


@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisee.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Update Franchisee</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Name</td>
                                            <td colspan="2">
                                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Franchise Owner Name</td>
                                            <td>
                                                {!! Form::text('contact_person_name', null, array('placeholder' => 'Franchise Owner Name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_name'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('contact_person_name_sec', null, array('placeholder' => 'Franchise Owner Name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_name_sec'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Franchise Owner Personal Mobile Number</td>
                                            <td>
                                                {!! Form::text('contact_person_phone', null, array('placeholder'=>'Franchise Owner Personal Mobile Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_phone'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('contact_person_phone_sec', null, array('placeholder'=>'Franchise Owner Personal Mobile Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_phone_sec'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Franchise Owner DMD Mobile Number</td>
                                            <td>
                                                {!! Form::text('owner_dmd_mobilenumber', null, array('placeholder'=>'Franchise Owner DMD Mobile Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('owner_dmd_mobilenumber'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('owner_dmd_mobilenumber_sec', null, array('placeholder'=>'Franchise Owner DMD Mobile Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('owner_dmd_mobilenumber_sec'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Franchise Owner Home Number</td>
                                            <td colspan="2">
                                                {!! Form::text('owner_homenumber', null, array('placeholder'=>'Franchise Owner Home Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('owner_homenumber'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Franchise Owner Email</td>
                                            <td>
                                                {!! Form::text('contact_person_email', null, array('placeholder'=>'Franchise Owner Email','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_email'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('contact_person_email_sec', null, array('placeholder'=>'Franchise Owner Email','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('contact_person_email_sec'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Franchise Owner DMD Email</td>
                                            <td colspan="2">
                                                {!! Form::text('franchise_owner_dmd_email', null, array('placeholder'=>'Franchise Owner DMD Email','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('franchise_owner_dmd_email'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">House Number</td>
                                            <td colspan="2">
                                                {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                                                <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Address</td>
                                            <td colspan="2">
                                               {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                                                <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Franchise License Renewal Date</td>
                                            <td colspan="2">
                                               {!! Form::text('franchise_license_renewal_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Franchise License Renewal Date','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('franchise_license_renewal_date'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Base Location</td>
                                            <td colspan="2">
                                              {!! Form::text('base_location', null, array('placeholder' => 'Franchise base location','class' => 'form-control', 'id' => 'base_location')) !!}
                                            <span class="bg-danger"><?= $errors->first('base_location'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Status</td>
                                            <td colspan="2">
                                             {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                                            <span class="error"><?= $errors->first('status'); ?></span>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>


                            </div>




                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Insurance and Licensing</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Public Liability Insurance</td>
                                            <td>
                                                {!! Form::text('public_liability_insurance', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Public Liability Insurance','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('public_liability_insurance'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Employers Liability Insurance</td>
                                            <td >
                                               {!! Form::text('employers_liability_insurance', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Employers Liability Insurance','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('employers_liability_insurance'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Amount of cover</td>
                                            <td>
                                                {!! Form::text('amount_cover', null, array('placeholder' => 'Amount of cover','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('amount_cover'); ?></span>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>







                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Company  Details</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Company name</td>
                                            <td colspan="2">
                                                {!! Form::text('company_name', $model->companyInfo->company_name , array('placeholder' => 'Company name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Company number</td>
                                            <td colspan="2">
                                                {!! Form::text('company_number', $model->companyInfo->company_number, array('placeholder'=>'Company number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_number'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Registered address</td>
                                            <td colspan="2">
                                                {!! Form::text('registered_office', $model->companyInfo->registered_office, array('placeholder' => 'Registered address','class' => 'form-control', 'id'=>"registered_address")) !!}
                                                <span class="bg-danger"><?= $errors->first('registered_office'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Date of incorporation</td>
                                            <td colspan="2">
                                                {!! Form::text('incorporation_date',  $model->companyInfo->incorporation_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date of incorporation','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('incorporation_date'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Company Year End</td>
                                            <td colspan="2">
                                                {!! Form::text('year_end', $model->companyInfo->year_end, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Company Year End','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('year_end'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Confirmation Statement date</td>
                                            <td colspan="2">
                                                {!! Form::text('confirmation_statement_date', $model->companyInfo->confirmation_statement_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Confirmation Statement date','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('confirmation_statement_date'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Shareholder Name1</td>
                                            <td>
                                                {!! Form::text('shareholders_nameone', null, array('placeholder' => 'Shareholder Name1','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('shareholders_nameone'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('share_percentageone', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('share_percentageone'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Shareholder Name2</td>
                                            <td>
                                                {!! Form::text('shareholders_nametwo', null, array('placeholder' => 'Shareholder Name2','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('shareholders_nametwo'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('share_percentagetwo', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('share_percentagetwo'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Shareholder Name3</td>
                                            <td>
                                                {!! Form::text('shareholders_namethree', null, array('placeholder' => 'Shareholder Name2','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('shareholders_namethree'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('share_percentagethree', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('share_percentagethree'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Shareholder Name4</td>
                                            <td>
                                                {!! Form::text('shareholders_namefour', null, array('placeholder' => 'Shareholder Name4','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('shareholders_namefour'); ?></span>
                                            </td>
                                            <td>
                                                {!! Form::text('share_percentagefour', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('share_percentagefour'); ?></span>
                                            </td>
                                        </tr>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Franchise Manager</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Franchise Manager Name</td>
                                            <td>
                                                {!! Form::text('franchise_manager_name', null, array('placeholder' => 'Franchise Manager Name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('franchise_manager_name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Personal Mobile Number</td>
                                            <td>
                                               {!! Form::text('manager_person_phone', null, array('placeholder'=>'Personal Mobile Number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('manager_person_phone'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">DMD Mobile If different from Franchise Owner</td>
                                            <td>
                                                {!! Form::text('manager_dmd_mob_frn_owner', null, array('placeholder' => 'DMD Mobile If different from Franchise Owner','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('manager_dmd_mob_frn_owner'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">DMD Email if different from Franchise Owner</td>
                                            <td>
                                                {!! Form::text('manager_dmd_email_frn_owner', null, array('placeholder'=>'DMD Email if different from Franchise Owner','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('manager_dmd_email_frn_owner'); ?></span>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>VAT Details</div>
                            </div>


                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="2">Main Bank Account  (To be used on invoices)</th>
                                        </tr>

                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Bank account number</td>
                                            <td>
                                                {!! Form::text('bank_account_no', null, array('placeholder' => 'Bank account number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('bank_account_no'); ?></span>

                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Sort Code</td>
                                            <td>
                                                {!! Form::text('bank_sortcode', null, array('placeholder' => 'Sort Code','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('bank_sortcode'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Account name</td>
                                            <td>
                                                {!! Form::text('account_name', null, array('placeholder' => 'Account name','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('account_name'); ?></span>

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="5">VAT Registration</th>
                                        </tr>
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Initial VAT Registered</td>
                                            <td colspan="4">
                                                {!! Form::select('vat_reg',[1=>'Yes',0=>"No"], $model->companyInfo->vat_reg ,array('class' => 'form-control vat_reg','onchange'=>'vatDetails()')) !!}
                                                <span class="error"><?= $errors->first('vat_reg'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">VAT number</td>
                                            <td colspan="4">
                                               {!! Form::text('vat_number', $model->companyInfo->vat_number, array('placeholder' => 'VAT number','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_number'); ?></span>
                                            </td>
                                        </tr>


                                        <?php if (count($model->vatRegdate)) { ?>
                                            <?php
                                            foreach ($model->vatRegdate as $key => $data) {
                                                $count = $key + 1;
                                                ?>
                                                <tr class="vat_details">
                                                    <td>VAT Registration Date</td>
                                                    <td>
                                                        {!! Form::text('vat_reg_date[]',$data->vat_de_reg_date ,array('class' => 'form-control  date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                        <span class="bg-danger"><?= $errors->first('vat_registration_date'); ?></span>

                                                    </td>

                                                    <td style="width: 20%">VAT De-registration Date</td>
                                                    <td>
                                                        {!! Form::text('vat_de_reg_date[]',$data->vat_de_reg_date ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                        <span class="bg-danger"><?= $errors->first('vat_dereg_date'); ?></span>

                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        <td>
                                            <div class="col-md-1">
                                                <button class="btn green submit new-row" type="button">+</button>
                                            </div>
                                        </td>


                                    <?php } else { ?>
                                        <tr class="vat_details">
                                            <td>VAT Registration Date</td>
                                            <td>
                                                {!! Form::text('vat_reg_date[]',null ,array('class' => 'form-control  date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_registration_date'); ?></span>

                                            </td>
                                            <td>VAT De-registration Date</td>
                                            <td>
                                                {!! Form::text('vat_de_reg_date[]',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_dereg_date'); ?></span>
                                            </td>
                                            <td>
                                                <div class="col-md-1">
                                                    <button class="btn green submit new-row" type="button">+</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                        <?php /*?>
                                        <tr>
                                            <td style="width: 40%">VAT registration date</td>
                                            <td>
                                                {!! Form::text('vat_reg_date[]',null ,array('class' => 'form-control  date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_registration_date'); ?></span>
                                            </td>

                                            <td style="width: 20%">VAT deregistration date</td>
                                            <td>
                                                {!! Form::text('vat_de_reg_date[]',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_dereg_date'); ?></span>
                                            </td>

                                            <td>
                                                <div class="col-md-1">
                                                    <button class="btn green submit new-row" type="button">+</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php */?>
                                        <?php /*?>
                                        <tr>
                                            <td style="width: 40%">VAT deregistration date</td>
                                            <td>
                                                {!! Form::text('vat_de_reg_date', $model->vatRegdate->vat_de_reg_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'VAT deregistration date','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_de_reg_date'); ?></span>
                                            </td>
                                        </tr>
                                        <?php */?>



                                        <tr>
                                            <td rowspan="2" colspan="5" style="padding-left: 0; padding-right: 0;">
                                                <table>
                                                    <tbody id="vatregdate">

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Franchisee Pricing</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Companion Drivers cost (Per Hour)</td>
                                            <td>
                                                {!! Form::text('driver_cost', $model->priceDetails->driver_cost, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Vehicle cost (Per Mile)</td>
                                            <td>
                                               {!! Form::text('vehicle_cost', $model->priceDetails->vehicle_cost, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Paid Mileage (Per Mile)</td>
                                            <td>
                                               {!! Form::text('paid_mileage',$model->priceDetails->paid_mileage, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Base Driving Cost (Per Minute)</td>
                                            <td>
                                                {!! Form::text('base_driving_cost',$model->priceDetails->base_driving_cost, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Waiting Time Cost (Per 15 Minutes)</td>
                                            <td>
                                                {!! Form::text('waiting_time_cost',$model->priceDetails->waiting_time_cost, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Companionship Cost (Per 15 Minutes)</td>
                                            <td>
                                                {!! Form::text('companionship_cost',$model->priceDetails->companionship_cost, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Comfort Cost</td>
                                            <td>
                                                {!! Form::text('comfort_cost',$model->priceDetails->comfort_cost, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Compliance</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Franchise Agreement</td>
                                            <td>
                                                {!! Form::file('franchise_agreement',array('id' => 'franchise-agreementimg','placeholder' => 'Image','class' => 'form-control')) !!}
                                                <span>Upload a file</span>
                                                <span class="bg-danger"><?= $errors->first('franchise_agreement'); ?></span>
                                            </td>
                                            <td>
                                                <img src='{{ asset("images/franchisee/".$model->franchise_agreement) }}' id="agreementimg-img-tag" class="reg_img" width="200px" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Amendments</td>
                                            <td>
                                               {!! Form::file('amendments',array('id' => 'amendments-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                                <span>Upload a file</span>
                                                <span class="bg-danger"><?= $errors->first('amendments'); ?></span>
                                            </td>
                                            <td>
                                                <img src='{{ asset("images/franchisee/".$model->amendments) }}' id="amendments-img-tag" class="reg_img" width="200px" />
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Working Area</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Ward</td>
                                            <td>
                                                {!! Form::select('franchise_ward[]', $town, [] ,array('multiple'=>'multiple','placeholder' => 'Working Area','class' => 'form-control franchise_ward')) !!}
                                                <span class="bg-danger"><?= $errors->first('franchise_ward'); ?></span>
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('franchisee.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
















<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

<script>
    $(document).on('click', '.new-row', function () {
    $('<tr class="loopTableArea"><td>VAT Registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_reg_date[]"></td> <td>VAT De-registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_de_reg_date[]"></td></tr>').appendTo('#vatregdate').hide().fadeIn(280);
    $('.date-picker').datepicker({
    autoclose: true,
            dateFormat: 'YY-mm-dd'
    });
    });
</script>

<script>
    function vatDetails(){
    vat_reg = $(".vat_reg").val();
    $(".vat_details").show();
    if (vat_reg == 0){
    //$(".vat_details input").val("")
    $(".vat_details").hide();
    }
    }

    $(document).ready(function(){
    vatDetails();
    })
</script>

<script>
    $('.date-picker').datepicker({
        autoclose: true
    });


    function AgreementImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#agreementimg-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#agreementimg-img-tag").siblings('.hideImage').show();
        }
    }
    $("#franchise-agreementimg").change(function () {
            AgreementImage(this);
    });

function AmendmentsImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#amendments-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#amendments-img-tag").siblings('.hideImage').show();
        }
    }
    $("#amendments-img").change(function () {
            AmendmentsImage(this);
    });



</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
<script>
     google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        new google.maps.places.Autocomplete(document.getElementById('address'), options);
        new google.maps.places.Autocomplete(document.getElementById('registered_address'), options);
        new google.maps.places.Autocomplete(document.getElementById('base_location'), options);

    });
</script>
<style>
    .loopTableArea{
        border-bottom: 1px solid #e7ecf1;
    }
    .loopTableArea td{
        padding: 10px 5px;
    }

</style>
@endsection

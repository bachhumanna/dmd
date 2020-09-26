@extends('admin.home.template')
@section('title')
Franchisee | Edit
@endsection
@section('body')
<h1 class="page-title">Franchisees
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Franchisee
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisee.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner Name</label>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_name', null, array('placeholder' => 'Franchise Owner Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_name'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_name_sec', null, array('placeholder' => 'Franchise Owner Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_name_sec'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner Personal Mobile Number</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_phone', null, array('placeholder'=>'Franchise Owner Personal Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_phone'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_phone_sec', null, array('placeholder'=>'Franchise Owner Personal Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_phone_sec'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner DMD Mobile Number</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('owner_dmd_mobilenumber', null, array('placeholder'=>'Franchise Owner DMD Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('owner_dmd_mobilenumber'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('owner_dmd_mobilenumber_sec', null, array('placeholder'=>'Franchise Owner DMD Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('owner_dmd_mobilenumber_sec'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner Home Number</label>
                        <div class="col-md-9">
                            {!! Form::text('owner_homenumber', null, array('placeholder'=>'Franchise Owner Home Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('owner_homenumber'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner Email</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_email', null, array('placeholder'=>'Franchise Owner Email','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_email'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('contact_person_email_sec', null, array('placeholder'=>'Franchise Owner Email','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('contact_person_email_sec'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Owner DMD Email</label>
                        <div class="col-md-9">
                            {!! Form::text('franchise_owner_dmd_email', null, array('placeholder'=>'Franchise Owner DMD Email','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('franchise_owner_dmd_email'); ?></span>
                        </div>
                    </div>

                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">
                            {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">
                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">
                            {!! Form::select('country',getCountry(false), null ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'postcode','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>

                    <fieldset class="address">
                    <div class="form-group">
                        <label class="col-md-3 control-label">House Number</label>
                        <div class="col-md-9">

                            {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>

<!--                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('street'); ?></span>-->
                        </div>
                    </div>



                    <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-9">

                            {!! Form::text('town', null, array('placeholder' => 'City','class' => 'form-control','id' => 'City','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-9">

                            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','id' => 'Country','autocomplete'=>"country" )) !!}
                            <span class="bg-danger"><?= $errors->first('country'); ?></span>


<!--                            {!! Form::select('country',getCountry(false), 'United Kingdom' ,array('placeholder' => 'Please Select','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('country'); ?></span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            {!! Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control places-autocomplete','id' => 'PostalCode','autocomplete'=>"postal-code")) !!}
                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>
                    <?php */?>
                    </fieldset>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise License Renewal Date</label>
                        <div class="col-md-9">
                            {!! Form::text('franchise_license_renewal_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Franchise License Renewal Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger"><?= $errors->first('franchise_license_renewal_date'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Base Location</label>
                        <div class="col-md-9">
                            {!! Form::text('base_location', null, array('placeholder' => 'Franchise base location','class' => 'form-control', 'id' => 'base_location')) !!}
                            <span class="bg-danger"><?= $errors->first('base_location'); ?></span>
                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="col-md-3 control-label">Company Year End</label>
                        <div class="col-md-9">
                            {!! Form::text('company_year_end', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Company Year End','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger">< ?= $errors->first('company_year_end'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirmation Statement Date</label>
                        <div class="col-md-9">
                            {!! Form::text('confirmation_statement_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Confirmation Statement Date','class' => 'form-control date-picker')) !!}
                            <span class="bg-danger">< ?= $errors->first('confirmation_statement_date'); ?></span>
                        </div>
                    </div>-->

                    <!-- ---------assumptions insert start------------>


                    <!-- ---------assumptions insert end------------>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Insurance and Licensing</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Public Liability Insurance</label>
                                <div class="col-md-9">
                                    {!! Form::text('public_liability_insurance', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Public Liability Insurance','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('public_liability_insurance'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Employers Liability Insurance</label>
                                <div class="col-md-9">
                                    {!! Form::text('employers_liability_insurance', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Employers Liability Insurance','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('employers_liability_insurance'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Amount of cover</label>
                                <div class="col-md-9">
                                    {!! Form::text('amount_cover', null, array('placeholder' => 'Amount of cover','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('amount_cover'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Company  Details</legend>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Company name</label>
                                <div class="col-md-9">
                                    {!! Form::text('company_name', $model->companyInfo->company_name , array('placeholder' => 'Company name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('company_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company number</label>
                                <div class="col-md-9">
                                    {!! Form::text('company_number', $model->companyInfo->company_number, array('placeholder'=>'Company number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('company_number'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Registered address</label>
                                <div class="col-md-9">
                                    {!! Form::text('registered_office', $model->companyInfo->registered_office, array('placeholder' => 'Registered address','class' => 'form-control', 'id'=>"registered_address")) !!}
                                    <span class="bg-danger"><?= $errors->first('registered_office'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date of incorporation</label>
                                <div class="col-md-9">
                                    {!! Form::text('incorporation_date',  $model->companyInfo->incorporation_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date of incorporation','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('incorporation_date'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Company Year End</label>
                                <div class="col-md-9">
                                    {!! Form::text('year_end', $model->companyInfo->year_end, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Company Year End','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('year_end'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirmation Statement date</label>
                                <div class="col-md-9">
                                    {!! Form::text('confirmation_statement_date', $model->companyInfo->confirmation_statement_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Confirmation Statement date','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('confirmation_statement_date'); ?></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Shareholder Name1</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('shareholders_nameone', null, array('placeholder' => 'Shareholder Name1','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('shareholders_nameone'); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::text('share_percentageone', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('share_percentageone'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Shareholder Name2</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('shareholders_nametwo', null, array('placeholder' => 'Shareholder Name2','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('shareholders_nametwo'); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::text('share_percentagetwo', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('share_percentagetwo'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Shareholder Name3</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('shareholders_namethree', null, array('placeholder' => 'Shareholder Name2','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('shareholders_namethree'); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::text('share_percentagethree', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('share_percentagethree'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Shareholder Name4</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('shareholders_namefour', null, array('placeholder' => 'Shareholder Name4','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('shareholders_namefour'); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::text('share_percentagefour', null, array('placeholder' => 'Share Percentage','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('share_percentagefour'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                    </div>



                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Franchise Manager</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Franchise Manager Name</label>
                                <div class="col-md-9">
                                    {!! Form::text('franchise_manager_name', null, array('placeholder' => 'Franchise Manager Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('franchise_manager_name'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Personal Mobile Number</label>
                                <div class="col-md-9">
                                    {!! Form::text('manager_person_phone', null, array('placeholder'=>'Personal Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('manager_person_phone'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">DMD Mobile If different from Franchise Owner</label>
                                <div class="col-md-9">
                                    {!! Form::text('manager_dmd_mob_frn_owner', null, array('placeholder' => 'DMD Mobile If different from Franchise Owner','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('manager_dmd_mob_frn_owner'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">DMD Email if different from Franchise Owner</label>
                                <div class="col-md-9">
                                    {!! Form::text('manager_dmd_email_frn_owner', null, array('placeholder'=>'DMD Email if different from Franchise Owner','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('manager_dmd_email_frn_owner'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>



                    <?php /* ?>
                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Franchise Administrator Name</legend>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Franchise Administrator Name</label>
                                <div class="col-md-9">
                                    {!! Form::text('franchise_administrator_name', null, array('placeholder' => 'Franchise Administrator Name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('franchise_administrator_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Personal Mobile Number</label>
                                <div class="col-md-9">
                                    {!! Form::text('administrator_person_phone', null, array('placeholder'=>'Personal Mobile Number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('administrator_person_phone'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">DMD Mobile If different from Franchise Owner</label>
                                <div class="col-md-9">
                                    {!! Form::text('manager_dmd_mob_frn_owner', null, array('placeholder' => 'DMD Mobile If different from Franchise Owner','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('administrator_dmd_mob_frn_owner'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">DMD Email if different from Franchise Owner</label>
                                <div class="col-md-9">
                                    {!! Form::text('manager_dmd_email_frn_owner', null, array('placeholder'=>'DMD Email if different from Franchise Owner','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('administrator_dmd_email_frn_owner'); ?></span>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <?php */ ?>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">VAT Details</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Initial VAT Registered</label>
                                <div class="col-md-9">
                                    {!! Form::select('vat_reg',[1=>'Yes',0=>"No"], $model->companyInfo->vat_reg ,array('class' => 'form-control')) !!}
<!--                                    <label>
                                        {{ Form::radio('vat_reg', 1,null,array('class' => 'iradio_square-blue')) }} Yes
                                    </label>
                                    <label>
                                        {{ Form::radio('vat_reg', 0,null,array('class' => 'iradio_square-blue')) }} No
                                    </label>-->

                                    <span class="error"><?= $errors->first('vat_reg'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">VAT number</label>
                                <div class="col-md-9">
                                    {!! Form::text('vat_number', $model->companyInfo->vat_number, array('placeholder' => 'VAT number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_number'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">VAT registration date</label>
                                <div class="col-md-9">
                                    {!! Form::text('vat_registration_date', $model->companyInfo->vat_registration_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder'=>'VAT registration date','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_registration_date'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">VAT deregistration date</label>
                                <div class="col-md-9">
                                    {!! Form::text('vat_dereg_date', $model->companyInfo->vat_dereg_date, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'VAT deregistration date','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_dereg_date'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank account number</label>
                                <div class="col-md-9">
                                    {!! Form::text('bank_account_no', null, array('placeholder' => 'Bank account number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('bank_account_no'); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sort Code</label>
                                <div class="col-md-9">
                                    {!! Form::text('bank_sortcode', null, array('placeholder' => 'Sort Code','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('bank_sortcode'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Account name</label>
                                <div class="col-md-9">
                                    {!! Form::text('account_name', null, array('placeholder' => 'Account name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('account_name'); ?></span>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Franchisee Pricing</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Companion Drivers cost (Per Hour)</label>
                                <div class="col-md-9">
                                    {!! Form::text('driver_cost', $model->priceDetails->driver_cost, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Vehicle cost (Per Mile)</label>
                                <div class="col-md-9">
                                    {!! Form::text('vehicle_cost', $model->priceDetails->vehicle_cost, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Paid Mileage (Per Mile)</label>
                                <div class="col-md-9">
                                    {!! Form::text('paid_mileage',$model->priceDetails->paid_mileage, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Base Driving Cost (Per Minute)</label>
                                <div class="col-md-9">
                                    {!! Form::text('base_driving_cost',$model->priceDetails->base_driving_cost, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Waiting Time Cost (Per 15 Minutes)</label>
                                <div class="col-md-9">
                                    {!! Form::text('waiting_time_cost',$model->priceDetails->waiting_time_cost, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Companionship Cost (Per 15 Minutes)</label>
                                <div class="col-md-9">
                                    {!! Form::text('companionship_cost',$model->priceDetails->companionship_cost, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Comfort Cost</label>
                                <div class="col-md-9">
                                    {!! Form::text('comfort_cost',$model->priceDetails->comfort_cost, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Compliance</legend>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Franchise Agreement</label>
                                <div class="col-md-6">
                                    {!! Form::file('franchise_agreement',array('id' => 'franchise-agreementimg','placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span>Upload a file</span>
                                    <span class="bg-danger"><?= $errors->first('franchise_agreement'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    <div class="img-preview">
        <!--                                <a class="closeBtn hideImage" >x</a>-->
                                        <img src='{{ asset("images/franchisee/".$model->franchise_agreement) }}' id="agreementimg-img-tag" class="reg_img" width="200px" />
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Amendments</label>
                                <div class="col-md-6">
                                    {!! Form::file('amendments',array('id' => 'amendments-img','placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span>Upload a file</span>
                                    <span class="bg-danger"><?= $errors->first('amendments'); ?></span>
                                </div>
                                <div class="col-md-3">
                                    <div class="img-preview">
        <!--                                <a class="closeBtn hideImage" >x</a>-->
                                        <img src='{{ asset("images/franchisee/".$model->amendments) }}' id="amendments-img-tag" class="reg_img" width="200px" />
                                    </div>
                                </div>
                            </div>




                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Working Area</legend>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Ward</label>
                                <div class="col-md-9">
                                    {!! Form::select('franchise_ward[]', $town, [] ,array('multiple'=>'multiple','placeholder' => 'Working Area','class' => 'form-control franchise_ward')) !!}
                                    <span class="bg-danger"><?= $errors->first('franchise_ward'); ?></span>
                                </div>
                            </div>


                        </fieldset>
                    </div>





                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />

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

@endsection

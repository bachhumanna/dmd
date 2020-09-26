@extends('admin.home.template')
@section('title')
Franchisee | Add
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
                    <i class="fa fa-gift"></i> Create
                </div>
            </div>

            <div class="portlet-body form">
                {!! Form::open(array('route' => 'franchisee.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Franchise Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Franchise Name','class' => 'form-control')) !!}
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
                        <label class="col-md-3 control-label">Full Address</label>
                        <div class="col-md-9">
                            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control places-autocomplete','id' => 'address','autocomplete'=>"off" )) !!}
                            <span class="bg-danger validation_error error_street"><?= $errors->first('address'); ?></span>

<!--                            {!! Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')) !!}
                            <span class="bg-danger">< ?= $errors->first('street'); ?></span>-->
                        </div>
                    </div>

                   <?php /* ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Further Details</label>
                        <div class="col-md-9">

                            {!! Form::text('locality', null, array('placeholder' => 'House Number','class' => 'form-control','id' => 'Street2','autocomplete'=>"address-line2" )) !!}
                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <?php */ ?>


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

                    <?php */ ?>
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
                            {!! Form::text('base_location', null, array('placeholder' => 'Franchise base location','class' => 'form-control','id'=>'base_location')) !!}
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
                                    {!! Form::text('company_name', null, array('placeholder' => 'Company name','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('company_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company number</label>
                                <div class="col-md-9">
                                    {!! Form::text('company_number', null, array('placeholder'=>'Company number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('company_number'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Registered address</label>
                                <div class="col-md-9">
                                    {!! Form::text('registered_office', null, array('placeholder' => 'Registered address','class' => 'form-control','id'=>'registered_address')) !!}
                                    <span class="bg-danger"><?= $errors->first('registered_office'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date of incorporation</label>
                                <div class="col-md-9">
                                    {!! Form::text('incorporation_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date of incorporation','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('incorporation_date'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Company Year End</label>
                                <div class="col-md-9">
                                    {!! Form::text('year_end', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Company Year End','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('year_end'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirmation Statement date</label>
                                <div class="col-md-9">
                                    {!! Form::text('confirmation_statement_date', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Confirmation Statement date','class' => 'form-control date-picker')) !!}
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
                                <label class="col-md-3 control-label">Initial VAT registered</label>
                                <div class="col-md-9">
                                    {!! Form::select('vat_reg',[1=>'Yes',0=>"No"], null ,array('class' => 'form-control vat_reg','onchange'=>'vatDetails()')) !!}
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
                                    {!! Form::text('vat_number', null, array('placeholder' => 'VAT number','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_number'); ?></span>
                                </div>
                            </div>
                            <div class="form-group vat_details">
                                <label class="col-md-3 control-label">VAT registration date</label>
                                <div class="col-md-3">
                                    {!! Form::text('vat_reg_date[]', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder'=>'VAT registration date','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_reg_date'); ?></span>
                                </div>

                                <label class="col-md-2 control-label">VAT deregistration date</label>
                                <div class="col-md-3">
                                    {!! Form::text('vat_de_reg_date[]', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'VAT deregistration date','class' => 'form-control date-picker')) !!}
                                    <span class="bg-danger"><?= $errors->first('vat_de_reg_date'); ?></span>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn green submit new-row" type="button">+</button>
                                </div>
                            </div>



                                <div id="vatregdate">
                                </div>



                        </fieldset>
                    </div>


                    <div class="form-group">
                        <fieldset class="scheduler-border col-md-9 col-md-offset-3">
                            <legend class="scheduler-border label label-sm label-success">Bank Details</legend>

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
                            <legend class="scheduler-border label label-sm label-success">Pricing</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Companion Drivers cost (Per Hour)</label>
                                <div class="col-md-9">
                                    {!! Form::text('driver_cost', 13, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Vehicle cost (Per Mile)</label>
                                <div class="col-md-9">
                                    {!! Form::text('vehicle_cost', 0.4, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Paid Mileage (Per Mile)</label>
                                <div class="col-md-9">
                                    {!! Form::text('paid_mileage',0.5, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Base Driving Cost (Per Minute)</label>
                                <div class="col-md-9">
                                    {!! Form::text('base_driving_cost',1, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Waiting Time Cost (Per 15 Minutes)</label>
                                <div class="col-md-9">
                                    {!! Form::text('waiting_time_cost',5, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Companionship Cost (Per 15 Minutes)</label>
                                <div class="col-md-9">
                                    {!! Form::text('companionship_cost',5, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Comfort Cost</label>
                                <div class="col-md-9">
                                    {!! Form::text('comfort_cost',10, array('placeholder' => 'Comfort Cost','class' => 'form-control')) !!}
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
                                <div class="col-md-9">
                                    {!! Form::file('franchise_agreement', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('franchise_agreement'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Amendments</label>
                                <div class="col-md-9">
                                    {!! Form::file('amendments', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('amendments'); ?></span>
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
    $('<div class="form-group"><label class="col-md-3 control-label">VAT registration date</label><div class="col-md-3"><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_reg_date[]"></div> <label class="col-md-3 control-label">VAT deregistration date</label><div class="col-md-3"><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_de_reg_date[]"></div></div>').appendTo('#vatregdate').hide().fadeIn(280);
    $('.date-picker').datepicker({
    autoclose: true,
            dateFormat: 'YY-mm-dd'
    });
    });
</script>

<script>
    $('.date-picker').datepicker({
        autoclose: true
                // dateFormat: 'YY-mm-dd'
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//            autoclose: true
//    });

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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
<script>
     google.maps.event.addDomListener(window, 'load', function () {
        var options = {
          //  componentRestrictions: {country: "{{ env('COUNTRY') }}"}
        };
        dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
        new google.maps.places.Autocomplete(document.getElementById('registered_address'), options);
        new google.maps.places.Autocomplete(document.getElementById('base_location'), options);

    });
</script>



<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA2b9fkTRYF9IYrjTXch1Ab-GaP1XAwDyw"></script>
<script>
var AutocompleteAddress = AutocompleteAddress || {

};

AutocompleteAddress.Utilities = (function () {
    var _getUserLocation = function (successCallback, failureCallback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                successCallback(position);
            }, function () {
                failureCallback(true);
            });
         } else {
             failureCallback(false);
         }
    };

    return {
        GetUserLocation: _getUserLocation
    }
})();

AutocompleteAddress.Application = (function () {
    var _geocoder;

    var _init = function () {
        _geocoder = new google.maps.Geocoder;

        AutocompleteAddress.Utilities.GetUserLocation(function (position) {
            var latLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            _autofillFromUserLocation(latLng);
            _initAutocompletes(latLng);
        }, function (browserHasGeolocation) {
            _initAutocompletes();
        });
    };

    var _initAutocompletes = function (latLng) {
        $('.places-autocomplete').each(function () {
            var input = this;
            var isPostalCode = $(input).is('[id$=PostalCode]');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: [isPostalCode ? '(regions)' : 'address']
            });
            if (latLng) {
                _setBoundsFromLatLng(autocomplete, latLng);
            }

            autocomplete.addListener('place_changed', function () {
                _placeChanged(autocomplete, input);
            });

            $(input).on('keydown', function (e) {
                if (e.keyCode === 13 && $('.pac-container:visible').length > 0) {
                    e.preventDefault();
                }
            });
        });
    }

    var _autofillFromUserLocation = function (latLng) {
        _reverseGeocode(latLng, function (result) {
            $('.address').each(function (i, fieldset) {
                _updateAddress({
                    fieldset: fieldset,
                    address_components: result.address_components
                });
            });
        });
    };

    var _reverseGeocode = function (latLng, successCallback, failureCallback) {
        _geocoder.geocode({ 'location': latLng }, function(results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    successCallback(results[1]);
                } else {
                    if (failureCallback)
                        failureCallback(status);
                }
            } else {
                if (failureCallback)
                    failureCallback(status);
            }
        });
    }

    var _setBoundsFromLatLng = function (autocomplete, latLng) {
        var circle = new google.maps.Circle({
            radius: 40233785441.622222, // 25 mi radius
            center: latLng
        });
        autocomplete.setBounds(circle.getBounds());
    }

    var _placeChanged = function (autocomplete, input) {
        var place = autocomplete.getPlace();
        _updateAddress({
            input: input,
            address_components: place.address_components
        });
    }

    var _updateAddress = function (args) {
        var $fieldset;
        var isPostalCode = false;
        if (args.input) {
            $fieldset = $(args.input).closest('fieldset');
            isPostalCode = $(args.input).is('[id$=PostalCode]');
            console.log(isPostalCode);
        } else {
            $fieldset = $(args.fieldset);
        }

        var $street = $fieldset.find('[id$=Street]');
       // var $street2 = $fieldset.find('[id$=Street2]');
        var $postalCode = $fieldset.find('[id$=PostalCode]');
        var $city = $fieldset.find('[id$=City]');
        var $country = $fieldset.find('[id$=Country]');
        var $state = $fieldset.find('[id$=State]');

        if (!isPostalCode) {
            $street.val('');
           // $street2.val('');
        }
        $postalCode.val('');
        $city.val('');
        $country.val('');
        $state.val('');

        var streetNumber = '';
        var route = '';

        for (var i = 0; i < args.address_components.length; i++) {
            var component = args.address_components[i];
            var addressType = component.types[0];

            switch (addressType) {
                case 'street_number':
                    streetNumber = component.long_name;
                    break;
                case 'route':
                    route = component.short_name;
                    break;
                case 'locality':
                    $city.val(component.long_name);
                    break;
                case 'administrative_area_level_1':
                    $state.val(component.long_name);
                    break;
                case 'postal_code':
                    $postalCode.val(component.long_name);
                    break;
                case 'country':
                    $country.val(component.long_name);
                    break;
            }
        }

        if (route) {
            $street.val(streetNumber && route
                        ? streetNumber + ' ' + route
                        : route);
        }
    }

    return {
        Init: _init
    }
})();

AutocompleteAddress.Application.Init();

</script> -->

@endsection

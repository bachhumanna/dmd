@extends('admin.home.template')
@section('body')
<h1 class="page-title">Company Information
    <small></small>
</h1>
<?php //pr($model);exit; ?>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'POST','files' => true , 'route' => ['companyinfo-edit'], 'class'=>'form-horizontal']) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Corporate Details</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Company Name</td>
                                            <td>
                                                {!! Form::text('company_name',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Trading Name</td>
                                            <td>
                                                {!! Form::text('trading_name',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('trading_name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Company Number</td>
                                            <td>
                                                {!! Form::text('company_number',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_number'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Registered Office</td>
                                            <td>
                                                {!! Form::text('registered_office',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('registered_office'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Date of Incorporation</td>
                                            <td>
                                                {!! Form::text('incorporation_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd" )) !!}
                                                <span class="bg-danger"><?= $errors->first('incorporation_date'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Year End</td>
                                            <td>
                                                {!! Form::text('year_end',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('year_end'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Conf. Stat.</td>
                                            <td>
                                                {!! Form::text('confirmation_statement_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('confirmation_statement_date'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Accounts filing</td>
                                            <td>
                                                {!! Form::text('account_filling_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('account_filling_date'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">HMRC Filing</td>
                                            <td>
                                                {!! Form::text('hmrc_filling_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('hmrc_filling_date'); ?></span>
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
                                <div class="caption"><i class="fa fa-cogs"></i>Contact Details</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">

                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Business Address</td>
                                            <td>
                                                {!! Form::text('business_address',null ,array('class' => 'form-control','id'=>'address')) !!}
                                                <span class="bg-danger"><?= $errors->first('business_address'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Main Phone number	</td>
                                            <td>
                                                {!! Form::text('phone_number',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('phone_number'); ?></span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Main email address	</td>
                                            <td>

                                                {!! Form::text('company_email',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_email'); ?></span>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Directors</div>
                            </div>

                            <div class="portlet-body flip-scroll directorBlock">
                                <table class="table table-bordered table-striped table-condensed flip-content directorTable">


                                    <?php if (count($model->directors)) { ?>
                                        <?php
                                        foreach ($model->directors as $key => $data) {

                                            ?>
                                            <tbody class="directorTbody">
                                                <tr>
                                                    <td style="width: 40%">Name</td>
                                                    <td>
                                                        {!! Form::text('director_name['.$data->id.']',@$data->director_name ,array('class' => 'form-control', 'hasib' =>'director_name[]' )) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_name'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%">Email</td>
                                                    <td>
                                                        {!! Form::text('director_email['.$data->id.']',@$data->director_email ,array('class' => 'form-control', 'hasib' =>'director_email[]')) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_email'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%">Phone</td>
                                                    <td>
                                                        {!! Form::text('director_phone['.$data->id.']',@$data->director_phone ,array('class' => 'form-control', 'hasib' =>'director_phone[]')) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_phone'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%">Job Role</td>
                                                    <td>
                                                        {!! Form::text('director_job_role['.$data->id.']',@$data->director_job_role ,array('class' => 'form-control', 'hasib' =>'director_job_role[]')) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_job_role'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%">Bio</td>
                                                    <td>
                                                        {!! Form::text('director_bio['.$data->id.']',@$data->director_bio ,array('class' => 'form-control', 'hasib' =>'director_bio[]')) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_bio'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 40%">Image</td>
                                                    <td>
                                                        {!! Form::file('director_image['.$data->id.']' ,array('class' => 'form-control', 'hasib' =>'director_image[]', 'accept'=>"image/*", 'multiple' => 'multiple')) !!}
                                                        <span class="bg-danger"><?= $errors->first('director_image'); ?></span>

                                                        <?php if ($data->director_image) { ?>

                                                        <img class="img" src="{{ asset('admin/directors_image/'.$data->director_image) }}" style="height: 100px;width: 100px">
                                                        <?php } ?>
                                                    </td>

                                                </tr>
                                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

                                                <?php
                                            }
                                        } else {
                                            ?>
                                        </tbody>
                                        <tbody class="directorTbody">
                                            <tr>
                                                <td style="width: 40%">Name</td>
                                                <td>
                                                    {!! Form::text('director_name[]',null ,array('class' => 'form-control','id'=>'address', 'hasib' =>'director_name[]' )) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_name'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">Email</td>
                                                <td>
                                                    {!! Form::text('director_email[]',null ,array('class' => 'form-control', 'hasib' =>'director_email[]')) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_email'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">Phone</td>
                                                <td>
                                                    {!! Form::text('director_phone[]',null ,array('class' => 'form-control' , 'hasib' =>'director_phone[]')) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_phone'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">Job Role</td>
                                                <td>
                                                    {!! Form::text('director_job_role[]',null ,array('class' => 'form-control' , 'hasib' =>'director_job_role[]')) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_job_role'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">Bio</td>
                                                <td>
                                                    {!! Form::text('director_bio[]',null ,array('class' => 'form-control' , 'hasib' =>'director_bio[]')) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_bio'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">Image</td>
                                                <td>

                                                    {!! Form::file('director_image[]',null ,array('class' => 'form-control', 'hasib' =>'director_image[]', 'accept'=>"image/*", 'multiple' => 'multiple')) !!}
                                                    <span class="bg-danger"><?= $errors->first('director_image'); ?></span>
                                                </td>
                                            </tr>
                                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="portlet-body flip-scroll directorBlock">
                                <div class="row">
                                    <td>
                                        <div class="col-md-1 col-md-offset-11">
                                            <button class="btn green submit new-director-row" type="button">+</button>

                                        </div>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-cogs"></i>Finance Details</div>
                            </div>


                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="2">Main Bank Account  (To be used on invoices)</th>
                                        </tr>


                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Account Number</td>
                                            <td>

                                                {!! Form::text('account_no',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('account_no'); ?></span>

                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Account Name	</td>
                                            <td>

                                                {!! Form::text('account_name',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('account_name'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Sort Code</td>
                                            <td>


                                                {!! Form::text('sort_code',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('sort_code'); ?></span>

                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Cheques payable to</td>
                                            <td>


                                                {!! Form::text('cheques_payable',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('cheques_payable'); ?></span>

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


                                        <tr class="vat_details">
                                            <td style="width: 40%">VAT Number</td>
                                            <td colspan="4">
                                                {!! Form::text('vat_number',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('vat_number'); ?></span>

                                            </td>
                                        </tr>
                                        <?php if (count($model->vatreg)) { ?>
                                            <?php
                                            foreach ($model->vatreg as $key => $data) {
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
                                        <tr>
                                            <td rowspan="2" colspan="5" style="padding-left: 0; padding-right: 0;">
                                                <table>
                                                    <tbody id="vatregdate">

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <?php /* ?>
                                          <tr  class="vat_details">
                                          <td style="width: 40%">VAT De-registration Date</td>
                                          <td>
                                          {!! Form::text('vat_dereg_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                          <span class="bg-danger"><?= $errors->first('vat_dereg_date'); ?></span>

                                          </td>
                                          </tr>
                                          <?php */ ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <td>
                                        <div class="col-md-1 col-md-offset-11">
                                            <button class="btn green submit new-row" type="button">+</button>
                                        </div>
                                    </td>
                                </div>
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
                                                {!! Form::text('public_liability_insurance', $model->franchisees->public_liability_insurance, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Public Liability Insurance','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('public_liability_insurance'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Employers Liability Insurance</td>
                                            <td >
                                                {!! Form::text('employers_liability_insurance', $model->franchisees->employers_liability_insurance, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Employers Liability Insurance','class' => 'form-control date-picker')) !!}
                                                <span class="bg-danger"><?= $errors->first('employers_liability_insurance'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Amount of cover</td>
                                            <td>

                                                {!! Form::text('amount_cover', $model->franchisees->amount_cover, array('placeholder' => 'Amount of cover','class' => 'form-control')) !!}
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
                                <div class="caption"><i class="fa fa-cogs"></i>Social Media</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content socialTbl">

                                    <tbody class="socialTbody">
                                        <?php if (count($model->socialMedia)) { ?>
                                            <?php
                                            foreach ($model->socialMedia as $key => $data) {
                                                // $count = $key + 1;
                                                ?>
                                                <tr class="social">
                                                    <td style="width: 40%"> {!! Form::text('social_media_name[]',$data->social_media_name ,array('class' => 'form-control')) !!}</td>
                                                    <td>
                                                        {!! Form::text('social_media_link[]',$data->social_media_link ,array('class' => 'form-control')) !!}
                                                        <span class="bg-danger"><?= $errors->first('linkedin'); ?></span>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            ?>


                                            <tr class="social">
                                                <td style="width: 40%"> {!! Form::text('social_media_name[]','Linkedin' ,array('class' => 'form-control')) !!}</td>
                                                <td>
                                                    {!! Form::text('social_media_link[]',null ,array('class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('linkedin'); ?></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 40%">{!! Form::text('social_media_name[]','Instagram' ,array('class' => 'form-control')) !!}</td>
                                                <td>
                                                    {!! Form::text('social_media_link[]',null ,array('class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('instagram'); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%">{!! Form::text('social_media_name[]','Facebook' ,array('class' => 'form-control')) !!}</td>
                                                <td>
                                                    {!! Form::text('social_media_link[]',null ,array('class' => 'form-control')) !!}
                                                    <span class="bg-danger"><?= $errors->first('facebook'); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <td>
                                        <div class="col-md-1 col-md-offset-11">
                                            <button class="btn green submit new-social-row" type="button">+</button>

                                        </div>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('companyinfo')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>
<script>
google.maps.event.addDomListener(window, 'load', function () {
    var options = {
        //  componentRestrictions: {country: "{{ env('COUNTRY') }}"}
    };
    dropAutocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
});</script>

<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />


<script>
$(document).ready(function () {
    $(".new-social-row").click(function () {
        $(".socialTbody tr:first").clone().appendTo(".socialTbody");
        $(".socialTbody tr:last input").val("");
    });
});</script>
<script>
    $(document).ready(function () {
        $(".new-director-row").click(function () {
            $(".directorTable tbody:first").clone().appendTo(".directorTable").addClass("add-director");
            $(".directorTable tbody:last input").val("");
            $(".directorTable tbody:last img").remove();

            $(".add-director input").each(function(a){
                $(this).attr('name',$(this).attr('hasib'));
            })

        });
    });</script>

<script>
    $(document).on('click', '.new-row', function () {
        $('<tr class="loopTableArea"><td>VAT Registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_reg_date[]"></td> <td>VAT De-registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_de_reg_date[]"></td></tr>').appendTo('#vatregdate').hide().fadeIn(280);
        $('.date-picker').datepicker({
            autoclose: true,
            dateFormat: 'YY-mm-dd'
        });
    });</script>
<script>
    $('.date-picker').datepicker({
        autoclose: true,
        dateFormat: 'YY-mm-dd'
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

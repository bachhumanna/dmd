@extends('admin.home.template')
@section('body')
<h1 class="page-title">Company Information
    <small></small>
</h1>





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
                                            <td style="width: 40%">Date of Incorporation</td>
                                            <td>
                                                {!! Form::text('incorporation_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd" )) !!}
                                                <span class="bg-danger"><?= $errors->first('incorporation_date'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Company Year End</td>
                                            <td>
                                                {!! Form::text('year_end',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('year_end'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Confirmation Statement Date	</td>
                                            <td>
                                                {!! Form::text('confirmation_statement_date',null ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd")) !!}
                                                <span class="bg-danger"><?= $errors->first('confirmation_statement_date'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Company Name</td>
                                            <td>
                                                {!! Form::text('company_name',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('company_name'); ?></span>
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
                                <div class="caption"><i class="fa fa-cogs"></i>Social Media</div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Linkedin</td>
                                            <td>
                                                {!! Form::text('linkedin',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('linkedin'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Instagram</td>
                                            <td>
                                                {!! Form::text('instagram',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('instagram'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Facebook</td>
                                            <td>
                                                {!! Form::text('facebook',null ,array('class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('facebook'); ?></span>
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
    $(document).on('click', '.new-row', function () {
    $('<tr class="loopTableArea"><td>VAT Registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_reg_date[]"></td> <td>VAT De-registration Date</td><td><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="" name="vat_de_reg_date[]"></td></tr>').appendTo('#vatregdate').hide().fadeIn(280);
    $('.date-picker').datepicker({
    autoclose: true,
            dateFormat: 'YY-mm-dd'
    });
    });
</script>
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
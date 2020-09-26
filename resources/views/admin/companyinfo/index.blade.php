@extends('admin.role.template')

@section('body')

<h1 class="page-title">Company Details
    <small></small>
    @include('common.newBooking')
    @if(permit(['companyinfo-edit']))
    <a href="{{ route('companyinfo-edit') }}" class="btn btn-primary float-right"> Edit </a>
    @endif
</h1>
<?php //pr($model->toarray());exit;?>
<div class="row">
    <?php
    //pr($model->toArray());
    ?>

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
                            <td>{{ @$model->company_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Trading Name</td>
                            <td>{{ @$model->trading_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Company Number</td>
                            <td>{{ @$model->company_number }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Registered Office</td>
                            <td>{{ @$model->registered_office }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Date of Incorporation</td>
                            <td>{{ showDate(@$model->incorporation_date,true) }}</td>
                        </tr>

                    </tbody>
                </table>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                    <th>Year End</th>
                    <th>Conf. Stat.</th>
                    <th>Accounts Filing</th>
                    <th>HMRC Filing</th>
                    </thead>
                    <tbody>
                    <td>{{ showDate(@$model->year_end,false,true) }}</td>
                    <td>{{ showDate (@$model->confirmation_statement_date,false,true) }}</td>
                    <td>{{ showDate (@$model->account_filling_date,false,true) }}</td>
                    <td>{{ showDate (@$model->hmrc_filling_date,false,true) }}</td>
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
                            <td>{{ @$model->business_address }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Main Phone number	</td>
                            <td>{{ @$model->phone_number }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Main email address	</td>
                            <td>{{ @$model->company_email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i>Directors Details</div>
            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Job Role</th>
                            <th>Bio</th>
                            <th class="align-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (@$model->directors as $key => $val) {
                            ?>
                        <tr>
                            <td><img class="img" src="{{ asset('admin/directors_image/'.@$val->director_image) }}" style="height: 100px;width: 100px">  </td>
                            <td>{{ @$val->director_name }}</td>
                            <td>{{ @$val->director_email }}</td>
                            <td>{{ @$val->director_phone }}</td>
                            <td>{{ @$val->director_job_role }}</td>
                            <td>{{ @$val->director_bio }}</td>
                            <td class="align-center">
                                <a class="btn btn-info btn-xs red del" href="{{ route('director-delete',@$val->id) }}"  title="Delete">Delete</a>
                            </td>
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
                            <td>{{ @$model->account_no }}</td>
                        </tr>
                        <tr>

                            <td style="width: 40%">Account Name	</td>
                            <td>{{ @$model->account_name }}</td>
                        </tr>
                        <tr>

                            <td style="width: 40%">Sort Code</td>
                            <td>{{ @$model->sort_code }}</td>
                        </tr>
                        <tr>

                            <td style="width: 40%">Cheques payable to</td>
                            <td>{{ @$model->cheques_payable }}</td>
                        </tr>

                    </tbody>
                </table>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr style="background: #32c5d2;color: #fff;">
                            <th colspan="2">VAT Registration</th>
                        </tr>

                    <tbody>


                        <tr>
                            <td style="width: 40%">VAT number</td>
                            <td>{{ @$model->vat_number }}</td>
                        </tr>

                        <?php foreach ($model->vatreg as $key => $data) { ?>
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
                            <td  style="width: 40%" >Public Liability Insurance</td>
                            <td>{{ showDate($model->franchisees->public_liability_insurance,true)}}</td>
                        </tr>

                        <tr>
                            <td>Employers Liability Insurance</td>
                            <td>{{ showDate($model->franchisees->employers_liability_insurance,true)}}</td>
                        </tr>



                        <tr>
                            <td>Amount of cover</td>
                            <td>{{ $model->franchisees->amount_cover }}</td>
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
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <?php foreach (@$model->socialMedia as $key => $val) {
                            ?>
                            <tr>
                                <td style="width: 40%">{{ $val->social_media_name }}</td>
                                <td>{{ $val->social_media_link }}</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script>

        $(".del").click(function (e) {
               e.preventDefault();
                swal({
                    title: "Are you sure wants to delete director?",
                    //text: "After click submit button this data is parmanently deleted!",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: true,
                    buttons: true,

                }).then((willDelete) => {

                    if (willDelete) {

                        var recordID = $(this).data('id');
                        var token = $(this).data("token");
                        deleteURL = $(this).attr('href');
                        
                        //console.log(deleteURL);

                        $.ajax({
                            url: deleteURL,
                            success: function (data){
                                //console.log(data);
                                window.location.reload();
                            }
                        });

                    }

                });

            });

</script>
@endsection

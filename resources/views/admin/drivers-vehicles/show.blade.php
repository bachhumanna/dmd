@extends('admin.users.template')

@section('body')
<h1 class="page-title">Vehicles
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Vehicles Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Body Type </th>
                            <td>{{ $model->bodyType->type }}</td>
                        </tr>
                      
<!--                        <tr>
                            <th>Profile Pic</th>
                            <td>
                                <img width="150px" src='{{ asset("images/profile/".$model->profile_pic) }}' alt="">
                            </td>
                        </tr>-->
                        
                        <tr>
                            <th>Vehicles Model</th>
                            <td>{{ $model->vehicles_model}}</td>
                        </tr>                        
                        <tr>
                            <th>Vehicles Company</th>
                            <td>{{ $model->vehicles_company}}</td>
                        </tr>
                        <tr>
                            <th>Vehicles Number</th>
                            <td>{{ $model->vehicles_number}}</td>
                        </tr>
                        <tr>
                            <th>Max Capacity</th>
                            <td>{{ $model->max_capacity}}</td>
                        </tr>
                        <tr>
                            <th>Council License Number</th>
                            <td>{{ $model->councile_license_no}}</td>
                        </tr>
                        
                        <tr>
                            <th>Council Date</th>
                            <td>{{ $model->council_date}}</td>
                        </tr>
                        <tr>
                            <th>Tax Renewal Date</th>
                            <td>{{ $model->tax_renewal_date}}</td>
                        </tr>
                        <tr>
                            <th>Insurance Renewal Date</th>
                            <td>{{ $model->insurance_date}}</td>
                        </tr>
                        <tr>
                            <th>MOT Date</th>
                            <td>{{ $model->mot_date}}</td>
                        </tr>
<!--                        <tr>
                            <th>Next Billing Date</th>
                            <td>{{ $model->next_billing_date}}</td>
                        </tr>-->
<!--                        <tr>
                            <th>Status</th>
                            <td>{{ $model->is_active_subscription ===1 ? "Active" : "Inactive" }}</td>
                        </tr>-->




                    </tbody>
                </table>



                <div class="form-actions right">
                    <a class="btn green" href="{{ route('vehicles.edit',$model->id) }}">Edit</a>

                </div>
            </div>

        </div>











        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection
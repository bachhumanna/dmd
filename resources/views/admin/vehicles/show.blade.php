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
                            <th>Vehicles Make</th>
                            <td>{{ $model->vehicles_company}}</td>
                        </tr>

                        <tr>
                            <th>Vehicles Model</th>
                            <td>{{ $model->vehicles_model}}</td>
                        </tr>   
                        <tr>
                            <th>Plate Number</th>
                            <td>{{ $model->vehicles_number}}</td>
                        </tr>
                        <tr>
                            <th>Licenced Capacity (to carry set number of passengers)</th>
                            <td>{{ $model->max_capacity}}</td>
                        </tr>
                        <tr>
                            <th>Council License Number</th>
                            <td>{{ $model->councile_license_no}}</td>
                        </tr>

                        <tr>
                            <th>Council Date</th>
                            <td>{{ showDate($model->council_date,true)}}</td>
                        </tr>
                        <tr>
                            <th>Tax Renewal Date</th>
                            <td>{{ showDate($model->tax_renewal_date,true)}}</td>
                        </tr>
                        
                        <tr>
                            <th>PHV License Number</th>
                            <td>{{ $model->phv_licence_number}}</td>
                        </tr>
                        
                        <tr>
                            <th>PHV Issue Date</th>
                            <td>{{ showDate($model->phv_issue_date,true)}}</td>
                        </tr>
                        
                        <tr>
                            <th>Insurance Renewal Date</th>
                            <td>{{ showDate($model->insurance_date,true)}}</td>
                        </tr>
                        <tr>
                            <th>MOT Date</th>
                            <td>{{ showDate($model->mot_date,true)}}</td>
                        </tr>
                        <tr>
                            <th>Wheelchair Accessible	</th>
                            <td><?= $model->color_modification ? "<span class='label label-sm label-success'> YES </span>" : "<span class='label label-sm label-danger'> NO </span>" ?></td>
                        </tr>
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
@extends('admin.home.template')

@section('body')
<h1 class="page-title">Company Information
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Company Information Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Company Number </th>
                            <td>{{ $model->company_number }}</td>
                        </tr>

                        <tr>
                            <th>Registered Office</th>
                            <td><?= $model->registered_office ?></td>
                        </tr>
                        
                        <tr>
                            <th>Directors</th>
                            <td><?= $model->directors ?></td>
                        </tr>
                        
                        <tr>
                            <th>Accountants</th>
                            <td><?= $model->accountants ?></td>
                        </tr>
                        
                        <tr>
                            <th>Lawyers</th>
                            <td><?= $model->lawyers ?></td>
                        </tr>
                        
                        <tr>
                            <th>Phone Number</th>
                            <td><?= $model->phone_number ?></td>
                        </tr>
                        
                        <tr>
                            <th>Company Email</th>
                            <td><?= $model->company_email ?></td>
                        </tr>
                        
                        <tr>
                            <th>Working Hours</th>
                            <td><?= $model->working_hours ?></td>
                        </tr>
                        
                        <tr>
                            <th>Linkedin</th>
                            <td><?= $model->linkedin ?></td>
                        </tr>
                        
                        <tr>
                            <th>Instagram</th>
                            <td><?= $model->instagram ?></td>
                        </tr>
                        
                        <tr>
                            <th>Facebook</th>
                            <td><?= $model->facebook ?></td>
                        </tr>


                    </tbody>
                </table>



                <div class="form-actions right">
                    @if(permit(['companyinfo.edit']))
                    <a class="btn green" href="{{ route('companyinfo.edit',$model->id) }}">Edit</a>
                    @endif
                </div>
            </div>

        </div>

        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>


@endsection

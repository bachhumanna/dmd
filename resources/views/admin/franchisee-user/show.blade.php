@extends('admin.users.template')
@section('title')
Franchisee  | Show
@endsection
@section('body')
<h1 class="page-title">Franchisee User 
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchisee User  Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name </th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model->phone ?></td>
                        </tr>




                        <tr>
                            <th>Date Of Birth</th>
                            <td>{{ showDate($model->dob,true) }}</td>
                        </tr>
                        <tr>
                            <th>House No</th>
                            <td>{{ $model->locality }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $model->street }}</td>
                        </tr>

                        <!-- <tr>
                            <th>Town</th>
                            <td>{{ $model->town }}</td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td>{{ $model->postcode}}</td>
                        </tr> -->
                        <tr>
                            <th>Join Date</th>
                            <td>{{ showDate($model->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $model->status ===1 ? "Active" : "Inactive" }}</td>
                        </tr>
                    </tbody>
                </table>
                @if(permit(['franchisee-user.edit']))
                <div class="form-actions right">
                    <a class="btn green" href="{{ route('franchisee-user.edit',$model->id) }}">Edit</a>
                </div>
                @endif
            </div>
        </div>

        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection

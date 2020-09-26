@extends('admin.home.template')

@section('body')
<h1 class="page-title">Teams
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Teams Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Image </th>
                            <td><img width="200px" src='{{ asset("images/teams/".$model->photo) }}' ></td>
                        </tr>
                        <tr>
                            <th>Name </th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th>Email </th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model->phone ?></td>
                        </tr>

                        <tr>
                            <th>Job Role</th>
                            <td>{{ $model->role }}</td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><?= $model->bio ?></td>
                        </tr>






                    </tbody>
                </table>




            </div>

        </div>











        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection

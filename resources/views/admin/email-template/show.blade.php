@extends('admin.home.template')

@section('body')
<h1 class="page-title">Blogs
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Blogs Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Title </th>
                            <td>{{ $model->title }}</td>
                        </tr>
                        <tr>
                            <th>Email Subject </th>
                            <td>{{ $model->subject }}</td>
                        </tr>
                        <tr>
                            <th>From Name </th>
                            <td>{{ $model->from_name }}</td>
                        </tr>
                        
                        <tr>
                            <th>From Email </th>
                            <td>{{ $model->from_email }}</td>
                        </tr>
                        
                        <tr>
                            <th>Description </th>
                            <td>{{ $model->description }}</td>
                        </tr>
                        
                        
                        <tr>
                            <th>Status</th>
                            <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>

                        </tr>

                        
                        <tr>
                            <th>Description</th>
                            <td><?= $model->content ?></td>
                        </tr>

 


                    </tbody>
                </table>



                <div class="form-actions right">
                    <a class="btn green" href="{{ route('email-template.edit',$model->id) }}">Edit</a>

                </div>
            </div>

        </div>











        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection

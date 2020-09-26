@extends('admin.home.template')

@section('body')
     <h1 class="page-title">Role
        <small></small>
    </h1>
    <div class="row">
        <div class="col-md-12">
            
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Role Details</div>

                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                            
                            <tr>
                                <th>Name </th>
                                <td>{{ $model->name }}</td>
                            </tr>



                            <tr>
                                <th>Display Name</th>
                                <td>{{ $model->display_name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?= $model->description ?></td>
                            </tr>
 





                        </tbody>
                    </table>



                    <div class="form-actions right">
                        <a class="btn green" href="{{ route('role.edit',$model->id) }}">Edit</a>

                    </div>
                </div>

            </div>









 

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
    </div>


 
@endsection

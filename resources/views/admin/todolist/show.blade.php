@extends('admin.faq.template')

@section('body')
     <h1 class="page-title">To Do List
        <small></small>
    </h1>
    <div class="row">
        <div class="col-md-12">
            
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>To Do List Details</div>

                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                            
                            <tr>
                                <th>Title </th>
                                <td>{{ $model->title }}</td>
                            </tr>

                            
                            <tr>
                                <th>Description</th>
                                <td><?= $model->description ?></td>
                            </tr>
                                                       
                            <tr>
                                <th>Date</th>
                                <td><?= $model->posted_date ?></td>
                            </tr>
 





                        </tbody>
                    </table>



                    <div class="form-actions right">
                        <a class="btn green" href="{{ route('todolist.edit',$model->id) }}">Edit</a>

                    </div>
                </div>

            </div>









 

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
    </div>


 
@endsection

@extends('admin.role.template')

@section('body')

    <h1 class="page-title">Default Permission
        <small></small>
    </h1>
    <div class="row">
        <div class="col-md-12">
             
             

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Default Permission </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>User</th>
                                <th>Display Name</th>
                                
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $key=>$model)
                            <tr>
                                
                                <td>{{ $model['type'] }}</td>
                                <td>{{ $model['is_super'] ? "Super Admin" : "-" }}</td>
                                
                                
                                <td  class="align-center">
                                    <a class="btn btn-primary" href="{{ route('default-permissions.edit',$key) }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

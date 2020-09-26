@extends('permission.template')
@section('body')

<h3 class="page-title">Permission 
    <small>Manage</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
 @if(permit(['permissions.index']))
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet">
            
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Name 
                                </th>
                                <th>
                                   Display Name 
                                </th>
                                <th class="hidden-xs">
                                    Description 
                                </th>
                                <th>
                                     Create At 
                                </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($models as $model) { ?>
                                <tr>
                                    <td>
                                        <a href="javascript:;"> {{ $model->name }} </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> {{ $model->display_name }} </a>
                                    </td>
                                    <td class="hidden-xs"> {{ $model->description }} </td>
                                    <td>
                                        {{ $model->created_at }}
                                    </td>
                                    <td>
                                        @if(permit(['permissions.show']))
                                        <a href="{{route('permissions.show',$model->id)}}" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-share"></i>  View</a>
                                        @endif
                                        @if(permit(['permissions.edit','permissions.update']))
                                        <a href="{{route('permissions.edit',$model->id)}}" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> Edit</a>
                                        @endif
                                        @if(permit(['permissions.destroy']))
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['permissions.destroy', $model->id,],'style'=>'float:right','onsubmit'=>'return deleteConfirm()' ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                {!! $models->render() !!}
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
 @endif
</div>

@endsection

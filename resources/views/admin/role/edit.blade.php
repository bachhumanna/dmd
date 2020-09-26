@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Role
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Role</div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['role.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Display name</label>
                        <div class="col-md-9">
                            {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('display_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'Description','id'=>'description','class' => 'form-control')) !!}

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="be-checkbox" style="padding: 7px 0;min-height: auto; line-height: 22px;">
                            <label>
                                <input id="checkedAll"  type="checkbox" class="icheck"  data-checkbox="icheckbox_square-blue">
                                Check all Permission
                            </label>
                        </div>
                        <span class="bg-danger"><?= $errors->first('rolePermission'); ?></span>
                    </div>


                    <div class="form-group">
                        <?php foreach ($finalPermission as $key => $per) { ?>
                            <fieldset class="scheduler-border">
                                <legend  class="scheduler-border label label-sm label-success"><?= ucfirst($key) ?></legend>
                                <?php foreach ($per as $key => $permission) {
                                    ?>
                                    <div class="col-md-4">
                                        <label>
                                            <input  name="rolePermission[]"  <?= in_array($permission->id, $permissionModel) ? "checked" : "" ?> value="<?= $permission->id ?>" type="checkbox" class="icheck checkSingle"  data-checkbox="icheckbox_square-blue"> <?= $permission->display_name ?>
                                        </label>
                                    </div>

                                <?php } ?>
                            </fieldset>
                        <?php } ?>


                    </div>













                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('role.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

</div>
<script>
    $(document).ready(function () {
        $('#checkedAll').on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                $('input.checkSingle').iCheck('check');
            } else {
                $('input.checkSingle').iCheck('uncheck');
            }
        });

        $('input.checkSingle').on('ifChanged', function (event) {
            if ($('input.checkSingle').filter(':checked').length == $('input.checkSingle').length) {
                $('#checkedAll').prop('checked', 'checked');
            } else {
                $('#checkedAll').removeProp('checked');
            }
            $('#checkedAll').iCheck('update');
        });

    });
</script>


@endsection

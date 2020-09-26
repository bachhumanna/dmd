@extends('admin.role.template')

@section('body')

<h1 class="page-title">Company Details
    <small></small>
</h1>
<div class="row">
    <div class="portlet-body form">
        {!! Form::open(['method' => 'POST','files' => true , 'route' => ['companyinfo-edit'], 'class'=>'form-horizontal']) !!}
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Corporate Details</div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                            <?php
                            foreach ($models as $model) {
                                if ($model->type == 1) {
                                    ?>
                                    <tr>
                                        <td style="width: 40%">{{ $model->setting_name }}</td>
                                        <td>
                                            <?php if($model->field_type == 3){ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy" )) !!}
                                            <?php }else{ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control')) !!}
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                </div>




            </div>
        </div>
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Contact Details</div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">

                        <tbody>
                            <?php
                            foreach ($models as $model) {
                                if ($model->type == 2) {
                                    ?>
                                    <tr>
                                        <td style="width: 40%">{{ $model->setting_name }}</td>
                                        <td>
                                            <?php if($model->field_type == 3){ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd" )) !!}
                                            <?php }else{ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control')) !!}
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>





            </div>
        </div>
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Finance Details</div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr style="background: #32c5d2;color: #fff;">
                                <th colspan="2">Main Bank Account  (To be used on invoices)</th>
                            </tr>


                        <tbody>
                            <?php
                            foreach ($models as $model) {
                                if ($model->type == 3) {
                                    ?>
                                    <tr>

                                        <td style="width: 40%">{{ $model->setting_name }}</td>
                                        <td>
                                            <?php if($model->field_type == 3){ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd" )) !!}
                                            <?php }else{ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control')) !!}
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr style="background: #32c5d2;color: #fff;">
                                <th colspan="2">VAT Registration</th>
                            </tr>


                        <tbody>
                            <?php
                            foreach ($models as $model) {
                                if ($model->type == 6) {
                                    ?>
                                    <tr>
                                        <td style="width: 40%">{{ $model->setting_name }}</td>
                                        <td>
                                            <?php if($model->field_type == 3){ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control date-picker','data-date-format'=>"dd-mm-yyyy" )) !!}
                                            <?php }else{ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control')) !!}
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Social Media</div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                            <?php
                            foreach ($models as $model) {
                                if ($model->type == 4) {
                                    ?>
                                    <tr>
                                        <td style="width: 40%">{{ $model->setting_name }}</td>
                                        <td>
                                            <?php if($model->field_type == 3){ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control date-picker','data-date-format'=>"yyyy-mm-dd" )) !!}
                                            <?php }else{ ?>
                                            {!! Form::text("data[$model->id]",$model->setting_value ,array('class' => 'form-control')) !!}
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-actions right1">
            <button type="submit" class="btn green">Submit</button>
            <a href="{{route('companyinfo')}}" class="btn btn-danger">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>

</div>
<script src="{{ asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<script>
    $('.date-picker').datepicker({
        autoclose: true,
                 dateFormat: 'dd-mm-YY'
    });
</script>
@endsection

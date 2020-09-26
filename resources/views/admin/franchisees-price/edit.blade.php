@extends('admin.franchisees-price.template')
@section('title')
Franchisee | Edit
@endsection
@section('body')
<h1 class="page-title">Franchisee
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Franchisee
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['franchisees-price.update', $model->id], 'class'=>'form-horizontal']) !!}
<div class="form-body">
                    <div class="form-group1111">

                        <?php /* ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Companion Drivers cost (Per Hour)</label>
                            <div class="col-md-9">
                                {!! Form::text('driver_cost', null, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Vehicle cost (Per Mile)</label>
                            <div class="col-md-9">
                                {!! Form::text('vehicle_cost',null, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Paid Mileage (Per Mile)</label>
                            <div class="col-md-9">
                                {!! Form::text('paid_mileage', null, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Base Driving Cost (Per Minute)</label>
                            <div class="col-md-9">
                                {!! Form::text('base_driving_cost', null, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Waiting Time Cost (Per 15 Minutes)</label>
                            <div class="col-md-9">
                                {!! Form::text('waiting_time_cost', null, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Companionship Cost (Per 15 Minutes)</label>
                            <div class="col-md-9">
                                {!! Form::text('companionship_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Comfort Cost</label>
                            <div class="col-md-9">
                                {!! Form::text('comfort_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                            </div>
                        </div>

                        <?php */ ?>







                        <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="2">Revenue </th>
                                        </tr>


                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Base Driving (Per minute)</td>
                                            <td>
                                                {!! Form::text('base_driving_cost', null, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="width: 40%">Companion Care (Per 15 mins)</td>
                                            <td>
                                                {!! Form::text('companionship_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Waiting Time(Per 15 mins)</td>
                                            <td>
                                                {!! Form::text('waiting_time_cost', null, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">Paid Mileage (Per Mile)</td>
                                            <td>
                                                {!! Form::text('paid_mileage', null, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Comfort breaks (Per break 30 mins)</td>
                                            <td>
                                                {!! Form::text('comfort_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>


                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="2">Expenses</th>
                                        </tr>
                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Companion Driver (Per Hour)</td>
                                            <td>
                                                {!! Form::text('driver_cost', null, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Companion (Per Hour)</td>
                                            <td>
                                                {!! Form::text('companion_cost',null, array('placeholder' => 'Companion Cost per hour','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('companion_cost'); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 40%">Vehicle(Per Mile)</td>
                                            <td>
                                                {!! Form::text('vehicle_cost',null, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


<!--                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr style="background: #32c5d2;color: #fff;">
                                            <th colspan="2">Companion</th>
                                        </tr>
                                    <tbody>

                                        <tr>
                                            <td style="width: 40%">Companion (Per Hour)</td>
                                            <td>
                                                {!! Form::text('companion_cost',null, array('placeholder' => 'Companion Cost per hour','class' => 'form-control')) !!}
                                                <span class="bg-danger">< ?= $errors->first('companion_cost'); ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->


                            </div>









                    </div>





                </div>

                <!--                <div class="form-body">
                    <div class="form-group">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Companion Drivers cost (Per Hour)</label>
                            <div class="col-md-9">
                                {!! Form::text('driver_cost', null, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Vehicle cost (Per Mile)</label>
                            <div class="col-md-9">
                                {!! Form::text('vehicle_cost',null, array('placeholder' => 'Cost per mile','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('vehicle_cost'); ?></span>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-md-3 control-label">Paid Mileage (Per Mile)</label>
                            <div class="col-md-9">
                                {!! Form::text('paid_mileage', null, array('placeholder' => 'Paid Mileage','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Base Driving Cost (Per Minute)</label>
                            <div class="col-md-9">
                                {!! Form::text('base_driving_cost', null, array('placeholder' => 'Base Driving Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Waiting Time Cost (Per 15 Minutes)</label>
                            <div class="col-md-9">
                                {!! Form::text('waiting_time_cost', null, array('placeholder' => 'Waiting Time Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Companionship Cost (Per 15 Minutes)</label>
                            <div class="col-md-9">
                                {!! Form::text('companionship_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Comfort Cost</label>
                            <div class="col-md-9">
                                {!! Form::text('comfort_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control')) !!}
                                <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                            </div>
                        </div>



                    </div>





                </div>-->
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                    <a href="{{route('franchisees-price.index')}}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

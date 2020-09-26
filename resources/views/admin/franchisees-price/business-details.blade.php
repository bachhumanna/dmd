@extends('admin.franchisees-price.template')
@section('title')
Franchisee | Edit
@endsection
@section('body')
<h1 class="page-title">Pricing Structure 
    <small></small>
    @include('common.newBooking')
</h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Pricing Structure
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
                {!! Form::model($model, ['method' => 'POST','files' => true , 'route' => ['business-details-update'], 'class'=>'form-horizontal']) !!}
                <div class="form-body">
                    <div class="form-group1111">                                 
 
                        <div class="portlet-body flip-scroll">
                            <table class="table table-bordered table-striped table-condensed flip-content pricing-structure">
                                <thead class="flip-content">
                                    <tr style="background: #32c5d2;color: #fff;">
                                        <th colspan="3">Revenue </th>
                                    </tr>
                                <tbody>
                                    <tr>
<!--                                        <td style="width: 40%">Vat Registration</td>-->
                                        <td style="width: 40%">VAT View</td>
                                        <td colspan="2">
                                            {!! Form::select('vat_view',[1=>'Yes',0=>"No"], null ,array('class' => 'form-control', 'id' => 'vat_view')) !!}
                                            <span class="bg-danger"><?= $errors->first('vat_view'); ?></span>
                                        </td>                                           
                                    </tr>
                                    <tr class="withVat">
<!--                                        <td style="width: 40%">Vat Registration</td>-->
                                        <td style="width: 40%">Does Price Include VAT? </td>
                                        <td colspan="2">
                                            {!! Form::select('vat_registration',[1=>'Yes',0=>"No"], null ,array('class' => 'form-control base_return price', 'id' => 'vat_registration')) !!}
                                            <span class="bg-danger"><?= $errors->first('vat_registration'); ?></span>
                                        </td>                                           
                                    </tr>
                                    <tr>
                                        <td style="width: 40%"></td>
                                        <td>Price  (User Defined)</td>
                                        <!--<td class="withVat">Price Including VAT  (Calculated)</td>-->
                                        <td class="withVat">VAT View (Calculated)</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 40%">Base Driving  (Per minute)</td>
                                        <td>
                                            {!! Form::text('base_driving_cost', null, array('placeholder' => 'Base Driving Cost','class' => 'form-control price', 'id' => 'base_driving_cost')) !!}
                                            <span class="bg-danger"><?= $errors->first('base_driving_cost'); ?></span>
                                        </td>
                                        <td class="withVat">
                                            {!! Form::text('vat_base_driving_cost', $model->base_driving_cost, array('class' => 'form-control' , 'id' => 'vat_base_driving_cost', 'readonly')) !!}
                                        </td>
                                    </tr>
                                    <tr>

                                        <td style="width: 40%">Companion Care / Assistance  (Per 15 mins )</td>
                                        <td>
                                            {!! Form::text('companionship_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control price', 'id' => 'companionship_cost')) !!}
                                            <span class="bg-danger"><?= $errors->first('companionship_cost'); ?></span>
                                        </td>
                                        <td class="withVat">
                                            {!! Form::text('vat_companionship_cost', $model->companionship_cost, array('class' => 'form-control', 'id' => 'vat_companionship_cost', 'readonly')) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Waiting Time  (Per 15 mins)</td>
                                        <td> 
                                            {!! Form::text('waiting_time_cost', null, array('placeholder' => 'Waiting Time Cost','class' => 'form-control price', 'id' => 'waiting_time_cost')) !!}
                                            <span class="bg-danger"><?= $errors->first('waiting_time_cost'); ?></span>
                                        </td>
                                        <td class="withVat"> 
                                            {!! Form::text('vat_waiting_time_cost', $model->waiting_time_cost, array('class' => 'form-control', 'id' => 'vat_waiting_time_cost', 'readonly')) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Paid Mileage  (Per Mile)</td>
                                        <td> 
                                            {!! Form::text('paid_mileage', null, array('placeholder' => 'Paid Mileage','class' => 'form-control price', 'id' => 'paid_mileage')) !!}
                                            <span class="bg-danger"><?= $errors->first('paid_mileage'); ?></span>
                                        </td>
                                        <td class="withVat"> 
                                            {!! Form::text('vat_paid_mileage', $model->paid_mileage, array('class' => 'form-control', 'id' => 'vat_paid_mileage', 'readonly')) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Comfort breaks  (Per break 30 mins)</td>
                                        <td> 
                                            {!! Form::text('comfort_cost', null, array('placeholder' => 'Companionship Cost','class' => 'form-control price', 'id' => 'comfort_cost')) !!}
                                            <span class="bg-danger"><?= $errors->first('comfort_cost'); ?></span>
                                        </td>
                                        <td class="withVat"> 
                                            {!! Form::text('vat_comfort_cost', $model->comfort_cost, array('class' => 'form-control', 'id' => 'vat_comfort_cost', 'readonly')) !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <table class="table table-bordered table-striped table-condensed flip-content pricing-structure">
                                <thead class="flip-content">
                                    <tr style="background: #32c5d2;color: #fff;">
                                        <th colspan="2">Expenses</th>
                                    </tr>
                                <tbody>

                                    <tr>
                                        <td style="width: 40%">Companion Driver  (Per Hour)</td>
                                        <td> 
                                            {!! Form::text('driver_cost', null, array('placeholder' => 'Companion Drivers cost','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('driver_cost'); ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 40%">Companion  (Per Hour)</td>
                                        <td> 
                                            {!! Form::text('companion_cost',null, array('placeholder' => 'Companion Cost per hour','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('companion_cost'); ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 40%">Vehicle  (Per Mile)</td>
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
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
<!--                    <a href="{{route('companion.index')}}" class="btn btn-danger">Cancel</a>-->
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<script>
    $("#vat_registration").change(function () {

        vatCalculation();

    });
    
    $("#vat_view").change(function () {

       var vat = $("#vat_view").val();
             
       if(vat == 0){
          $(".withVat").hide();
       }
       if(vat == 1){
           $(".withVat").show();
       }

    });

    $(".price").keyup(function () {

        vatCalculation();

    });

    function vatCalculation() {
        var vat_registration = $("#vat_registration").val();

        if (vat_registration == 0) {
            $(".price").each(function () {
                percentage = (20 / 100);
                var price = $(this).val();
                var vat = price * percentage;
                var tot = (parseFloat(price) + parseFloat(vat)).toFixed(2);
                $("#vat_" + $(this).attr("id")).val(tot);
            })
        }
        if (vat_registration == 1) {
            $(".price").each(function () {
                $("#vat_" + $(this).attr("id")).val($(this).val());
            })
        }
    }
    $( document ).ready(function() {
       vatCalculation();
    });
</script>

@endsection
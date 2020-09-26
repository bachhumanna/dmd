@extends('admin.faq.template')

@section('body')
<h1 class="page-title">Franchisor Invoice Price
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchisor Invoice Price Details</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>From Turnover</th>
                            <td>{{ $model->from_turnover }}</td>
                        </tr>
                        <tr>
                            <th>To Turnover</th>
                            <td>{{ $model->to_turnover}}</td>
                        </tr>                        
                        <tr>
                            <th>Base Fee</th>
                            <td><?= $model->base_fee ?></td>
                        </tr>                        
                        <tr>
                            <th>Plus Excess</th>
                            <td><?= $model->plus_excess ?> %</td>
                        </tr>
                        <tr>
                            <th>Max Monthly</th>
                            <td><?= $model->max_monthly ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-actions right">
                    <a class="btn green" href="{{ route('franchisor-invoiceprice.edit',$model->id) }}">Edit</a>
                </div>
            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>



@endsection

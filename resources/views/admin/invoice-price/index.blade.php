@extends('admin.users.template')

@section('body')

<h1 class="page-title">Invoice Price
    <small></small>
    @include('common.newBooking')
    @if(permit(['franchisor-invoiceprice.create']))
    <a href="{{ route('franchisor-invoiceprice.create') }}" class="btn btn-primary float-right"> Create </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Invoice Price</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>From Turnover</th>
                            <th>To Turnover</th>
                            <th>Base Fee</th>
                            <th>Plus Excess</th>
                            <th>Max Monthly</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <td>{{env('CURRENCY_SYM')}}{{ $model->from_turnover }}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ $model->to_turnover }}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ $model->base_fee}}</td>
                            <td>{{ $model->plus_excess}} %</td>
                            <td>{{env('CURRENCY_SYM')}}{{ $model->max_monthly}}</td>
                            <td  class="align-center actionIcon">


                                <ul>


                                    <li>
                                        @if(permit(['franchisor-invoiceprice.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('franchisor-invoiceprice.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['franchisor-invoiceprice.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['franchisor-invoiceprice.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                            {!! Form::submit('', ['class' => 'btn btn-danger btn-xs','title'=>'Delete']) !!}
                                            <span class="btnIcon red" title="">
                                                <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                            {!! Form::close() !!}
                                        @endif
                                    </li>

                                </ul>











<!--                                <a class="btn btn-info btn-xs" href="{{ route('franchisor-invoiceprice.show',$model->id) }}">Show</a>-->

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
        </div>


        <h1 class="page-title">Invoice Fees
            <small></small>
            @if(permit(['franchisor-fees-create']))
            <a href="{{ route('franchisor-fees-create') }}" class="btn btn-primary float-right"> Create </a>
            @endif
        </h1>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Fees</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>@sortablelink('name','Type')</th>
                            <th>@sortablelink('name','Month(s)')</th>
                            <th>@sortablelink('amount','Amount')</th>
                            <th>@sortablelink('vat','VAT %')</th>
                            <th>Totla</th>



                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feesPrce as $model)
                        <tr>
                            <td>{{ $model->name }}</td>
                            <td>{{ invoiceFeeType($model->type) }} {{ getMonths($model->months,true) }}</td>
                            <td>{{env('CURRENCY_SYM')}}{{ $model->amount}}</td>
                            <td>{{ $model->vat}}%</td>
                            <td>{{env('CURRENCY_SYM')}}{{ vatCalculation($model->amount,$model->vat, true ) }}</td>
                            <td  class="align-center">
                                @if(permit(['franchisor-fees-edit']))
                                <a class="btn btn-primary btn-xs" href="{{ route('franchisor-fees-edit',$model->id) }}">Edit</a>
                                @endif
                                @if(permit(['franchisor-fees-delete']))
                                {!! Form::open(['method' => 'DELETE','route' => ['franchisor-fees-delete', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $models->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>



@endsection

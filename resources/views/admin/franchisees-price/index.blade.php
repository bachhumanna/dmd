@extends('admin.franchisees-price.template')
@section('title')
Franchisee | Manage
@endsection
@section('body')

<h1 class="page-title">Franchisee Price
    <small></small>
     @include('common.newBooking')
</h1>
<div class="row">
    <div class="col-md-12">


        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Franchisee Price</div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>@sortablelink('franchisees_id','Franchisee')</th>
                            <th>@sortablelink('driver_cost','Companion Drivers Cost')</th>
                            <th>@sortablelink('vehicle_cost','Vehicle Cost')</th>
                            <th>@sortablelink('comfort_cost','Comfort Cost')</th>
                            <th>@sortablelink('paid_mileage','Paid Mileage')</th>
                            <th>@sortablelink('base_driving_cost','Base Driving Cost')</th>
                            <th>@sortablelink('waiting_time_cost','Waiting Time Cost')</th>
                            <th>@sortablelink('companionship_cost','Companionship Cost')</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>

                            <td>{{ $model->franchisees->name }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->driver_cost}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->vehicle_cost}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->comfort_cost}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->paid_mileage}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->base_driving_cost}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->waiting_time_cost}}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->companionship_cost}}</td>
                            <td  class="align-center actionIcon">


                                <ul>



                                    <li>
                                        @if(permit(['franchisees-price.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('franchisees-price.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>




                                </ul>



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

@extends('admin.faq.template')

@section('body')
<h1 class="page-title">Clients
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Client Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name</th>
                            <td>{{ $model->firstname }} {{ $model->surname }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->email}}</td>
                        </tr>                        
                        <tr>
                            <th>Mobile</th>
                            <td><?= $model->phone ?></td>
                        </tr>                        
                        <tr>
                            <th>Landline</th>
                            <td><?= $model->home_number ?></td>
                        </tr>                        
                        <tr>
                            <th>Address 1</th>
                            <td>{{ $model->address }}</td>
                        </tr>
<!--                        <tr>
                            <th>Address 2</th>
                            <td>< ?= $model->house_number ?></td>
                        </tr>-->
                        <tr>
                            <th>Permanent  Notes</th>
                            <td>{{ $model->client_health_notes}}</td>
                        </tr>
                        <tr>
                            <th>Mobility</th>
                            <td><?=  mobilityLevel($model->mobility_level) ?></td>                            
                            
                        </tr>
                        <tr>
                            <th>Who Paying Bill</th>
                            <td><?php echo whoPayingBill($model); ?></td>
                        </tr>

                    </tbody>
                </table>


                <div class="form-actions right">
                    @if(permit(['client.edit']))
                    <a class="btn green" href="{{ route('client.edit',$model->id) }}">Edit</a>
                    @endif
                </div>
            </div>

        </div>


        <!-- END SAMPLE TABLE PORTLET-->
        
        
        
        
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Booking History</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Booking#</th>
                            <th>Booking&nbsp;Time</th>
                            <th>Total&nbsp;Pice</th>
                            <th>Total&nbsp;Time</th>
                            
                            <th>Base </th>
                            <th>Pickup</th>
                            <th>Phone </th>
                            <th>Drop&nbsp;Location </th>
                            <th class="text-center">Status</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->order_id }}</td>
                            <td>{{ showDate($model->booking_time) }}</td>
                            <td>{{ env('CURRENCY_SYM') }}{{ $model->price }}</td>
                            <td>{{ $model->total_duration }} Min</td>
                            
                            <td>{{ $model->base_location}}</td>
                            <td><?= $model->pickup ?></td>
                            <td>{{ $model->phone_number}}</td>
                            <td>{{ @$model->dropLocation->location_name}}</td>
                            <td class="text-center" style="vertical-align:middle"><?= @$model->status ?></td>
                            <td  class="align-center" style="width: 112px;">
                                <a class="btn btn-info btn-xs" href="{{ route('booking.show',$model->id) }}">Show</a>
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

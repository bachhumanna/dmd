@extends('admin.users.template')

@section('body')
<h1 class="page-title">Companion Drivers
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Companion Drivers Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name </th>
                            <td>{{ $model->name }} {{ $model->surname }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->email}}</td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td>{{ showDate($model->dob,true)}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model->phone ?></td>
                        </tr>

                        <tr>
                            <th>House Number</th>
                            <td>{{ $model->locality }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $model->address }}</td>
                        </tr>

                        <!-- <tr>
                            <th>Town</th>
                            <td>{{ $model->town }}</td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td>{{ $model->postcode}}</td>
                        </tr> -->
<!--                        <tr>
                            <th>Join Date</th>
                            <td>{{ $model->created_at}}</td>
                        </tr>-->

                        <tr>
                            <th>Profile Pic</th>
                            <td>
                                <img width="150px" src='{{ asset("images/profilepic/".@$model->profile_pic) }}' alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>PHL Licence Number</th>
                            <td>{{ @$model->userDriverdetails->phl_number}}</td>
                        </tr>

                        <tr>
                            <th>PHL Image</th>
                            <td>
                                <img width="150px" src='{{ asset("images/phlimage/".@$model->userDriverdetails->phl_image) }}' alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>PHL Licence Expiry Date</th>
                            <td>{{ showDate(@$model->userDriverdetails->phl_expiry_date,true)}}</td>
                        </tr>

                        <tr>
                            <th>National Insurance Number</th>
                            <td>{{ @$model->userDriverdetails->national_insurance_no}}</td>
                        </tr>

                        <tr>
                            <th>Licence No</th>
                            <td>{{ @$model->userDriverdetails->licence_no}}</td>
                        </tr>
                        <tr>
                            <th>Licence Expiry Date</th>
                            <td>{{ showDate(@$model->userDriverdetails->licence_expiry_date,true)}}</td>
                        </tr>
<!--                        <tr>
                            <th>Driver Experience</th>
                            <td>{{ @$model->userDriverdetails->driver_experience}}</td>
                        </tr>-->
                        <tr>
                            <th>Driving Licence</th>
                            <td>
                                <img width="150px" src='{{ asset("images/drivingrequest/".@$model->userDriverdetails->drivinglicence) }}' alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>Passport Number</th>
                            <td>{{ @$model->userDriverdetails->passport_number}}</td>
                        </tr>

                        <tr>
                            <th>Passport Image</th>
                            <td>
                                <img width="150px" src='{{ asset("images/passportimg/".@$model->userDriverdetails->passport_image) }}' alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>Training Certificates</th>
                            <td>
                                <img width="150px" src='{{ asset("images/certificates/".@$model->userDriverdetails->training_certificates) }}' alt="">
                            </td>
                        </tr>

                        <tr>
                            <th>Certificates expiry dates</th>
                            <td>{{ showDate(@$model->userDriverdetails->certificates_exp_date,true)}}</td>
                        </tr>


                        <tr>
                            <th>Renewal Date</th>
                            <td>{{ showDate(@$model->userDriverdetails->renewal_date,true)}}</td>
                        </tr>
                        <tr>
                            <th>Employment Start Date</th>
                            <td>{{ showDate(@$model->userDriverdetails->employment_start_date,true) }}</td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>{{ @$model->userDriverdetails->note }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $model->status ===1 ? "Active" : "Inactive" }}</td>
                        </tr>
                        <tr>
                            <th>Right to Work in the UK</th>
                            <td>{{ $model->status ===1 ? "Yes" : "No" }}</td>
                        </tr>




                    </tbody>
                </table>



                <div class="form-actions right">
                    @if(permit(['driver.edit']))
                    <a class="btn green" href="{{ route('driver.edit',$model->id) }}">Edit</a>
                    @endif
                </div>
            </div>

        </div>




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






        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection

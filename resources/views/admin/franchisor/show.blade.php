@extends('admin.users.template')

@section('body')
<h1 class="page-title">Franchisor
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Franchisor Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name </th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $model->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model->phone ?></td>
                        </tr>




<!--                        <tr>
                            <th>Profile Pic</th>
                            <td>
                                <img width="150px" src='{{ asset("images/profile/".$model->profile_pic) }}' alt="">
                            </td>
                        </tr>-->
                        <tr>
                            <th>DOB</th>
                            <td>{{ showDate($model->dob,true)}}</td>
                        </tr>
                        <tr>
                            <th>House Number</th>
                            <td>{{ $model->locality}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $model->address}}</td>
                        </tr>
                        <!-- <tr>
                            <th>City</th>
                            <td>{{ $model->town}}</td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td>{{ $model->postcode}}</td>
                        </tr> -->
<!--                        <tr>
                            <th>Join Date</th>
                            <td>{{ $model->created_at}}</td>
                        </tr>-->
<!--                        <tr>
                            <th>Stripe Id</th>
                            <td>{{ $model->stripe_id}}</td>
                        </tr>
                        <tr>
                            <th>Card Brand</th>
                            <td>{{ $model->card_brand}}</td>
                        </tr>
                        <tr>
                            <th>Card Last Four</th>
                            <td>{{ $model->card_last_four}}</td>
                        </tr>
                        <tr>
                            <th>Trial Ends At</th>
                            <td>{{ $model->trial_ends_at}}</td>
                        </tr>
                        <tr>
                            <th>Next Billing Date</th>
                            <td>{{ $model->next_billing_date}}</td>
                        </tr>-->
                        <tr>
                            <th>Status</th>
                            <td>{{ $model->status ===1 ? "Active" : "Inactive" }}</td>
                        </tr>




















                    </tbody>
                </table>


                @if(permit(['franchisor.edit']))
                <div class="form-actions right">
                    <a class="btn green" href="{{ route('franchisor.edit',$model->id) }}">Edit</a>
                </div>
                @endif
            </div>

        </div>











        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection

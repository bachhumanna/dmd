@extends('admin.home.template')

@section('body')
<h1 class="page-title">Driving Request
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Driving Request  Details</div>

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
                            <td>{{ $model->dob}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model->phone ?></td>
                        </tr>

                        <tr>
                            <th>Street</th>
                            <td>{{ $model->street }}</td>
                        </tr>
                        <tr>
                            <th>Locality</th>
                            <td>{{ $model->locality }}</td>
                        </tr>
                        <tr>
                            <th>Town</th>
                            <td>{{ $model->town }}</td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td>{{ $model->postcode}}</td>
                        </tr>
                        
                        
                        <tr>
                            <th>Profile Pic</th>
                            <td>
                                <img width="150px" src='{{ asset("admin/images/profilepic/".$model->profile_pic) }}' alt="">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>PHL Number</th>
                            <td>{{ $model->phl_number}}</td>
                        </tr>
                        
                        <tr>
                            <th>PHL Image</th>
                            <td>
                                <img width="150px" src='{{ asset("admin/images/phlimage/".$model->phl_image) }}' alt="">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>PHL Expiry Date</th>
                            <td>{{ $model->phl_expiry_date}}</td>
                        </tr>
                        
                        <tr>
                            <th>National Insurance Number</th>
                            <td>{{ $model->national_insurance_no}}</td>
                        </tr>
                        
                        <tr>
                            <th>Driving Licence</th>
                            <td>
                                <img width="150px" src='{{ asset("admin/images/drivingrequest/".$model->drivinglicence) }}' alt="">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Licence No</th>
                            <td>{{ $model->licence_no}}</td>
                        </tr>
                        
                        <tr>
                            <th>Licence Expiry Date</th>
                            <td>{{ $model->licence_expiry_date}}</td>
                        </tr>
                        
                        <tr>
                            <th>Driver Experience</th>
                            <td>{{ $model->driver_experience}}</td>
                        </tr>
                        
                        <tr>
                            <th>Passport Number</th>
                            <td>{{ $model->passport_number}}</td>
                        </tr>
                        
                        <tr>
                            <th>Passport Image</th>
                            <td>
                                <img width="150px" src='{{ asset("admin/images/passportimg/".$model->passport_image) }}' alt="">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Renewal Date</th>
                            <td>{{ $model->renewal_date}}</td>
                        </tr>
                        
                        <tr>
                            <th>Request Date</th>
                            <td>{{ $model->created_at}}</td>
                        </tr>  

                        <tr>
                            <th>Status</th>
                            <td>
                                <?= $model->status ? " Active " : " Inactive " ?>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <?php if (!$model->status == 1) { ?>

                    <div class="form-actions right">
                        <a class="btn green" href="{{ route('drivingstore',$model->id) }}">Approve</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['driving-request.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                        {!! Form::submit('Reject', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    
                    </div>
                <?php } ?>
                
                
                
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection
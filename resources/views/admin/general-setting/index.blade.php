@extends('admin.role.template')

@section('body')

<h1 class="page-title">Company Details
    <small></small>
<a href="{{ route('companyinfo-edit') }}" class="btn btn-primary float-right"> Edit </a>
</h1>
<div class="row">
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
                                    <td>{{ $model->setting_value }}</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>


            </div>
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-user"></i>Directors </div>
            </div>
            <div class="portlet-body flip-scroll company-team">

                <div class="row">
                    <?php foreach ($teamModel as $team) { ?>
                        <div class="col-md-3">
                            <div class="profile-sidebar">
                                <div class="portlet light profile-sidebar-portlet ">
                                    <div class="profile-userpic">
<!--                                        <div class="team-image">
                                            <img  src='{{ asset("images/teams/".$team->photo) }}' >
                                        </div>-->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name">
                                                <a href="{{ route('teams.show',$team->id) }}">    {{ $team->name }} </a>
                                            </div>
<!--                                            <div class="profile-usertitle-job"> {{ $team->role }} </div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
                                    <td>{{ $model->setting_value }}</td>
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
                                <th colspan="2">Main Bank Account </th>
                            </tr>


                    <tbody>
                        <?php
                        foreach ($models as $model) {
                            if ($model->type == 3) {
                                ?>
                                <tr>

                                    <td style="width: 40%">{{ $model->setting_name }}</td>
                                    <td>{{ $model->setting_value }}</td>
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
                                    <td>{{ $model->setting_value }}</td>
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
                                    <td>{{ $model->setting_value }}</td>
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
</div>

<!--<link href="{{ asset('css/profile.min.css') }}" rel="stylesheet" type="text/css">-->

@endsection

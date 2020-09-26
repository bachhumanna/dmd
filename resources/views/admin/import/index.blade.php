@extends('admin.users.template')
@section('title')
Franchisee | Manage
@endsection
@section('body')

<h1 class="page-title">Import History
    <small></small>
     @include('common.newBooking')
    @if(permit(['import-client']))
    <a href="{{ route('import-client') }}" class="btn btn-primary float-right"> Import Client </a>
    @endif
</h1>
<div class="row">
    <div class="col-md-12">


        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Import History</div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <?php if (!getActiveFranchisee()) { ?>
                                <th>Franchise</th>
                            <?php } ?>
                            <th>Type</th>
                            <th>Log File</th>
                            <th>Upload File </th>
                            <th>Upload Time</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                             <?php if (!getActiveFranchisee()) { ?>
                                <th>{{ $model->franchisees->name }}</th>
                            <?php } ?>
                            <td>{{ importType($model->type) }}</td>
                            <td><a target="_blank" href="{{ asset("uploads/logfile/".$model->log_file) }}"> View Log </a></td>
                            <td><a target="_blank" href="{{ asset("uploads/".$model->upload_file) }}">Upload File</a></td>
                            <td>{{ showDate($model->created_at)}}</td>
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

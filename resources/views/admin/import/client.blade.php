@extends('admin.home.template')
@section('body')
<h1 class="page-title">
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Client Import 
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <form class="form-horizontal" method="POST" action="{{ route('import-client-post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                            <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="file">
                                 <span class="bg-danger"><?= $errors->first('file'); ?></span>
                                 
                            </div>
                        </div>

<!--                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="header" checked> File contains header row?
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn green">
                                    Import
                                </button>
                                
                                <a href="{{route('import-index')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>

@endsection

@extends('admin.faq.template')

@section('body')

    <h1 class="page-title">FAQ's
        <small></small>
        @include('common.newBooking')
        @if(isSuperAdmin())
        <a href="{{ route('faq.create') }}" class="btn btn-primary float-right"> Create </a>
        @endif
    </h1>
    <div class="row">
        <div class="col-md-12">



             <div class="row">
            <div class="col-md-12">
                <div class="portlet box purple ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Advance Search </div>
                        <div class="tools">
                            <a href="" class="<?= isset($_GET['advanceSearch']) ? "collapse" : "expand" ?>"><i class="icon-collapse"></i></a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: <?= isset($_GET['advanceSearch']) ? "block" : "none" ?>">

                        {!! Form::open(['method'=>'GET','url'=>route('faq.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Question</label>
                                    <div class="col-md-7">
                                        {!! Form::text('question', null, array('placeholder' => 'Question','class' => 'form-control')) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div>
                            <div class="form-actions" style="text-align: center">
                                <input class="btn green" type="submit" name="advanceSearch" value="Search">
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div><!-- search-form -->
                </div>
            </div>
        </div>



            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage FAQ</div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>@sortablelink('question')</th>
                                <th>@sortablelink('answer')</th>
                                <th>@sortablelink('status')</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>

                                <td>{{ $model->question }}</td>
                                <td>{{ str_limit($model->answer,100,"..")}}</td>
                                <td class="faqStatus"><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>

                                <td  class="align-center actionIcon">


                                <ul>

                                    <li>
                                        @if(permit(['faq.show']))
                                        <a class="btn btn-info btn-xs" href="{{ route('faq.show',$model->id) }}" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['faq.edit']))
                                        <a class="btn btn-primary btn-xs" href="{{ route('faq.edit',$model->id) }}"title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </li>


                                    <li>
                                        @if(permit(['teams.destroy']))
                                            {!! Form::open(['method' => 'DELETE','route' => ['faq.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                            {!! Form::submit('', ['class' => 'btn btn-danger btn-xs','title'=>'Delete']) !!}
                                            <span class="btnIcon red" title="">
                                                <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                            {!! Form::close() !!}
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
